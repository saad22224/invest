<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'authController@register');
    Route::post('verifyCode', 'authController@verifyCode');
    Route::post('login', 'authController@login');
    Route::post('logout', 'authController@logout');
    Route::post('refresh', 'authController@refresh');
    Route::post('me', 'authController@me');

});



