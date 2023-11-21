<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

//Homepage
Route::get('/', function () {
    return view('home');
});

//contact us page 
Route::get('/contact', function(){
    return view('contact');
});

require __DIR__.'/auth.php';

//navbar page
Route::get('/navbar', function(){
    return view('navBar');
})->name('navBar');

// products page basic route

//Route::Get('/products', function(){
  //  return view('products');
//})->name('products');

Route::resource('products', ProductController::class)
    ->only(['index','show']);