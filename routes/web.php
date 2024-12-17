<?php

use App\Http\Controllers\BrandController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Product_detailsController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

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

Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');

Route::get('/product_details', [Product_detailsController::class, 'index'])->name('product_details.index');
Route::get('/product_details/create', [Product_detailsController::class, 'create'])->name('product_details.create');
Route::post('/product_details', [Product_detailsController::class, 'store'])->name('product_details.store');
Route::get('/product_details/{product_details}/edit', [Product_detailsController::class, 'edit'])->name('product_details.edit');
Route::put('/product_details/{product_details}/update', [Product_detailsController::class, 'update'])->name('product_details.update');
Route::delete('/product_details/{product_details}/destroy', [Product_detailsController::class, 'destroy'])->name('product_details.destroy');
