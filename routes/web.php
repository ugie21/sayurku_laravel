<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\PageManagementController;

Route::get('/', [PageController::class, 'index']);
Route::get('/tentang-kami', [PageController::class, 'about']);
Route::get('/produk-kami', [PageController::class, 'product']);
Route::get('/produk-kami/{id}', [PageController::class, 'productDetail']);
Route::get('/blog', [PageController::class, 'blogs']);
Route::get('/pesan-sayuran', [PageController::class, 'order']);

Route::post('submit-order', [OrderController::class, 'submitOrder']);

//Authentification or User Login

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('CheckAuth');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard Page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/order/detail/{order_id}', [OrderController::class, 'show']);

//Product
Route::get('/product-management', [ProductManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/product-management/create', [ProductManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/product-management/store', [ProductManagementController::class, 'store']);
Route::get('/product-management/edit/{id}', [ProductManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/product-management/update', [ProductManagementController::class, 'update']);
Route::get('/product-management/delete/{id}', [ProductManagementController::class, 'destroy']);

//Navigation
Route::get('/navigation-management', [NavigationController::class, 'index'])->middleware('CheckAuth');
Route::get('/navigation-management/create', [NavigationController::class, 'create'])->middleware('CheckAuth');
Route::post('/navigation-management/store', [NavigationController::class, 'store']);
Route::get('/navigation-management/edit/{id}', [NavigationController::class, 'edit'])->middleware('CheckAuth');
Route::post('/navigation-management/update', [NavigationController::class, 'update']);
Route::get('/navigation-management/delete/{id}', [NavigationController::class, 'destroy']);

//Blog
Route::get('/blog-management', [BlogController::class, 'index'])->middleware('CheckAuth');
Route::get('/blog-management/create', [BlogController::class, 'create'])->middleware('CheckAuth');
Route::post('/blog-management/store', [BlogController::class, 'store']);
Route::get('/blog-management/edit/{id}', [BlogController::class, 'edit'])->middleware('CheckAuth');
Route::post('/blog-management/update', [BlogController::class, 'update']);
Route::get('/blog-management/delete/{id}', [BlogController::class, 'destroy']);

//user
Route::get('/user-management', [UserManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/user-management/create', [UserManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/user-management/store', [UserManagementController::class, 'store']);
Route::get('/user-management/edit/{id}', [UserManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/user-management/update', [UserManagementController::class, 'update']);
Route::get('/user-management/delete/{id}', [UserManagementController::class, 'destroy']);

//Page Management
Route::get('/page-management', [PageManagementController::class, 'index'])->middleware('CheckAuth');
Route::get('/page-management/create', [PageManagementController::class, 'create'])->middleware('CheckAuth');
Route::post('/page-management/store', [PageManagementController::class, 'store']);
Route::get('/page-management/edit/{id}', [PageManagementController::class, 'edit'])->middleware('CheckAuth');
Route::post('/page-management/update', [PageManagementController::class, 'update']);
Route::get('/page-management/delete/{id}', [PageManagementController::class, 'destroy']);

//search bar
Route::get('/cari', [PageController::class, 'search'])->name('cari');




