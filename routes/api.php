<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\BraintreePaymentController;

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

Route::get('/generate-client-token', [\App\Http\Controllers\BraintreePaymentController::class, 'generateClientToken']);
Route::post('/process-payment', [\App\Http\Controllers\BraintreePaymentController::class, 'processPayment']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
