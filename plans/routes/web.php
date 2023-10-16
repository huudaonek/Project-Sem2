<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileADController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home'])->name('home');

Route::get('/products', [UserController::class, 'index'])->name('product.index');
Route::get('/contact', [ContactUsController::class, 'show'])->name('contact.show');
Route::get('/about', [ContactUsController::class, 'about'])->name('about.show');
Route::post('/send', [ContactUsController::class, 'saveContact']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('products/{id}', [UserController::class, 'show'])->name('user.product.detail');
Route::get('filter-by-price-low-to-high', [UserController::class, 'filterByPriceLowToHigh'])->name('filter.products.low-to-high');
Route::get('/filter-by-price-high-to-low', [UserController::class, 'filterByPriceHighToLow'])->name('filter.products.high-to-low');
Route::post('products/filter', [UserController::class, 'filterByPrice'])->name('filter.products');
Route::get('/category/bonsai', [UserController::class, 'getBonsai'])->name('category.bonsai');
Route::get('/category/indoor-plants', [UserController::class, 'getIndoorPlants'])->name('category.indoor-plants');
Route::get('/category/outdoor-plants', [UserController::class, 'getOutdoorPlants'])->name('category.outdoor-plants');
Route::get('/category/tools', [UserController::class, 'getTools'])->name('category.tools');
Route::get('/search', [UserController::class, 'search'])->name('product.search');

Route::middleware(['checkLogin'])->group(function () {

    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/admin/manage', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/edit/{user}', [ProfileADController::class, 'edit'])->name('admin.editAD');
        Route::put('/admin/update/{user}', [ProfileADController::class, 'update'])->name('admin.updateAD');

        Route::prefix('admin/')->group(function () {
            Route::get('/contacts', [ContactUsController::class, 'Details'])->name('contacts.details');
            Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
            Route::post('/', [ProductController::class, 'store'])->name('admin.product.store');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::put('/{product}', [ProductController::class, 'update'])->name('admin.product.update');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
            Route::get('{id}/upload-image', [ProductController::class, 'showUploadImageForm'])->name('admin.product.uploadImage');
            Route::post('{id}/upload-image', [ProductController::class, 'uploadImage'])->name('admin.product.uploadImage');
            Route::get('/dashbroad', [OrderController::class, 'index'])->name('admin.dashbroad.index');
            Route::get('orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
            Route::put('orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
            Route::get('users/{id}/remove', [OrderController::class, 'removeUser'])->name('admin.users.remove');
            Route::get('/dashbroad/order', [OrderController::class, 'order'])->name('admin.dashbroad.order');
            Route::get('/dashbroad/user', [OrderController::class, 'user'])->name('admin.dashbroad.user');

        });
    });
});


Route::middleware(['authCheck'])->group(function () {
Route::get('/user/success', [OrderDetailController::class, 'success'])->name('user.success');
Route::get('/user/cancel', [OrderDetailController::class, 'cancel'])->name('user.cancel');
Route::get('cart/add/{product}', [OrderDetailController::class, 'addToCart'])->name('user.cart.add');
Route::get('cart', [OrderDetailController::class, 'showCart'])->name('user.cart.show');
Route::post('cart/place-order', [OrderDetailController::class, 'placeOrder'])->name('user.cart.placeOrder');
Route::delete('cart/remove/{productId}', [OrderDetailController::class, 'removeCartItem'])->name('user.cart.remove');
Route::get('cart/clear-all', [OrderDetailController::class, 'clearCart'])->name('user.cart.clearAll');
Route::get('checkout', [OrderDetailController::class, 'showCheckout'])->name('user.checkout');
Route::post('checkout/store', [OrderDetailController::class, 'store'])->name('user.checkout.store');
Route::get('orders', [OrderDetailController::class, 'listOrders'])->name('user.orders.list');
Route::get('order/{id}/details', [OrderDetailController::class, 'showOrderDetails'])->name('user.orders.details');
Route::delete('orders/{id}', [OrderDetailController::class, 'deleteOrder'])->name('user.orders.delete');
Route::get('{user}/edit', [ProfileController::class, 'edit'])->name('users.edit');
Route::put('{user}', [ProfileController::class, 'update'])->name('users.update');
});
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
