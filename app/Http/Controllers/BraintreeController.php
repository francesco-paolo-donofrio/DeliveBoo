<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Braintree\Gateway;

class BraintreeController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function generateToken()
    {
        $token = $this->gateway->clientToken()->generate();
        dd($token);
        return response()->json(['token' => $token]);
    }

    public function checkout(Request $request)
    {
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            // Salva i dati dell'ordine nel database
            $order = new Order();
            $order->total_price = $amount;
            $order->customer_name = $request->customer['name'];
            $order->customer_surname = $request->customer['surname'];
            $order->customer_phone = $request->customer['phone'];
            $order->customer_email = $request->customer['email'];
            $order->customer_address = $request->customer['address'];
            $order->status = 'confirmed';
            $order->save();

            return response()->json(['success' => true, 'transaction' => $result->transaction]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}
