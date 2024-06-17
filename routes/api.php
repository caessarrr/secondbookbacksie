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

use App\Http\Controllers\Api\CustomerController;

// Mendapatkan semua customer
Route::get('/customers', [CustomerController::class, 'index']);

// Mendapatkan customer berdasarkan ID
Route::get('/customers/{customer}', [CustomerController::class, 'show']);

// Membuat customer baru
Route::post('/customers', [CustomerController::class, 'store']);

// Memperbarui customer berdasarkan ID
Route::put('/customers/{customer}', [CustomerController::class, 'update']);

// Menghapus customer berdasarkan ID
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);

