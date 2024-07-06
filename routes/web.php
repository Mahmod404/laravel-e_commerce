<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login Controller
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});

// Register Controller
Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');
});
// Product Controller
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'getProducts')->name('products.index');
    Route::get('/product/details/{id}', 'show')->name('product.show');
    Route::get('/product/create/form', 'create')->name('product.create')->middleware(['auth', 'isAdmin']);
    Route::post('/product/create/store', 'store')->name('product.store')->middleware(['auth', 'isAdmin']);
    Route::get('/product/update/form/{id}', 'edit')->name('product.edit')->middleware(['auth', 'isAdmin']);
    Route::put('/product/update/store/{id}', 'update')->name('product.update')->middleware(['auth', 'isAdmin']);
    Route::delete('/product/destroy/{id}', 'destroy')->name('product.destroy')->middleware(['auth', 'isAdmin']);
});


Route::controller(Controller::class)->group(function () {
    Route::get('user/profile', 'showProfile')->name('profile');
    Route::get('user/profile/update_info', 'showEditForm')->name('user.edit');
    Route::put('/user/profile/update_info/store/', 'updateProfile')->name('user.update');
    Route::get('admin/dashboard', 'index')->name('dashboard')->middleware('isAdmin');
});

Route::controller(AddressController::class)->group(function () {
    Route::get('user/addresses/create', 'create')->name('address.create');
    Route::post('user/addresses/store', 'store')->name('address.store');
    Route::get('user/addresses/edit/{id}', 'edit')->name('address.edit');
    Route::put('user/addresses/edit/update/{id}', 'update')->name('address.update');
    Route::get('user/addresses/destroy/{id}', 'destroy')->name('address.destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('user/orders', 'index')->name('orders.index');
});
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart.index')->middleware('auth');
    Route::post('/cart/add', 'add')->name('cart.add')->middleware('auth');
    Route::put('/cart/{id}', 'update')->name('cart.update')->middleware('auth');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.remove')->middleware('auth');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blogs', 'getAllBlogs')->name('blogs.index');
    Route::get('/blogs/my_Blogs', 'myBlogs')->name('blogs.myBlogs');
    Route::get('/blogs/{id}', 'show')->name('blogs.show');
    Route::get('/blogs/create/new', 'create')->name('blog.create');
    Route::post('/blogs', 'store')->name('blogs.store');
    Route::get('/blogs/edit/{id}', 'edit')->name('blog.edit');
    Route::put('/blogs/{id}', 'update')->name('blog.update');
    Route::delete('/blogs/destroy/{id}', 'destroy')->name('blog.destroy');
});


Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist'])->name('wishlist');