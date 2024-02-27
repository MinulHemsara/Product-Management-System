<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

// All Products
Route::get('/', [ProductController::class,'index']);

// Show Create Form
Route::get('/products/create', [ProductController::class,'create'])->middleware('auth');

// Show Products Data
Route::post('/products', [ProductController::class,'store'])->middleware('auth');

// Show Edit Form
Route::get('/products/{product}/edit', [ProductController::class,'edit'])->middleware('auth');

// Update Product
Route::put('/products/{product}',[ProductController::class,'update'])->middleware('auth');

Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth');

// delete Product
Route::delete('/products/{product}',[ProductController::class,'delete'])->middleware('auth');

// Single Product
Route::get('/products/{product}', [ProductController::class,'show']);


// Show Register Form
Route::get('/register', [UserController::class,'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class,'store']);


//logout user
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

//Login From
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Log In User
Route::post('/users/authenticate',[UserController::class,'authenticate']);