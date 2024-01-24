<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\PackageTypeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\WholeSalerMsgsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\StaffMemberController;
use App\Http\Controllers\Admin\SliderController;

use App\Http\Controllers\Admin\Member\WholeSalerController;
use App\Http\Controllers\Admin\Member\VendorController;
use App\Http\Controllers\Admin\Member\UserController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;


// Admin Routes Start Here.......
Route::
        namespace('Amdin')->prefix('admin')->name('admin.')->group(function () {
            Route::namespace('Auth')->middleware('guest:admin')->group(function () {
                Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
                Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');

            });
            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

            Route::middleware('admin')->group(function () {
                Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
                // Admin Profile

                Route::get('profile', [AdminController::class, 'profile'])->name('profile');
                Route::post('profile/update/{id}', [AdminController::class, 'profileUpdate'])->name('profile.update');
                Route::post('update/password', [AdminController::class, 'updatePassword'])->name('update.password');
                Route::post('change/themesettings', [AdminController::class, 'changeThemeSettings'])->name('change.themesettings');
                // Route::post('change/headercolor',[AdminController::class,'changeHeaderColor'])->name('change.headercolor');

                // Staff Members Routes....
                Route::get('staff/members', [StaffMemberController::class, 'index'])->name('staff.members');
                Route::post('staff/members/list', [StaffMemberController::class, 'staffMembersList']);
                Route::get('staff/create', [StaffMemberController::class, 'create'])->name('staff.create');
                Route::post('staff/store', [StaffMemberController::class, 'store'])->name('staff.store');


                // Wholesaler Products....
                Route::get('wholesaler/products', [WholeSalerController::class, 'wholeSalerProducts'])->name('wholesaler.products');
                Route::post('wholesaler/products/list', [WholeSalerController::class, 'wholeSalerProductsList']);
                Route::post('view/wholesaler/product', [WholeSalerController::class, 'viewWholeSalerProduct'])->name('view.wholesaler.product');

                // Wholesaler Quotations....
                Route::get('wholesaler/quotations', [WholeSalerController::class, 'wholeSalerQuotation'])->name('wholesaler.quotations');
                Route::post('wholesaler/quotations/list', [WholeSalerController::class, 'wholeSalerQuotationList']);

                // Vendor Products....
                Route::get('vendor/products', [VendorController::class, 'vendorProducts'])->name('vendor.products');
                Route::post('vendor/products/list', [VendorController::class, 'vendorProductsList']);

                // Products Routes......

                Route::get('trashed/products', [ProductsController::class, 'TrashedProducts'])->name('trashed.products');

                Route::get('trashed/product/search', [ProductsController::class, 'TrashedProducts'])->name('trashed.product.search');
                Route::get('trashed/product/restore/{id}', [ProductsController::class, 'RestoreTrashedProduct'])->name('trashed.product.restore');
                Route::get('trashed/product/delete/{id}', [ProductsController::class, 'DelTrashedProduct'])->name('trashed.product.delete');

                //------ Admin Settings ----------//
                Route::get('general/settings', [AdminSettingsController::class, 'index'])->name('general.settings');

                Route::post('update/general/settings', [AdminSettingsController::class, 'updateGeneralSettings'])->name('update.settings');
                Route::get('email/config', [EmailTemplateController::class, 'emailConfig'])->name('email.config');
                Route::post('email/config', [EmailTemplateController::class, 'emailConfigUpdate']);
                Route::get('chat/setting', [AdminSettingsController::class, 'chatSetting'])->name('chat.setting');
                Route::post('update/chat/setting', [AdminSettingsController::class, 'updateChatSetting'])->name('update.chat.setting');

                //--------------- Email Templates ------------------//
                Route::get('email/templates', [EmailTemplateController::class, 'emailTemplates'])->name('email.templates');
                Route::get('email/templates/edit/{template}', [EmailTemplateController::class, 'emailTemplatesEdit'])->name('email.templates.edit');

                Route::post('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesUpdate'])->name('email.templates.update');

                // WholeSaler Messages Routes....
                Route::get('inbox/wholesaler', [WholeSalerMsgsController::class, 'index'])->name('inbox.wholesaler');


                /* Products Routes */
                Route::get('products', [ProductsController::class, 'index'])->name('products');
                Route::get('product/search', [ProductsController::class, 'index'])->name('product.search');

                /* Product Types Routes Start Here */
                Route::get('product/types', [ProductTypeController::class, 'index'])->name('product.types');
                Route::get('product/type/create', [ProductTypeController::class, 'create'])->name('product.type.create');
                Route::post('product/type/store', [ProductTypeController::class, 'store'])->name('product.type.store');
                Route::get('product/type/edit/{id}', [ProductTypeController::class, 'edit'])->name('product.type.edit');
                Route::post('product/type/update/{id}', [ProductTypeController::class, 'update'])->name('product.type.update');
                Route::get('product/type/delete/{id}', [ProductTypeController::class, 'delete'])->name('product.type.delete');
                /* Product Types Routes End Here */

                /* Package Types Routes Start Here */
                Route::get('package/types', [PackageTypeController::class, 'index'])->name('package.types');
                Route::get('package/type/create', [PackageTypeController::class, 'create'])->name('package.type.create');
                Route::post('package/type/store', [PackageTypeController::class, 'store'])->name('package.type.store');
                Route::get('package/type/edit/{id}', [PackageTypeController::class, 'edit'])->name('package.type.edit');
                Route::post('package/type/update/{id}', [PackageTypeController::class, 'update'])->name('package.type.update');
                Route::get('package/type/delete/{id}', [PackageTypeController::class, 'delete'])->name('package.type.delete');
                /* Package Types Routes End Here */

                /* Product Category Routes Start Here */
                Route::get('product/categories', [ProductCategoryController::class, 'index'])->name('product.categories');
                Route::post('categories/list', [ProductCategoryController::class, 'categoriesList']);
                Route::get('product/category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
                Route::post('product/category/store', [ProductCategoryController::class, 'store'])->name('product.category.store');
                Route::get('product/category/edit/{id}', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
                Route::post('product/category/update/{id}', [ProductCategoryController::class, 'update'])->name('product.category.update');
                Route::get('product/category/delete/{id}', [ProductCategoryController::class, 'delete'])->name('product.category.delete');
                /* Product Category Routes Start Here */

                /* Sliders Routes Start Here */
                Route::get('sliders', [SliderController::class, 'index'])->name('sliders');
                Route::post('sliders/list', [SliderController::class, 'SliderList'])->name('slider.list');
                Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
                Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
                Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::post('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
                Route::delete('slider/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
                /* Sliders Routes Ends Here */

                /* Country Routes Start Here */
                Route::get('countries', [CountryController::class, 'index'])->name('countries');
                Route::post('countries/list', [CountryController::class, 'CountryList'])->name('country.list');
                Route::get('country/create', [CountryController::class, 'create'])->name('country.create');
                Route::post('country/store', [CountryController::class, 'store'])->name('country.store');
                Route::get('country/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
                Route::post('country/update/{id}', [CountryController::class, 'update'])->name('country.update');
                Route::delete('country/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');
                /* Country Routes Ends Here */

                /* State Routes Start Here */
                Route::get('states', [StateController::class, 'index'])->name('states');
                Route::post('states/list', [StateController::class, 'StateList'])->name('state.list');
                Route::get('state/create', [StateController::class, 'create'])->name('state.create');
                Route::get('load/countries', [StateController::class, 'loadCountries']);
                Route::post('state/store', [StateController::class, 'store'])->name('state.store');
                Route::get('state/edit/{id}', [StateController::class, 'edit'])->name('state.edit');
                Route::post('state/update/{id}', [StateController::class, 'update'])->name('state.update');
                Route::delete('state/delete/{id}', [StateController::class, 'delete'])->name('state.delete');
                /* State Routes Ends Here */


                /* City Routes Start Here */
                Route::get('cities', [CityController::class, 'index'])->name('cities');
                Route::post('cities/list', [CityController::class, 'CityList'])->name('city.list');
                Route::get('city/create', [CityController::class, 'create'])->name('city.create');
                Route::get('load/states', [CityController::class, 'loadStates']);
                Route::post('city/store', [CityController::class, 'store'])->name('city.store');
                Route::get('city/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
                Route::post('city/update/{id}', [CityController::class, 'update'])->name('city.update');
                Route::delete('city/delete/{id}', [CityController::class, 'delete'])->name('city.delete');
                /* City Routes Ends Here */


                /* Unit Routes Start Here */
                Route::get('units', [UnitController::class, 'index'])->name('units');
                Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
                Route::post('unit/store', [UnitController::class, 'store'])->name('unit.store');
                Route::get('unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
                Route::post('unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
                Route::get('unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
                /* Unit Routes Start Here */

                /* WholeSalers List Routes Start Here */
                Route::get('Member/WholeSalers', [WholeSalerController::class, 'index'])->name('wholesalers');
                Route::post('Member/WholeSalers/list', [WholeSalerController::class, 'WholeSalersList'])->name('wholesalers.list');
                Route::post('update/wholesaler/status', [WholeSalerController::class, 'updateStatus'])->name('wholesaler.update.status');
                Route::get('Member/WholeSaler/profile/{username?}', [WholeSalerController::class, 'profile'])->name('wholesaler.profile');

                /* WholeSalers List Routes Ends  Here */


                /* Vendors List Routes Start Here */
                Route::get('Member/Vendors', [VendorController::class, 'index'])->name('vendors');
                Route::post('Member/Vendors/list', [VendorController::class, 'VendorsList'])->name('vendors.list');
                Route::post('update/vendor/status', [VendorController::class, 'updateStatus'])->name('vendor.update.status');

                /* Vendors List Routes Ends  Here */

                /* Consumer List Routes Start Here */
                Route::get('Member/consumer', [UserController::class, 'index'])->name('consumers');
                Route::post('Member/consumer/list', [UserController::class, 'ConsumersList'])->name('consumers.list');
                Route::post('update/consumer/status', [UserController::class, 'updateStatus'])->name('consumer.update.status');

                /* Consumer List Routes Ends  Here */



                /* Subscriber Routes Here */
                Route::get('subscribers', [SubscriberController::class, 'index'])->name('subscribers');
                Route::get('subscriber/create', [SubscriberController::class, 'create'])->name('subscriber.create');
                Route::post('subscriber/store', [SubscriberController::class, 'store'])->name('subscriber.store');
                Route::get('subscriber/edit/{id}', [SubscriberController::class, 'edit'])->name('subscriber.edit');
                Route::post('subscriber/update/{id}', [SubscriberController::class, 'update'])->name('subscriber.update');
                Route::get('subscriber/delete/{id}', [SubscriberController::class, 'delete'])->name('subscriber.delete');
                // Admin Email Notifications........

                Route::post('email/notification', [SubscriberController::class, 'emailNotifications'])->name('email.notification');
                Route::post('notice/notification', [SubscriberController::class, 'noticeNotifications'])->name('notice.notification');
            });



        });
// Admin Routes Ends Here.......
