<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
    // Assicurati che l'utente abbia un ristorante associato
    if ($user && $user->restaurant) {
        $restaurant = $user->restaurant;
        
        // Recupera gli ordini associati ai prodotti del ristorante
        $orders = Order::whereIn('id', function ($query) use ($restaurant) {
            $query->select('order_id')
                  ->from('order_product')
                  ->whereIn('product_id', $restaurant->products->pluck('id'));
        })->with('products')->orderBy('created_at', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
    
    if ($user && $user->restaurant) {
        $restaurant = $user->restaurant;
        
        $order = Order::where('id', $id)
            ->whereHas('products', function ($query) use ($restaurant) {
                $query->whereIn('product_id', $restaurant->products->pluck('id'));
            })
            ->with('products')
            ->firstOrFail();

        return view('admin.orders.show', compact('order'));
    }
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
