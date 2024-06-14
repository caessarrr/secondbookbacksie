<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\AdminAuth;





use App\Http\Controllers\PublicController;


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

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware([AdminAuth::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        
        Route::get('/sellers', [AdminController::class, 'showSellers'])->name('admin.sellers.index');
        Route::get('/sellers/create', [AdminController::class, 'createSeller'])->name('admin.sellers.create');
        Route::post('/sellers', [AdminController::class, 'storeSeller'])->name('admin.sellers.store');
        Route::get('/sellers/{seller}/edit', [AdminController::class, 'editSeller'])->name('admin.sellers.edit');
        Route::put('/sellers/{seller}', [AdminController::class, 'updateSeller'])->name('admin.sellers.update');
        Route::delete('/sellers/{seller}', [AdminController::class, 'deleteSeller'])->name('admin.sellers.delete');
    });

});








Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });

   
});



// routes/web.php


