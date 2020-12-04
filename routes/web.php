<?php

//use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
   // return view('welcome');
//})->name('welcome');



Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');  
Route::view('/contacto', 'contact')->name('contact');

//Routes resources
Route::resource('user', 'UserController');

Route::resource('product', 'ProductController');

Route::resource('category','CategoryController');

Route::resource('order','OrderController');

//Routes carro de compras
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::delete('/cart-remouveitem','CartController@remouveitem')->name('cart.remouveitem');
Route::delete('/cart-clear', 'CartController@clear')->name('cart.clear');

// routes webpay
Route::post('/checkout', 'CheckoutController@initTransaction')->name('checkout');  
Route::post('/checkout/webpay/response', 'CheckoutController@response')->name('checkout.webpay.response');  
Route::post('/checkout/webpay/finish', 'CheckoutController@finish')->name('checkout.webpay.finish');








