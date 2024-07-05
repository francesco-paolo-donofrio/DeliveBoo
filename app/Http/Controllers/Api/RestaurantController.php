<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->query('category')) {
        //     $posts = Post::with('category')->where('category_id', $request->query('category'))->paginate(4);
        // } else {
        //     $posts = Post::with('category')->paginate(4);
        // }
        // $category = $request->query('category');
        //->when($category, function (Builder $query, string $category)
        //$query->where('category_id', $category);

        // $restaurants = Restaurant::where('type_id', $request->query('type_id'))->get();

        // $restaurants = Restaurant::with('types', 'products')->get();
        if ($request->query('type_id')) {
            $typeId = $request->query('type_id');

            $restaurants = Restaurant::whereHas('types', function ($query) use ($typeId) {
                $query->where('type_id', $typeId);
            })->with('products')->get();
        }else{
            $restaurants = Restaurant::all();
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Ok',
            'results' => $restaurants
        ], 200);
    }
    public function show($id)
    {
        $restaurant = Restaurant::where('id', $id)
        ->with(['products','types'])
        ->first();
        if($restaurant){
            return response()->json([
               'status' => 'success',
                'message' => 'OK',
                'results' => $restaurant
            ],200);
        } else {
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
    }
}