<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        return response()->json(['token' => $token]);
    }

    public function checkout(Request $request , Order $order, Restaurant $restaurant, User $user)
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

          // Aggiungi i prodotti alla tabella pivot order_product
         /*  foreach ($request->products as $productData) {
            $order->products()->attach($productData['id'], [
                'order_id' => $order->id,  // Aggiungi l'order_id
                'quantity' => $productData['quantity'],
                'unit_price' => $productData['unit_price'],
                'product_name' => $productData['name']
            ]);
        } */
            // Salva il lead nel database
            $lead = new Lead();
            $lead->order_id = $order->id;
            $lead->message_content = "Nuovo ordine ricevuto"; // Puoi aggiungere altri dettagli necessari
            $lead->save();

            // Invia una mail di conferma al cliente
            Mail::to($request->customer['email'])->send(new OrderConfirmation($lead));

            $user_id = $request->user_id;
            // Invia una mail di conferma al ristorante
            $user_restaurant = Restaurant::find($user_id); // Trova il ristorante associato all'utente

            
                Mail::to($user_restaurant->email)->send(new OrderConfirmation($lead));
                Mail::to('elisamavilia1@gmail.com')->send(new OrderConfirmation($lead));

           
                return response()->json(['success' => false, 'message' => 'Ristorante non trovato']);
            

            // Invia una mail di conferma a un indirizzo fisso

            // return response()->json(['success' => true, 'transaction' => $result->transaction]);
        }
    }
}

