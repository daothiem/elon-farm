<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/checkURL', ['uses' => 'HomeController@checkURL'])->name('admin.checkURL');
Route::get('/options/{module}/tags', ['uses' => 'HomeController@getAllTags'])->name('admin.get-all-tags');
Route::post('/create/tag',['uses' => 'HomeController@storeTag'])->name('api.store.tags');
Route::post('/upload-image/{module}',['uses' => 'HomeController@uploadImage'])->name('api.upload-image');
Route::get('/product/images',['uses' => 'HomeController@getImageProduct'])->name('api.get-image-product');
Route::post('/send-mail-contact',['uses' => 'HomeController@sendMailContact'])->name('api.sendMailContact');
Route::get('/get-product/{id}',['uses' => 'HomeController@getProductId'])->name('api.get-detail-product');
Route::get('/districts/{provinceCode}',['uses' => 'HomeController@getDistrictByProvince'])->name('api.get-district-by-province');
Route::get('/ward/{districtCode}',['uses' => 'HomeController@getWardByProvince'])->name('api.get-ward-by-province');
Route::post('/create-order',['uses' => 'HomeController@createOrder'])->name('api.create-order');
Route::post('/change-status-order',['uses' => 'HomeController@changeStatusOrder'])->name('api.change-status-order');
Route::post('/promotion/{id}',['uses' => 'HomeController@getPromotion'])->name('api.get-promotion');
Route::post('/modules/product/ajax/ajax',['uses' => 'HomeController@getColor'])->name('api.get-color');
Route::post('/get-preview', ['uses' => 'HomeController@getPreview'])->name('api.get-preview');
