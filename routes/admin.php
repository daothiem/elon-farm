<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['backend'])->group(function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::get('/login', ['uses' => 'Admin\AuthController@getLogin'])->name('admin.login');
        Route::post('/login', ['uses' => 'Admin\AuthController@postLogin'])->name('admin.login');
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', ['uses' => 'Admin\AdminController@index'])->name('admin.index');
            Route::get('/tin-tuc', ['uses' => 'Admin\NewsController@index'])->name('admin.news.index');
            Route::get('/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@index'])->name('admin.newsCategory.index');
            Route::get('/them-moi/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@create'])->name('admin.newsCategory.create');
            Route::post('/them-moi/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@store'])->name('admin.newsCategory.store');
            Route::get('/{id}/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@edit'])->name('admin.newsCategory.edit');
            Route::put('/{id}/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@update'])->name('admin.newsCategory.update');
            Route::delete('/{id}/danh-muc-tin-tuc', ['uses' => 'Admin\NewsCategoryController@destroy'])->name('admin.newsCategory.destroy');

            Route::get('/tin-tuc', ['uses' => 'Admin\NewsController@index'])->name('admin.news.index');
            Route::get('/them-moi/tin-tuc', ['uses' => 'Admin\NewsController@create'])->name('admin.news.create');
            Route::post('/them-moi/tin-tuc', ['uses' => 'Admin\NewsController@store'])->name('admin.news.store');
            Route::put('/{id}/tin-tuc', ['uses' => 'Admin\NewsController@update'])->name('admin.news.update');
            Route::get('/{id}/tin-tuc', ['uses' => 'Admin\NewsController@edit'])->name('admin.news.edit');
            Route::delete('/{id}/tin-tuc', ['uses' => 'Admin\NewsController@destroy'])->name('admin.news.destroy');

            Route::get('/danh-muc', ['uses' => 'Admin\CategoryController@index'])->name('admin.categories.index');
            Route::get('/them-moi/danh-muc', ['uses' => 'Admin\CategoryController@create'])->name('admin.categories.create');
            Route::post('/them-moi/danh-muc', ['uses' => 'Admin\CategoryController@store'])->name('admin.categories.store');
            Route::put('/{id}/danh-muc', ['uses' => 'Admin\CategoryController@update'])->name('admin.categories.update');
            Route::get('/{id}/danh-muc', ['uses' => 'Admin\CategoryController@edit'])->name('admin.categories.edit');
            Route::delete('/{id}/danh-muc', ['uses' => 'Admin\CategoryController@destroy'])->name('admin.categories.destroy');
            Route::get('/danh-muc-root', ['uses' => 'Admin\CategoryController@categoryRoot'])->name('admin.categories.category-root');

            Route::get('/tour', ['uses' => 'Admin\ProductController@index'])->name('admin.products.index');
            Route::get('/create/tour', ['uses' => 'Admin\ProductController@create'])->name('admin.products.create');
            Route::post('/create/tour', ['uses' => 'Admin\ProductController@store'])->name('admin.products.store');
            Route::put('/{id}/tour', ['uses' => 'Admin\ProductController@update'])->name('admin.products.update');
            Route::get('/{id}/tour', ['uses' => 'Admin\ProductController@edit'])->name('admin.products.edit');
            Route::delete('/{id}/tour', ['uses' => 'Admin\ProductController@destroy'])->name('admin.products.destroy');

            Route::get('/amenity', ['uses' => 'Admin\AmenityController@index'])->name('admin.amenities.index');
            Route::get('/create/amenity', ['uses' => 'Admin\AmenityController@create'])->name('admin.amenities.create');
            Route::post('/create/amenity', ['uses' => 'Admin\AmenityController@store'])->name('admin.amenities.store');
            Route::put('/{id}/amenity', ['uses' => 'Admin\AmenityController@update'])->name('admin.amenities.update');
            Route::get('/{id}/amenity', ['uses' => 'Admin\AmenityController@edit'])->name('admin.amenities.edit');
            Route::delete('/{id}/amenity', ['uses' => 'Admin\AmenityController@destroy'])->name('admin.amenities.destroy');

            Route::get('/about-us', ['uses' => 'Admin\AboutUsController@view'])->name('admin.about_us.view');
            Route::put('/about-us/update', ['uses' => 'Admin\AboutUsController@update'])->name('admin.about_us.update');

            Route::get('/khach-hang', ['uses' => 'Admin\CustomerController@index'])->name('admin.customers.index');
            Route::get('/them-moi/khach-hang', ['uses' => 'Admin\CustomerController@create'])->name('admin.customers.create');
            Route::post('/them-moi/khach-hang', ['uses' => 'Admin\CustomerController@store'])->name('admin.customers.store');
            Route::put('/{id}/khach-hang', ['uses' => 'Admin\CustomerController@update'])->name('admin.customers.update');
            Route::get('/{id}/khach-hang', ['uses' => 'Admin\CustomerController@edit'])->name('admin.customers.edit');
            Route::delete('/{id}/khach-hang', ['uses' => 'Admin\CustomerController@destroy'])->name('admin.customers.destroy');

            Route::get('/dich-vu', ['uses' => 'Admin\ServiceController@index'])->name('admin.services.index');
            Route::get('/them-moi/dich-vu', ['uses' => 'Admin\ServiceController@create'])->name('admin.services.create');
            Route::post('/them-moi/dich-vu', ['uses' => 'Admin\ServiceController@store'])->name('admin.services.store');
            Route::put('/{id}/dich-vu', ['uses' => 'Admin\ServiceController@update'])->name('admin.services.update');
            Route::get('/{id}/dich-vu', ['uses' => 'Admin\ServiceController@edit'])->name('admin.services.edit');
            Route::delete('/{id}/dich-vu', ['uses' => 'Admin\ServiceController@destroy'])->name('admin.services.destroy');

            Route::get('/don-hang', ['uses' => 'Admin\OrderController@index'])->name('admin.orders.index');

            Route::get('/product-review', ['uses' => 'Admin\ProductReviewController@index'])->name('admin.product_reviews.index');
            Route::get('/them-moi/product-review', ['uses' => 'Admin\ProductReviewController@create'])->name('admin.product_reviews.create');
            Route::post('/them-moi/product-review', ['uses' => 'Admin\ProductReviewController@store'])->name('admin.product_reviews.store');
            Route::put('/{id}/product-review', ['uses' => 'Admin\ProductReviewController@update'])->name('admin.product_reviews.update');
            Route::get('/{id}/product-review', ['uses' => 'Admin\ProductReviewController@edit'])->name('admin.product_reviews.edit');
            Route::delete('/{id}/product-review', ['uses' => 'Admin\ProductReviewController@destroy'])->name('admin.product_reviews.destroy');

            Route::get('/menu', ['uses' => 'Admin\MenuController@index'])->name('admin.menus.index');
            Route::get('/them-moi/menu', ['uses' => 'Admin\MenuController@create'])->name('admin.menus.create');
            Route::post('/them-moi/menu', ['uses' => 'Admin\MenuController@store'])->name('admin.menus.store');
            Route::put('/{id}/menu', ['uses' => 'Admin\MenuController@update'])->name('admin.menus.update');
            Route::get('/{id}/menu', ['uses' => 'Admin\MenuController@edit'])->name('admin.menus.edit');
            Route::delete('/{id}/menu', ['uses' => 'Admin\MenuController@destroy'])->name('admin.menus.destroy');

            Route::get('/user', ['uses' => 'Admin\UserController@index'])->name('admin.users.index');
            Route::get('/them-moi/user', ['uses' => 'Admin\UserController@create'])->name('admin.users.create');
            Route::post('/them-moi/user', ['uses' => 'Admin\UserController@store'])->name('admin.users.store');
            Route::put('/{id}/user', ['uses' => 'Admin\UserController@update'])->name('admin.users.update');
            Route::put('/{id}/user/reset', ['uses' => 'Admin\UserController@resetPassword'])->name('admin.users.resetPassword');
            Route::get('/{id}/user', ['uses' => 'Admin\UserController@edit'])->name('admin.users.edit');
            Route::delete('/{id}/user', ['uses' => 'Admin\UserController@destroy'])->name('admin.users.destroy');
            Route::put('/user/changePassword', ['uses' => 'Admin\UserController@changePassword'])->name('admin.users.changePassword');

            Route::get('/nhan-vien', ['uses' => 'Admin\StaffController@index'])->name('admin.staffs.index');
            Route::get('/them-moi/nhan-vien', ['uses' => 'Admin\StaffController@create'])->name('admin.staffs.create');
            Route::post('/them-moi/nhan-vien', ['uses' => 'Admin\StaffController@store'])->name('admin.staffs.store');
            Route::put('/{id}/nhan-vien', ['uses' => 'Admin\StaffController@update'])->name('admin.staffs.update');
            Route::get('/{id}/nhan-vien', ['uses' => 'Admin\StaffController@edit'])->name('admin.staffs.edit');
            Route::delete('/{id}/nhan-vien', ['uses' => 'Admin\StaffController@destroy'])->name('admin.staffs.destroy');

            Route::get('/sliders', ['uses' => 'Admin\SliderController@index'])->name('admin.sliders.index');
            Route::get('/them-moi/sliders', ['uses' => 'Admin\SliderController@create'])->name('admin.sliders.create');
            Route::post('/them-moi/sliders', ['uses' => 'Admin\SliderController@store'])->name('admin.sliders.store');
            Route::put('/{id}/sliders', ['uses' => 'Admin\SliderController@update'])->name('admin.sliders.update');
            Route::get('/{id}/sliders', ['uses' => 'Admin\SliderController@edit'])->name('admin.sliders.edit');
            Route::delete('/{id}/slider', ['uses' => 'Admin\SliderController@destroy'])->name('admin.sliders.destroy');

            Route::get('/posters', ['uses' => 'Admin\PosterController@index'])->name('admin.posters.index');
            Route::get('/them-moi/poster', ['uses' => 'Admin\PosterController@create'])->name('admin.posters.create');
            Route::post('/them-moi/posters', ['uses' => 'Admin\PosterController@store'])->name('admin.posters.store');
            Route::put('/{id}/posters', ['uses' => 'Admin\PosterController@update'])->name('admin.posters.update');
            Route::get('/{id}/poster', ['uses' => 'Admin\PosterController@edit'])->name('admin.posters.edit');
            Route::delete('/{id}/poster', ['uses' => 'Admin\PosterController@destroy'])->name('admin.posters.destroy');

            Route::get('/promotion', ['uses' => 'Admin\PromotionController@index'])->name('admin.promotions.index');
            Route::get('/them-moi/promotion', ['uses' => 'Admin\PromotionController@create'])->name('admin.promotions.create');
            Route::post('/them-moi/promotion', ['uses' => 'Admin\PromotionController@store'])->name('admin.promotions.store');
            Route::put('/{id}/promotion', ['uses' => 'Admin\PromotionController@update'])->name('admin.promotions.update');
            Route::get('/{id}/promotion', ['uses' => 'Admin\PromotionController@edit'])->name('admin.promotions.edit');
            Route::delete('/{id}/promotion', ['uses' => 'Admin\PromotionController@destroy'])->name('admin.promotions.destroy');
        });
    });
});


