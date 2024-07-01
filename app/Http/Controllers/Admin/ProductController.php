<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        //dd($user);
        if($user->restaurant->products){
            $products=Product::all();
            $restaurants=Restaurant::all()->first();
            return view('admin.products.index', compact('user'));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $user = Auth::user();
        
        $form_data = $request->validated();
        
        $path = Storage::put('uploads', $form_data['image']);
        if ($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $path = Storage::putFileAs('product_images', $request->image, $name);
            $form_data['image'] = $path;
        }
        $form_data['restaurant_id']= $user->restaurant->id;
        $newProduct = Product::create($form_data);
        return redirect()->route('admin.products.show', $newProduct->id)->with('message', 'Prodotto inserito correttamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) 
    {
        $form_data = $request->validated();
        $path = Storage::put('uploads', $form_data['image']);
        if ($request->hasFile('image')) {
            $name = $request->image->getClientOriginalName();
            $path = Storage::putFileAs('product_images', $request->image, $name);
            $form_data['image'] = $path;
        }
        $product->update($form_data);
        return redirect()->route('admin.products.show', $product->id)->with('message', $product->name . ' è stato aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
      
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', $product->name . ' è stato eliminato');
    }
}
