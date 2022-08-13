<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingCartController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/product/add', [ProductController::class, 'add'])->name('add.product');
    Route::post('/admin/product/add', [ProductController::class, 'addProduct'])->name('addproduct');
    Route::post('/admin/product/update/{id}', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::get('/admin/product/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/admin/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    Route::get('/admin/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('add.category');
    Route::post('/admin/category/add', [CategoryController::class, 'addCategory'])->name('addcategory');

    Route::get('/admin/bills', [BillController::class, 'index'])->name('bills');
    Route::get('/admin/bills/update/{id}', [BillController::class, 'update'])->name('updatebill');
    Route::post('/admin/bills/update/{id}', [BillController::class, 'updateBill'])->name('updateBill');
    Route::get('/admin/bills/delete/{id}', [BillController::class, 'deleteBill'])->name('deleteBill');
    Route::get('/admin/billdetails/{id}', [BillController::class, 'billdetails'])->name('billdetails');
    Route::get('/admin/billdetails/update/{id}', [BillController::class, 'updatedetails'])->name('updatedetails');
    Route::post('/admin/billdetails/update/{id}', [BillController::class, 'updateBillDetails'])->name('updateBillDetails');
    Route::get('/admin/billdetails/delete/{id}', [BillController::class, 'deletedetails'])->name('deletedetails');

    Route::get('/category/{id}', [FrontendController::class, 'category'])->name('category');
    Route::get('/details/{id}', [FrontendController::class, 'details'])->name('details');
});
Route::get('/index', [FrontendController::class, 'index'])->name('index');

Route::get('/user/login', [UserController::class, 'login'])->name('login');
Route::get('/user/register', [UserController::class, 'register'])->name('register');
Route::post('/user/register', [UserController::class, 'addRegister'])->name('addRegister');
Route::post('/user/login', [UserController::class, 'postLogin'])->name('postLogin');
Route::get('/user/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/cart', [ShoppingCartController::class, 'cart'])->name('cart');
Route::post('/cart/save_cart', [ShoppingCartController::class, 'save_cart'])->name('save_cart');
Route::get('/cart/deleteItemCart/{id}', [ShoppingCartController::class, 'deleteItemCart'])->name('deleteItemCart');
Route::post('/cart/updatecart/{id}', [ShoppingCartController::class, 'updatecart'])->name('updatecart');

Route::post('/order', [ShoppingCartController::class, 'order'])->name('order');