<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



use App\Http\Controllers\Api\SellerController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CategoryController;

// Routes for Seller
Route::apiResource('sellers', SellerController::class);

// Routes for Store
Route::apiResource('stores', StoreController::class);

// Routes for Product
Route::apiResource('products', ProductController::class);

// Routes for Customer
Route::apiResource('customers', CustomerController::class);

// Routes for Category
Route::apiResource('categories', CategoryController::class);
