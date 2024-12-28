<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;



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

Route::get('/', [ProductController::class,'home_review'])->name('home.review');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/{product}/detail', [ProductController::class, 'detail'])->name('product.detail');

Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/{brand}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('/brand/{brand}/update', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/{brand}/destroy', [BrandController::class, 'destroy'])->name('brand.destroy');
Route::get('/brand/search', [BrandController::class, 'search'])->name('brand.search');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::put('/catergory/{category}/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');




// Đang code
Route::get('/order', [OrderController::class,'index'])->name('order.index');
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/add_to_cart/{product}', [OrderController::class, 'addToCart'])->name('order.addToCart');
Route::get('/cart/remove/{key}', [OrderController::class, 'remove'])->name('cart.remove');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');




Route::get('/admin',[UserController::class, 'admin'])->name('admin.index');









Route::get('/login', [UserController::class,'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/login', [UserController::class, 'login_process'])->name('login.process');