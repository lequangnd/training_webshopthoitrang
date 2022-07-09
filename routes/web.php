<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::get('/admin/product/add', [ProductController::class, 'add'])->name('add.product');
Route::post('/admin/product/add', [ProductController::class, 'addProduct'])->name('addproduct');

Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('add.category');
Route::post('/admin/category/add', [CategoryController::class, 'addCategory'])->name('addcategory');

Route::get('/index', [FrontendController::class, 'index'])->name('index');
Route::get('/category/{id}', [FrontendController::class, 'category'])->name('category');
