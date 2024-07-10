<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Lead;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrderConfirmation;

class LeadController extends Controller
{
    public function store(Request $request , Order $order, Restaurant $restaurant)
    {
        $data = $request->all();
      //validazione per la gestione della request
      $validatedData = $request->validate([
        'order_id' => 'required|exists:orders,id',
        'message_content' => 'required|string|max:255',
    ]);

         // Creare un nuovo Lead
         $lead = new Lead();
         $lead->order_id = $validatedData['order_id'];
         $lead->message_content = $validatedData['message_content'];
         $lead->save();
 
         

       /*  Mail::to($restaurant->email, $order->customer_email)->send(new OrderConfirmation($lead)); */

        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
        ], 200);
       
    }
}