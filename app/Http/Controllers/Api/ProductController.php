<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $products
        ], 200);
    }
    public function updateQuantity(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->quantity = $request->quantity;
            $product->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Quantity updated successfully',
                'data' => $product
            ]);
        } catch (\Exception $e) {
            \Log::error('Error updating quantity: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating quantity'
            ], 500);
        }
    }
}
