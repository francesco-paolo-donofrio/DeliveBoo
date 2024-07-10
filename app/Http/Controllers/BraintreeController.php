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
        //Validazione di tutti i campi del form, anche quelli di braintree
        //$errors = [];
        // if (empty($request->amount) || !is_numeric($request->amount) || $request->amount <= 0) {
        //     $errors['amount'] = 'Qualcosa dev\'essere andato storto: l\'importo del tuo ordine risulta zero.';
        // }
        // if (empty($request->payment_method_nonce)) {
        //     $errors['payment_method_nonce'] = 'Selezionare un metodo di pagamento.';
        // }
        // if (empty($request->customer['name']) || strlen($request->customer['name']) < 3 || strlen($request->customer['name']) > 50) {
        //     $errors['customer.name'] = 'Il nome è obbligatorio e deve avere tra 3 e 50 caratteri.';
        // }
        // if (empty($request->customer['surname']) || strlen($request->customer['surname']) < 3 || strlen($request->customer['surname']) > 50) {
        //     $errors['customer.surname'] = 'Il cognome è obbligatorio e deve avere tra 3 e 50 caratteri.';
        // }
        // if (empty($request->customer['phone'])) {
        //     $errors['customer.phone'] = 'Il numero di telefono è obbligatorio';
        // }
        // if (empty($request->customer['email']) || !filter_var($request->customer['email'], FILTER_VALIDATE_EMAIL)) {
        //     $errors['customer.email'] = 'L\'email è obbligatoria e deve essere valida.';
        // }
        // if (empty($request->customer['address']) || strlen($request->customer['address']) < 3 || strlen($request->customer['address']) > 200) {
        //     $errors['customer.address'] = 'L\'indirizzo è obbligatorio.';
        // }

        // Se ci sono errori, restituisci la risposta JSON con gli errori e uno status HTTP 422
        // if (!empty($errors)) {
        //     return response()->json(['success' => false, 'errors' => $errors], 422);
        // }

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
