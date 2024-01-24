<?php
use Illuminate\Support\Facades\Route;

// WholeSaler Controllers.....
use App\Http\Controllers\WholeSaler\MessagesController;
use App\Http\Controllers\WholeSaler\ProductController;
use App\Http\Controllers\WholeSaler\QuotationController;
use App\Http\Controllers\WholeSaler\Auth\RegisteredWholesalerController;
use App\Http\Controllers\WholeSaler\ProfileController;

/*
|--------------------------------------------------------------------------
| WholeSaler Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// WholeSaler Routes Start Here.......
Route::post('register/wholesaler', [RegisteredWholesalerController::class, 'store'])->name('register.wholesaler');


Route::
        namespace('WholeSaler')->prefix('wholesaler')->name('wholesaler.')->group(function () {
            Route::namespace('Auth')->group(function () {
                Route::get('login', [\App\Http\Controllers\WholeSaler\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
                Route::post('login', [\App\Http\Controllers\WholeSaler\Auth\AuthenticatedSessionController::class, 'store'])->name('login');

            });
            Route::middleware('wholesaler')->group(function () {
                Route::get('dashboard', [\App\Http\Controllers\WholeSaler\HomeController::class, 'index'])->name('dashboard');

                // WholeSaler Profile Routes....
                Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
                Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
                Route::post('change/themesettings', [ProfileController::class, 'changeThemeSettings'])->name('change.themesettings');
                Route::post('update/password', [ProfileController::class, 'updatePassword'])->name('update.password');


                // WholeSaler Products Routes....
                Route::get('products', [ProductController::class, 'index'])->name('products');
                Route::post('products/list', [ProductController::class, 'List'])->name('products.list');
                Route::get('products/search', [ProductController::class, 'index'])->name('product.search');
                Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
                Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
                Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
                Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
                Route::delete('delete/product/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');

                // Inbox ...
                Route::get('inbox', [MessagesController::class, 'index'])->name('inbox');

                //Quotations Routes...
                Route::get('quotations', [QuotationController::class, 'index'])->name('quotations');
                Route::post('quotations/list', [QuotationController::class, 'list'])->name('quotations.list');
                Route::post('approved/quotation', [QuotationController::class, 'updateStatus'])->name('update.status');
            });
            Route::post('logout', [\App\Http\Controllers\WholeSaler\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
            Route::get('inbox', [MessagesController::class, 'index'])->name('inbox');
        });
/// WholeSaler Routes ENds Here.......
