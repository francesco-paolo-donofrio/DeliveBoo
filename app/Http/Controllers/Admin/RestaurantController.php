<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
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
    public function index()
    {
        $user = Auth::user();
        $user_restaurant = $user->restaurant;
        $user_products = $user_restaurant->products[0];
        // dd($user_products);
        
        if (!$user_restaurant) {
            abort(404, 'Restaurant not found');
        }

        return view('admin.restaurants.index', compact('user_restaurant', 'user_products'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
