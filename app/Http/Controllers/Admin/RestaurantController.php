<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\HandlesFileUpload;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRestaurantRequest;



class RestaurantController extends Controller
{
    // richiamo il Trait che userò in store
    use HandlesFileUpload;

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
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->validated();
        if ($request->hasFile('image')) {
            //gestisco qui la rinomina del file in caso di file con stesso nome, tramite trait 
            $form_data['image'] = $this->uploadFile($request->file('image'), 'restaurant_images');
        }
        $user = Auth::user();
        $form_data['user_id']= $user->id;
        $new_restaurant = Restaurant::create($form_data);
        return redirect()->route('admin.restaurants.index')->with('created', $new_restaurant->name . ' è stato aggiunto');
    }

    /**
     * Display the specified resource.
     */
    public function index(Restaurant $restaurant)
    {
        
        $user = Auth::user();
        $user_restaurant = $user->restaurant;        
        
        
        $user_products = $user_restaurant ? collect($user->restaurant->products) : collect();
        $user_types = $user_restaurant ? collect($user->restaurant->types) : collect();
      
        return view('admin.restaurants.index', compact('user_restaurant', 'user_products', 'restaurant', 'user_types'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }


}
