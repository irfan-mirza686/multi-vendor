<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserProductTypeController;

// Frontend Controllers....
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\VendorProfileController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\ProductReviewsController;



use App\Models\Category;


require __DIR__ . '/user.php';

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

// Route::get('/', function () {
//     return view('user.auth.login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/', [HomeController::class, 'index'])->name('home');

$catSlug = Category::select('slug')->where('status', 'active')->get()->pluck('slug')->toArray();

foreach ($catSlug as $slug) {
    Route::get('/' . $slug, [ShopController::class, 'listingProducts']);
}

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/vendor/{vendor}/product/{product}', [ShopController::class, 'productDetails'])->name('product.details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('profile/{vendor?}', [VendorProfileController::class, 'vendorProfile'])->name('vendor.profile');
// Route::get('vendor/products/{category?}',[VendorProfileController::class,'vendorProfile'])->name('vendor.products.by.category');
Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');

Route::post('add/comment', [CommentController::class, 'addComment'])->name('add.comment');

// Route::middleware('guest')->group(function () {
//     Route::post('register/consumer',[RegisterUserController::class,'create'])->name('register.consumer');
// });




/* Product Reviews */
Route::post('post.product/review', [ProductReviewsController::class, 'postReview'])->name('post.product.review');
Route::get('product/type/create', [ProductReviewsController::class, 'create'])->name('product.type.create');

/* Product Reviews Routes End Here */

// Subscriber Routes Start Here.......
Route::prefix('user')->name('user.')->group(function () {
    Route::namespace('Auth')->middleware('guest')->group(function () {
        Route::get('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('userlogin');
    });
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


    });
    Route::post('log-out', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
// Subscriber Routes Ends Here.....
