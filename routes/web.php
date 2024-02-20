<?php

use App\Http\Controllers\AdminController;
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
Route::get('/', function (){ return View::make('pages.index'); });

//Contact Us Page
Route::get('/contact', [ContactFormController::class, 'create']);
Route::post('/contact', [ContactFormController::class, 'store']);

// Products page and related routes
Route::resource('products', ProductController::class)
    ->only(['index','show','create', 'store']);

//Account Related
Route::middleware('auth')->group(function () {
    // Account Page
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');
    // View Specific Order
    Route::get('/order/{id}', [AccountController::class, 'viewOrder'])->name('view-order');
});

//About Us page
Route::get('/about', function(){ return view::make('pages.about'); });

// Basket Related Routes

Route::middleware('auth')->group(function () {
    // Basket Itself
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.show');
    Route::get('/add-to-basket/{id}', [BasketController::class, 'addProductToBasket'])->name('add-to-basket');
    Route::get('/remove-product/{id}', [BasketController::class, 'decreaseProductQuantity'])->name('decrease-product-quantity');
    Route::get('/remove-basket-product/{id}', [BasketController::class, 'removeProduct'])->name('remove-basket-product');
    // Checkout
    Route::get('/checkout', function (){ return view::make('pages.account.checkout'); });
    Route::put('/checkout', [BasketController::class, 'checkout'])->name('checkout');
});



//Admin pages
Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');
Route::get('/admin/addUser', [AdminController::class, 'addPage'])->name('admin.addUser');
Route::post('/admin/addUser', [AdminController::class, 'addUsers']);
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUsers'])->name('admin.users.edit');
Route::post('/admin/users/edit/{id}', [AdminController::class, 'amendUsers']);

