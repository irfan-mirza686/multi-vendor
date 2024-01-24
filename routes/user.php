<?php
use App\Http\Controllers\User\QuotationController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;




Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => ['auth'],
], function () {
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('profile/update/{id}', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('update/password', [UserProfileController::class, 'updatePassword']);

    // Quotation Routes...
    Route::get('quotations', [QuotationController::class,'index'])->name('quotations');
    Route::post('send/quotation', [QuotationController::class, 'sendQuotation'])->name('send.quotation');
});
