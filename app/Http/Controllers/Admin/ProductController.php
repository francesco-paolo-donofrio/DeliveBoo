<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use App\Traits\HandlesFileUpload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // richiamo il Trait che userò in store e update
    use HandlesFileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        //dd($user);
       
        if($user->restaurant->products){
            $products=Product::all();
            $restaurant = $user->restaurant; //dichiaro la variabile $restaurant in cui salvo il ristorante dell'utente
            $totalProductsCount = $restaurant->products()->count(); //conto il numero di prodotti nel ristorante del singolo utente
            //Nel caso in cui vogliamo eliminare un prodotto con il soft delete
            // $products = Product::find($id);
            // $products->delete();
            // Esempio di ripristino di un piatto eliminato
            // $products->restore();
           
            $restaurants=Restaurant::all()->first();
            return view('admin.products.index', compact('user', 'totalProductsCount'));
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = Auth::user();
        $form_data = $request->validated();
        
        if ($request->hasFile('image')) {
            //gestisco qui la rinomina del file in caso di file con stesso nome, tramite trait 
            $form_data['image'] = $this->uploadFile($request->file('image'), 'product_images');
        }

        $form_data['restaurant_id'] = $user->restaurant->id;
        $newProduct = Product::create($form_data);
        return redirect()->route('admin.products.index',)->with('message', 'Il piatto <strong>"' . $form_data['name'] . '"</strong>'. ' è stato inserito con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //controllo: accesso solo ai prodotti del mio ristorante
        $user = Auth::user();
        $user_restaurant_products = $user->restaurant->products->find($product->id);
        if ($user_restaurant_products === null) {
            abort(404);
        }
        //dd($user_restaurant_products);
        return view('admin.products.show', compact('user_restaurant_products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //controllo: accesso solo ai prodotti del mio ristorante
        $user = Auth::user();
        $user_restaurant_products = $user->restaurant->products->find($product->id);
        if ($user_restaurant_products === null) {
            abort(404);
        }
        return view('admin.products.edit', compact('user_restaurant_products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) 
    {
        $form_data = $request->validated();
        if ($request->hasFile('image')) {
            $path = Storage::put('uploads', $form_data['image']);
            //gestisco qui la rinomina del file in caso di file con stesso nome, tramite trait 
            $form_data['image'] = $this->uploadFile($request->file('image'), 'product_images');
        } else {
            $form_data['image'] = $product->image;
        }
        $product->update($form_data);
        return redirect()->route('admin.products.index')->with('message', 'Il piatto <strong>"' . $form_data['name'] . '"</strong>'. ' è stato aggiornato con successo');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        //controllo: accesso solo ai prodotti del mio ristorante
        $user = Auth::user();
        $user_restaurant_products = $user->restaurant->products->find($product->id);
        if ($user_restaurant_products === null) {
            abort(404);
        }

        if ($user_restaurant_products->image) {
            Storage::delete($user_restaurant_products->image);
        }
        $user_restaurant_products->delete();
        return redirect()->route('admin.products.index')->with('deleted', 'Il piatto <strong>"' . $user_restaurant_products->name . '"</strong>'. ' è stato eliminato');
    }

    public function getProductWithRestaurant($id)
    {
        $product = Product::with('restaurant')->findOrFail($id);
        return response()->json($product);
    }
}
