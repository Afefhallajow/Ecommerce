<?php

use App\Http\Controllers\PaymentController;
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

Route::get('/addproducts', function () {
    return view('admin.addProducts',['categories'=>\App\Models\Categories::all()]);
});
Route::get('/getproducts',['App\Http\Controllers\MyController\ProductsController','index']);
Route::post('/add',['App\Http\Controllers\MyController\ProductsController','store'])->name('saveProduct');

Route::get('/',['App\Http\Controllers\MyController\CategoriesController','index']);
Route::post('/saveCategory',['App\Http\Controllers\MyController\CategoriesController','store'])->name('saveCategory');

Route::get('/market',['App\Http\Controllers\admin\marketController','index'])->name('market');
Route::post('/market',['App\Http\Controllers\MyController\CategoriesController','store'])->name('market');
Route::get('/getproduct/{id}',['App\Http\Controllers\admin\marketController','getproduct'])->name('getproduct');
Route::post('/addtocart',['App\Http\Controllers\admin\marketController','AddToCart'])->name('addtocart');
Route::get('/showcart',['App\Http\Controllers\admin\marketController','showCart'])->name('cart');
Route::get('/removeFromCart/{id}',['App\Http\Controllers\admin\marketController','removeFromCart'])->name('removeFromCart');

Route::get('/stripe', ['App\Http\Controllers\StripePaymentController','stripe'])->name('stripe');
Route::post('/stripe',['App\Http\Controllers\StripePaymentController', 'stripePost'])->name('stripe.post');
Route::get('/payment',         [PaymentController::class, 'index']);
Route::post('/payment', [PaymentController::class, 'payment']);
Route::post('/upload', 'App\Http\Controllers\afef@uploadAndConvert');
Route::get('/{page}','App\Http\Controllers\AdminController@index');




