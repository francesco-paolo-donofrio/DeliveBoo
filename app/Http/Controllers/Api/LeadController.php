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
        $validator = Validator::make($data, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 401);
        }

        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        Mail::to($restaurant->email, $order->customer_email)->send(new OrderConfirmation($lead));

        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
        ], 200);
    }
}