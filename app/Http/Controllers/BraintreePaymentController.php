<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Gateway;

class BraintreePaymentController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => config('services.braintree.env'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key')
        ]);
    }

    public function generateClientToken()
    {
        
        $clientToken = $this->gateway->clientToken()->generate();
        dd($clientToken);
        return response()->json($clientToken);
    }
    
    public function processPayment(Request $request)
    {
        $nonce = $request->input('nonce');
        $amount = '10.00';  // Esempio: importo da prendere dal carrello o da parametri della richiesta

        try {
            $result = $this->gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {
                return response()->json(['message' => 'Payment successful', 'transaction' => $result->transaction]);
            } else {
                return response()->json(['message' => 'Payment failed', 'errors' => $result->errors->deepAll()]);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Payment failed', 'error' => $e->getMessage()]);
        }
    }
}
