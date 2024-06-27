<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Middleware\AdminAuth;






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
        Route::delete('/sellers/{seller}', [SellerController::class, 'destroySeller'])->name('admin.sellers.destroy');

        // Menambahkan route pengelolaan Customer
        Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
        Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
        Route::post('/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
        Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
        Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('admin.customers.update');
        Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

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

        // Menambahkan route pengelolaan Product
        Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}', [ProductController::class, 'show'])->name('admin.products.show');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

});




use App\Http\Controllers\Seller\Auth\SellerAuthController;
use App\Http\Middleware\SellerAuthenticate;

Route::prefix('seller')->group(function () {
    Route::get('/register', [SellerAuthController::class, 'showRegisterForm'])->name('seller.register');
    Route::post('/register', [SellerAuthController::class, 'register']);
    Route::get('/login', [SellerAuthController::class, 'showLoginForm'])->name('seller.login');
    Route::post('/login', [SellerAuthController::class, 'login'])->name('seller.login.submit');
    Route::post('/logout', [SellerAuthController::class, 'logout'])->name('seller.logout');

    Route::middleware([SellerAuthenticate::class])->group(function () {
        Route::get('/dashboard', function () {
            return view('seller.dashboard');
        })->name('seller.dashboard');
    });
});