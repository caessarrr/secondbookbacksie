<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CategoryController;
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

        // Menambahkan route pengelolaan Seller
        Route::get('/sellers', [SellerController::class, 'indexSellers'])->name('admin.sellers.index');
        Route::get('/sellers/create', [SellerController::class, 'createSeller'])->name('admin.sellers.create');
        Route::post('/sellers', [SellerController::class, 'storeSeller'])->name('admin.sellers.store');
        Route::get('/sellers/{seller}/edit', [SellerController::class, 'editSeller'])->name('admin.sellers.edit');
        Route::put('/sellers/{seller}', [SellerController::class, 'updateSeller'])->name('admin.sellers.update');
        Route::delete('/sellers/{seller}', [SellerController::class, 'deleteSeller'])->name('admin.sellers.delete');

        // Menambahkan route pengelolaan Store
        Route::get('/stores', [StoreController::class, 'indexStore'])->name('admin.stores.index');
        Route::get('/stores/create', [StoreController::class, 'createStore'])->name('admin.stores.create');
        Route::post('/stores', [StoreController::class, 'storeStore'])->name('admin.stores.store');
        Route::get('/stores/{store}/edit', [StoreController::class, 'editStore'])->name('admin.stores.edit');
        Route::put('/stores/{store}', [StoreController::class, 'updateStore'])->name('admin.stores.update');
        Route::delete('/stores/{store}', [StoreController::class, 'destroyStore'])->name('admin.stores.destroy');

        // Menambahkan route pengelolaan Category
        Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

});








Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('posts', AdminPostController::class);
    });

   
});


