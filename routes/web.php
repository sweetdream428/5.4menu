<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenupageController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\RestaurantController;

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

// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom'); 
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('page/{pagename}/{id}', [MenupageController::class, 'pageview']);
Route::post('cate-get', [MenupageController::class, 'categet'])->name('category.get');
Route::get('restaurant/{name}', [RestaurantController::class, 'view'])->name('restaurant.view');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::get('setting', [LoginController::class, 'settingpage'])->name('setting.page');
    Route::post('change-password/{id}', [LoginController::class, 'changePassword']);
    Route::post('change-profile/{id}', [LoginController::class, 'changeProfile']);
    Route::get('menupage', [MenupageController::class, 'index'])->name('menupage.name');
    Route::get('template/{pagename}', [TemplateController::class, 'index']);

    // MENU CREATE PAGE
    Route::post('menupage/{pagename}', [MenupageController::class, 'getpageid']);
    Route::post('menupage-remove/{id}', [MenupageController::class, 'pageremove']);
    Route::get('menupage/{pagename}/{id}', [MenupageController::class, 'createpage']);
    Route::post('pagenamesave', [MenupageController::class, 'pagenamesave'])->name('pagenamesave');
    Route::post('footersave', [MenupageController::class, 'footersave'])->name('footersave');

    Route::post('category-create', [MenupageController::class, 'categorycreate'])->name('category.create');
    Route::post('category-update', [MenupageController::class, 'categoryupdate'])->name('category.update');
    Route::post('category-remove', [MenupageController::class, 'categoryremove'])->name('category.remove');

    Route::post('content-create', [MenupageController::class, 'contentcreate'])->name('content.create');
    Route::post('content-update', [MenupageController::class, 'contentupdate'])->name('content.update');
    Route::post('content-remove', [MenupageController::class, 'contentremove'])->name('content.remove');

    Route::get('restaurant', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::post('res-create', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('res-update', [RestaurantController::class, 'update'])->name('restaurant.update');
    Route::post('res-remove/{id}', [RestaurantController::class, 'remove'])->name('restaurant.remove');

});

//clear cache

Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return 'Config cache cleared';
});

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return 'Config cache cleared';
});


Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
});
