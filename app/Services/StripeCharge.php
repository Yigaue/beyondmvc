<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class StripeCharge implements PaymentRepository
{
    // Demo code
    
    protected $stripeClient;

    public function __construct()
    {
        $key = config('services.stripe.key');
        $this->stripeClient = new \Stripe\StripeClient($key);
    }

    public function createCharge($data)
    {
        $charge = $this->stripeClient->charges->create([
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'source' => $data['source'],
            'description' => $data['description'],
        ]);

        //No error/exception handling

        return ['charge' => $charge];
    }

    public function retrieveCharge($data)
    {
        $charge = $this->stripeClient->charges->retrieve(
            $data['charge_id'],
            []
        );

        return ['charge' => $charge];
    }
}
