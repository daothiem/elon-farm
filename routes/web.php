<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/sitemap.xml', [App\Http\Controllers\Frontend\FrontendController::class, 'siteMap'])->name('frontend.siteMap');
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

//Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');


//Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware(['frontend'])->group(function () {
    Route::get('lang/{locale}', [App\Http\Controllers\HomeController::class, 'lang'])->name('frontend.changeLanguage');

    Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
    Route::get('/san-pham/search', ['uses' => 'Frontend\FrontendController@product_search'])->name('frontend.product_search');
    Route::get('/ve-chung-toi', ['uses' => 'Frontend\FrontendController@aboutUs'])->name('frontend.aboutUs');
    Route::get('/gio-hang', ['uses' => 'Frontend\FrontendController@cart'])->name('frontend.cart');
    Route::post('/', ['uses' => 'Frontend\FrontendController@sendMailContact'])->name('frontend.sendMailContact');
    Route::get('/lien-he', ['uses' => 'Frontend\FrontendController@contact'])->name('frontend.contact');
    Route::get('/cua-hang', ['uses' => 'Frontend\FrontendController@store'])->name('frontend.store');
    //Route::get('/tin-tuc', ['uses' => 'Frontend\FrontendController@listNews'])->name('frontend.news.list');
    Route::get('/danh-muc-san-pham', ['uses' => 'Frontend\FrontendController@listCategory'])->name('frontend.categories.list');
    Route::get('/list-tour', ['uses' => 'Frontend\FrontendController@listProduct'])->name('frontend.products.list');
    Route::get('/dich-vu-sua-chua', ['uses' => 'Frontend\FrontendController@repairService'])->name('frontend.repair_service');
    Route::get('/{alias}', ['uses' => 'Frontend\FrontendController@view'])->name('frontend.view');
});
