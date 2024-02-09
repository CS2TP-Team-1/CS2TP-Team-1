<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\View;

require __DIR__.'/auth.php';

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
Route::get('/', function (){
    return View::make('pages.index');
});

//contact us page

Route::get('contact', [ContactFormController::class, 'create']);
Route::post('contact', [ContactFormController::class, 'store']);



Route::resource('products', ProductController::class)
    ->only(['index','show','create', 'store']);


Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');
});


//About Us page
Route::get('/about', function(){
    return view::make('pages.about');
});


// Basket Related Routes

Route::middleware('auth')->group(function () {
    Route::get('/basket', [BasketController::class, 'index'])->name('basket');
    Route::get('/add-to-basket/{id}', [BasketController::class, 'addProductToBasket'])->name('add-to-basket');
    Route::patch('/update-basket', [BasketController::class, 'updateBasket'])->name('update.basket');
    Route::delete('/remove-basket-product/{id}', [BasketController::class, 'removeProduct'])->name('remove-basket-product');
});


