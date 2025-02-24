<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\BraintreeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/checkout', [BraintreeController::class, 'checkout'])->name('checkout');


Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->parameters('id');
    Route::resource('restaurants', RestaurantController::class)->only(['create','index','store','destroy']);
    Route::resource('orders', OrderController::class)->parameters('id');
    // Route::get('orders', [OrderController::class, 'show'])->parameters('id')->name('orders.show');
    //route to show restaurant of auth user
    Route::get('/', [RestaurantController::class, 'index'])->name('dashboard')->middleware('auth');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::fallback(function () {
    return redirect()->route('admin.dashboard');
});
