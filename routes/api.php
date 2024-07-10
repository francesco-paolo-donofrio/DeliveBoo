<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\BraintreeController;
use Braintree\Gateway;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{id}', [RestaurantController::class, 'show']);
Route::get('types', [TypeController::class, 'index']);

Route::get('/braintree/token', function () {
    $gateway = new Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchant_id'),
        'publicKey' => config('services.braintree.public_key'),
        'privateKey' => config('services.braintree.private_key'),
    ]);

    $clientToken = $gateway->clientToken()->generate();

    return response()->json(['token' => $clientToken]);
});

Route::post('/braintree/checkout', [BraintreeController::class, 'checkout']);
Route::post('/leads', [LeadController::class, 'store']);
Route::get('/products/{id}/restaurant', [ProductController::class, 'getProductWithRestaurant']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
