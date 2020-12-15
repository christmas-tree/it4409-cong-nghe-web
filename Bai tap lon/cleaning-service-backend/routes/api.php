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

Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::match(['get', 'post'] ,'me', 'App\Http\Controllers\AuthController@me');
    Route::patch('password/change', 'App\Http\Controllers\AuthController@changePassword');

    Route::apiResource('reviews', 'App\Http\Controllers\Api\ReviewController');
    Route::apiResource('bookings', 'App\Http\Controllers\Api\BookingController')->only(['store', 'show']);
    Route::apiResource('services', 'App\Http\Controllers\Api\ServiceController')->only(['index', 'show']);

    Route::group(['middleware' => ['auth.jwt', 'active']], function () {
        Route::patch('bookings/{booking}/cancel', [\App\Http\Controllers\Api\BookingController::class, 'cancel'])->name('bookings.cancel');
        Route::get('user/bookings', [\App\Http\Controllers\Api\UserController::class, 'getBookings'])->name('user.booking');
        Route::patch('profile', [\App\Http\Controllers\Api\UserController::class, 'updateProfile'])->name('profile.update');

        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
            Route::apiResource('bookings', 'App\Http\Controllers\Api\admin\BookingController');
            Route::apiResource('services', 'App\Http\Controllers\Api\ServiceController');
            Route::apiResource('users', 'App\Http\Controllers\Api\UserController');
            Route::patch('users/{user}/lock', [\App\Http\Controllers\Api\UserController::class, 'lock'])->name('users.lock');
            Route::patch('users/{user}/unlock', [\App\Http\Controllers\Api\UserController::class, 'unlock'])->name('users.unlock');

            Route::get('/profit', [\App\Http\Controllers\Api\admin\AdminController::class, 'profitPerMonth'])->name('profit');
            Route::get('/rating', [\App\Http\Controllers\Api\admin\AdminController::class, 'rating'])->name('rating');
        });
    });
});
