<?php
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
Auth::routes();
//Rutas paginas de inicio/home
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/contacto', 'contact')->name('contact');

//Routes resources
//Rutas usuarios
Route::resource('user', 'UserController');
//Rutas productos
Route::resource('product', 'ProductController');
//Rutas categorias
Route::resource('category','CategoryController');
//Rutas pedidos
Route::resource('order','OrderController');

//Routes carro de compras
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::post('/cart-upitem', 'CartController@upitem')->name('cart.upitem');
Route::post('/cart-downitem', 'CartController@downitem')->name('cart.downitem');
Route::post('/cart-updateitem', 'CartController@updateitem')->name('cart.updateitem');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::delete('/cart-remouveitem','CartController@remouveitem')->name('cart.remouveitem');
Route::delete('/cart-clear', 'CartController@clear')->name('cart.clear');

// routes webpay
Route::post('/checkout', 'CheckoutController@initTransaction')->name('checkout');
Route::post('/checkout/webpay/response', 'CheckoutController@response')->name('checkout.webpay.response');
Route::post('/checkout/webpay/finish', 'CheckoutController@finish')->name('checkout.webpay.finish');

// routes Khipu
Route::post('/payments', 'KhipuController@payments')->name('payments');
Route::get('/payments-cancel', 'KhipuController@cancel')->name('cancel');
Route::get('/payments-finish', 'KhipuController@finish')->name('finish');

// Route::post('/checkout/Khipu/response', 'KhipuController@response')->name('checkout.Khipu.response');
// Route::post('/checkout/Khipu/finish', 'KhipuController@finish')->name('checkout.Khipu.finish');
