<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentControllerWeb extends Controller
{
    // Demo code. This controller can moved to the appropriate namespace
    protected  $paymentRespository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRespository = $paymentRepository;
    }

    public function createCharge(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'numeric|required',
            'source' => 'string|sometimes', // card
            'description' => 'string|sometimes',
            'currency' => 'string|required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $response = $this->paymentRespository->createCharge($request->all());

        //No error/exception handling

        return view('welcome', $response);
    }
}
