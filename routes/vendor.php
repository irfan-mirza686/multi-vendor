<?php
use App\Http\Controllers\Vendor\ProfileController;
use Illuminate\Support\Facades\Route;

// Vendor Controllers.....
use App\Http\Controllers\Vendor\MessagesController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\HomeController;
use App\Http\Controllers\Vendor\VendorQuotationController;
use App\Http\Controllers\Vendor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Vendor\Auth\RegisteredVendorController;

/*
|--------------------------------------------------------------------------
| Vendor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/// Vendor Routes Start Here.......

Route::post('register/vendor', [RegisteredVendorController::class, 'store'])->name('register.vendor');


Route::
        namespace('Vendor')->prefix('vendor')->name('vendor.')->group(function () {
            Route::namespace('Auth')->group(function () {
                Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
                Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

            });
            Route::middleware('vendor')->group(function () {
                Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

                Route::get('profile',[ProfileController::class,'profile'])->name('profile');
                Route::post('update/profile/{id}',[ProfileController::class,'updateProfile'])->name('profile.update');
                Route::post('change/themesettings', [ProfileController::class, 'changeThemeSettings'])->name('change.themesettings');
                Route::post('update/password', [ProfileController::class, 'updatePassword'])->name('update.password');
                // Products Routes.....
                Route::get('WHOLESALER/PRODUCTS', [ProductController::class, 'index'])->name('wholesaler.products');
                Route::get('OWN/Products', [ProductController::class, 'ownProducts'])->name('own.products');
                Route::post('OWN/ProductsList', [ProductController::class, 'ownProductsList'])->name('own.products.list');
                Route::delete('delete/own/product/{id}',[ProductController::class,'deleteOwnProduct'])->name('delete.own.product');

                // Send Quotation Routes
                Route::post('send/quotation', [VendorQuotationController::class, 'sendQuotation'])->name('send.quotation');
                Route::get('quotations/to_wholesaler', [VendorQuotationController::class, 'toWholesaler'])->name('q.wholesaler');
                Route::post('quotations/to_wholesaler/list', [VendorQuotationController::class, 'toWholesalerList'])->name('q.wholesaler.list');
                Route::post('import/quotation/product', [VendorQuotationController::class, 'importQuotationProduct'])->name('import.quotation.product');

            });
            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
            Route::get('inbox', [MessagesController::class, 'index'])->name('inbox');
        });
/// Vendor Routes ENds Here.......
