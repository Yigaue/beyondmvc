<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class AmazonPay implements PaymentRepository
{
    protected $amazonClient;
    public function __construct()
    {
        $amazonpayConfig = config('services.amazon.config');
        $this->amazonClient = new \Amazon\Pay\API\Client($amazonpayConfig);
    }


     /* Amazon Checkout v2 - Create Charge
        *
        * You can create a Charge to authorize payment, if you have a Charge Permission in a Chargeable state.
        * You can optionally capture payment immediately by setting captureNow to true. The response for
        * Create Charge will include a Charge ID. This is the only time this value will ever be returned,
        * you must store the ID in order to capture payment, retrieve Charge details, or Create Refund  at a later date.
        *
        * @param payload - [String in JSON format] or [array]
        * @param headers - [array] - requires x-amz-pay-Idempotency-Key header; optional x-amz-pay-authtoken
    */
    public function createCharge($data)
    {
        $payload = $this->getPayload($data);
        $headers = $this->getHeaders();
        $this->amazonClient->createCharge($payload, $headers);
    }

    public function retrieveCharge($data)
    {
        return [];
    }

    protected function getHeaders()
    {
        return ['x-amz-pay-idempotency-key' => uniqid()];
    }

    protected function getPayload($data)
    {
        return ["scanData" => "UKhrmatMeKdlfY6b",
        "scanReferenceId" => "0b8fb271-2ae2-49a5-b35d7",
        "merchantCOE" => "US",
        "ledgerCurrency" => $data["currency"],
        "chargeTotal" => [
            "currencyCode" => $data["currency"],
            "amount" => $data["amount"]
        ],
        "metadata" => [
            "merchantNote" => $data['description'],
            "communicationContext" => [
                "merchantStoreName" => "Store Name",
                "merchantOrderId" => "789123"
            ]
        ]
    ];

    }
}

