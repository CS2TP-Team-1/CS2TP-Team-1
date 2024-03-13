<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Models\ContactForm;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReturnOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ReviewController;



require __DIR__ . '/auth.php';



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
    return View::make('pages.index');
});

//Contact Us Page
Route::get('/contact', [ContactFormController::class, 'create'])->name('contact-form');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact-form.store');

// Products page and related routes
Route::resource('products', ProductController::class)
    ->only(['index', 'show']);


//Account Related
Route::middleware('auth')->group(function () {
    // Account Page
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::patch('/account', [AccountController::class, 'update'])->name('account.update');
    Route::delete('/account', [AccountController::class, 'destroy'])->name('account.destroy');
    // View Specific Order
    Route::get('/order/{id}', [AccountController::class, 'viewOrder'])->name('view-order');
    Route::get('/order/{order_id}/return/{product_id}', [ReturnOrderController::class, 'returnProduct'])->name('return-product');
    Route::get('/return/{id}', [ReturnOrderController::class, 'viewReturn'])->name('view-return');
});

//About Us page
Route::get('/about', function () {
    return view::make('pages.about');
});

// Basket Related Routes

Route::middleware('auth')->group(function () {
    // Basket Itself
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.show');
    Route::get('/add-to-basket/{id}', [BasketController::class, 'addProductToBasket'])->name('add-to-basket');
    Route::get('/remove-product/{id}', [BasketController::class, 'decreaseProductQuantity'])->name('decrease-product-quantity');
    Route::get('/remove-basket-product/{id}', [BasketController::class, 'removeProduct'])->name('remove-basket-product');
    Route::patch('/basket',[DiscountController::class, 'applyDiscount'])->name('apply-discount');
    // Checkout
    Route::get('/checkout', function (){ return view::make('pages.account.checkout'); })->name('checkoutPage');
    Route::put('/checkout', [BasketController::class, 'checkout'])->name('checkout');
});

//Review Routes
Route::resource('reviews', ReviewController::class)->middleware('auth');
Route::get('/reviews/delete/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

//Admin pages

Route::middleware('admin')->group(function () {
    // Users
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::get('/admin/addUser', [AdminController::class, 'addPage'])->name('admin.addUser');
    Route::post('/admin/addUser', [AdminController::class, 'addUsers']);
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUsers'])->name('admin.users.edit');
    Route::post('/admin/users/edit/{id}', [AdminController::class, 'amendUsers']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteUser']);
    // Products
    Route::get('/admin/products', [AdminController::class, 'productsDashboard'])->name('admin.products-dashboard');
    Route::patch('/admin/products', [AdminController::class, 'productsUpdateStock'])->name('admin.products-update-stock');
    Route::get('/admin/products/edit/{id}', [AdminController::class, 'productsEditPage'])->name('admin.edit-products-page');
    Route::patch('/admin/products/edit/', [AdminController::class, 'productsEdit'])->name('admin.edit-products');
    Route::get('/admin/products/delete/{id}', [AdminController::class, 'productsDelete'])->name('admin.delete-products');
    Route::get('/admin/products/create', [AdminController::class, 'productsCreateForm'])->name('admin.form-create-products');
    Route::post('/admin/products/create', [AdminController::class, 'productsCreate'])->name('admin.create-products');
    //Contact submission Page
    Route::get('/admin/contact', function () {
        return View::make('pages.admin.contact-submission')->with('forms', ContactForm::all());
    })->name('admin.contact');
    // Discounts
    Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('discounts.index');
    Route::get('/admin/discounts/delete/{id}', [DiscountController::class, 'destroy'])->name('discounts.destroy');
    Route::post('/admin/discounts', [DiscountController::class, 'store'])->name('discounts.store');
    // Returns
    Route::get('/admin/returns', [AdminController::class, 'returnsDashboard'])->name('admin.returns-dashboard');
    Route::get('/admin/returns/{id}', [AdminController::class, 'viewReturn'])->name('admin.view-return');
    Route::get('admin/returns/{id}/approve', [AdminController::class, 'approveReturn'])->name('admin.approve-return');
    Route::get('/admin/returns/{id}/deny', [AdminController::class, 'denyReturn'])->name('admin.deny-return');
    //Orders
    Route::get('/admin/orders', [AdminController::class, 'viewOrders'])->name('admin.orders');
    Route::post('/admin/orders/updateStatus/{id}', [AdminController::class, 'updateorderStatus'])->name('admin.order.updateStatus');
    Route::get('/admin/order/view/{id}', [AdminController::class, 'viewOrder'])->name('admin.AviewOrder');
});
