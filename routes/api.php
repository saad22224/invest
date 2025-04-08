<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
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
    Route::post('login', 'authController@login');
    Route::post('logout', 'authController@logout');
    Route::post('refresh', 'authController@refresh');
    Route::post('me', 'authController@me');

});



// brands

Route::resource("brands"  , BrandController::class)->except(['store' , 'update' , 'destroy']);
Route::middleware(['admin'])->group(function () {
    Route::post("brands", [BrandController::class, 'store']);
    Route::put("brands/{brand}", [BrandController::class, 'update']);
    Route::delete("brands/{brand}", [BrandController::class, 'destroy']);
});
// categories

Route::resource("categories"  , CategoryController::class)->except(['store' , 'update' , 'destroy']);
Route::middleware(['admin'])->group(function () {
    Route::post("categories", [CategoryController::class, 'store']);
    Route::put("categories/{brand}", [CategoryController::class, 'update']);
    Route::delete("categories/{brand}", [CategoryController::class, 'destroy']);
});
// location
Route::resource("location"  , LocationController::class);



// product
Route::resource("product"  , ProductController::class)->except(['store' , 'update' , 'destroy']);
Route::middleware(['admin'])->group(function () {
    Route::post("product", [ProductController::class, 'store']);
    Route::put("product/{product}", [ProductController::class, 'update']);
    Route::delete("product/{product}", [ProductController::class, 'destroy']);
});

// orders
Route::resource("orders"  , OrderController::class)->except(['destroy']);
Route::middleware(['admin'])->group(function () {
    Route::delete("orders/{order}", [OrderController::class, 'destroy']);
});
Route::get('getuserorders' , [OrderController::class , 'getuserorders']);
Route::put('changeorderstatus/{id}' , [OrderController::class , 'changeorderstatus'])->middleware('admin');



// cart

Route::resource("cart"  , CartController::class);

Route::get('getusercart' , [CartController::class , 'getusercart']);



Route::delete('removefromcart' , [CartController::class , 'getusercart']);

Route::get('/carttotal', [CartController::class, 'getCartTotal']);


Route::resource("wishlist"  , WishlistController::class);
Route::get("getuserwishlist"  , [WishlistController::class , 'getuserwishlist']);
Route::delete("removefromwishlist"  , [WishlistController::class , 'removefromwishlist']);