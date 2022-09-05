<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});



Auth::routes();

//Route::get('/under-contruction', 'MaintananceController@index')->name('under-construction');
//Route::get('/', 'MaintananceController@comingSoon')->name('home');
Route::get('/test', 'Core\MainController@test')->name('test');
//Route::get('/test-email', 'Core\MainController@testingMail')->name('test');

// =========== MAINMENU
Route::get('/', 'Core\MainController@index')->name('home');
Route::get('/about', 'Core\MainController@about')->name('about');

Route::get('/faq', 'Core\MainController@faq')->name('faq');

Route::get('/testimonial/{token}', 'Core\MainController@testimonial')->name('testimonial');
Route::post('/testimonial/{token}', 'Core\MainController@testimonialStore')->name('testimonialPost');

// Login Google
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

// Event
Route::group(['prefix' => 'event','as' => 'event.'], function () {

    Route::get('/{slug}', 'Main\EventController@index')->name('detail');
    Route::get('/{slug}/registration', 'Main\EventController@registration')->name('registration');
    Route::post('/{slug}/registration', 'Main\EventController@registration')->name('registration.store');
    Route::get('/{slug}/guidebook', 'Main\EventController@download')->name('download');

    Route::get('/invitation/team/{token}', 'Main\EventController@invitationTeam')->name('invitation');
    Route::post('/invitation/team/{token}', 'Main\EventController@invitationTeam')->name('invitation.store');

});

// Merchandise
Route::group(['prefix' => 'merchandise','as' => 'merchandise.'], function () {

    Route::get('/', 'Main\MerchandiseController@index')->name('main');
    Route::get('/detail/{slug}', 'Main\MerchandiseController@detail')->name('detail');
    Route::post('/add-cart/{slug}', 'Main\MerchandiseController@addCart')->name('addCart');
    Route::get('/remove-cart', 'Main\MerchandiseController@destroyCart')->name('removeCart');

    Route::get('/cart', 'Main\MerchandiseController@cart')->name('cart');
    Route::get('/checkout', 'Main\MerchandiseController@checkout')->name('checkout');

});


// =========== USER SECTION
Route::group(['prefix' => 'user','as' => 'user.'], function () {

//  Dashboard
    Route::group(['prefix' => 'dashboard','as' => 'dashboard.'], function (){
        Route::get('/', 'Core\UserController@dashboard')->name('main');
    });

//  TASK
    Route::group(['prefix' => 'task','as' => 'task.'], function (){
        Route::get('/', 'User\TaskController@index')->name('main');
        Route::get('/completed', 'User\TaskController@index')->name('completed');
        Route::post('/store/{id}', 'User\TaskController@store')->name('store');
        Route::post('/edit/{id}', 'User\TaskController@edit')->name('edit');
    });

//  PROFILE
    Route::group(['prefix' => 'profile','as' => 'profile.'], function (){
        Route::get('/', 'Core\UserController@profile')->name('main');
        Route::post('/update', 'Core\UserController@updateProfile')->name('update');
        Route::post('/password', 'Core\UserController@updatePassword')->name('password');
    });

});

// =========== ADMIN SECTION
Route::group(['prefix' => 'admin','as' => 'admin.'], function (){

//  Login
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');

//  Dashboard
    Route::group(['prefix' => 'dashboard','as' => 'dashboard.'], function (){
        Route::get('/', 'Core\AdminController@dashboard')->name('main');
    });

//  Inspection
    Route::group(['prefix' => 'inspection','as' => 'inspection.'], function (){
        Route::get('/', 'Admin\Inspection\ParticipantController@index')->name('main');
    });

//  Inskill
    Route::group(['prefix' => 'inskill','as' => 'inskill.'], function (){
        Route::get('/', 'Admin\Inskill\ParticipantController@index')->name('main');
    });

//  Instraining
    Route::group(['prefix' => 'instraining','as' => 'instraining.'], function (){
        Route::get('/', 'Admin\Instraining\ParticipantController@index')->name('main');
    });

//  Intshow
    Route::group(['prefix' => 'intshow','as' => 'intshow.'], function (){
        Route::get('/', 'Admin\Intshow\ParticipantController@index')->name('main');
    });

//  Task Event
    Route::group(['prefix' => 'task','as' => 'event-task.'], function (){
        Route::get('/', 'Admin\Task\TaskController@index')->name('main');
        Route::get('/create', 'Admin\Task\TaskController@create')->name('create');
        Route::post('/create', 'Admin\Task\TaskController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\Task\TaskController@edit')->name('edit');
        Route::post('/edit/{id}', 'Admin\Task\TaskController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\Task\TaskController@delete')->name('delete');

        Route::group(['prefix' => 'response','as' => 'response.'], function (){
            Route::get('/', 'Admin\Task\TaskResponseController@index')->name('main');
            Route::get('detail/{id}', 'Admin\Task\TaskResponseController@detail')->name('detail');
            Route::get('detail/{id}/{status}', 'Admin\Task\TaskResponseController@updateStatus')->name('updateStatus');
            Route::get('download/{id}', 'Admin\Task\TaskResponseController@download')->name('download');
        });

    });

//  Product
    Route::group(['prefix' => 'product','as' => 'product.'], function (){
        Route::get('/', 'Admin\Merchandise\ProductController@index')->name('main');
        Route::get('/create', 'Admin\Merchandise\ProductController@create')->name('create');
        Route::post('/store', 'Admin\Merchandise\ProductController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\Merchandise\ProductController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\Merchandise\ProductController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\Merchandise\ProductController@delete')->name('delete');
    });

//  Slider
    Route::group(['prefix' => 'slider','as' => 'slider.'], function (){
        Route::get('/', 'Admin\SliderController@index')->name('main');
        Route::get('/create', 'Admin\SliderController@create')->name('create');
        Route::post('/store', 'Admin\SliderController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\SliderController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('delete');
    });

//  Sponsor
    Route::group(['prefix' => 'sponsor','as' => 'sponsor.'], function (){
        Route::get('/', 'Admin\SponsorController@index')->name('main');
        Route::get('/create', 'Admin\SponsorController@create')->name('create');
        Route::post('/store', 'Admin\SponsorController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SponsorController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\SponsorController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SponsorController@delete')->name('delete');
    });

//  Testimonial
    Route::group(['prefix' => 'testimonial','as' => 'testimonial.'], function (){
        Route::get('/', 'Admin\TestimonialController@index')->name('main');
        Route::get('/create', 'Admin\TestimonialController@store')->name('create');
        Route::get('/edit/{id}', 'Admin\TestimonialController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\TestimonialController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\TestimonialController@delete')->name('delete');
    });

//  Visitor Statistics
    Route::group(['prefix' => 'statistics','as' => 'statistics.'], function (){
        Route::get('/', 'Core\AdminController@statistics')->name('main');
        Route::post('/filter', 'Core\AdminController@statisticsFilter')->name('filter');
    });

//  Configuration
    Route::group(['prefix' => 'configuration','as' => 'config.'], function (){
        Route::get('/', 'Core\AdminController@configuration')->name('main');
        Route::post('/update', 'Core\AdminController@updateConfig')->name('update');
        Route::post('/update-about', 'Core\AdminController@updateConfigAbout')->name('update-about');
        Route::post('/update-meta', 'Core\AdminController@updateConfigMeta')->name('update-meta');
    });

//  User
    Route::group(['prefix' => 'user','as' => 'user.'], function (){
        Route::get('/', 'Core\AdminController@users')->name('main');
        Route::get('/delete/{id}', 'Core\AdminController@deleteUser')->name('delete');
    });

//  Admin
    Route::group(['prefix' => 'admin','as' => 'admin.'], function (){
        Route::get('/', 'Core\AdminController@admin')->name('main');
        Route::post('/store', 'Core\AdminController@storeAdmin')->name('store');
        Route::get('/delete/{id}', 'Core\AdminController@deleteAdmin')->name('delete');
    });

});
