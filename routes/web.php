<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
Auth::routes();

Route::get('/', function () {
    $products = \App\Models\Product::all();  // Fetch products for the home page
    return view('home', compact('products'));
})->name('home');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::post('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.force-delete');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
Route::resource('products', ProductController::class)->middleware('admin');


Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);


Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');