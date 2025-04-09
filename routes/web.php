<?php

use App\Http\Controllers\admin\PlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('etharadmin', function () {
    return view('dashboard.login');
});

Route::post('etharadmin/login' , [AdminLoginController::class , 'login'])->name('admin.login');
Route::post('etharadmin/logout' , [AdminLoginController::class , 'logout'])->name('admin.logout');

Route::get('etharadmin/dashboard', function () {
    return view('dashboard.index');
})->name('admin.dashboard')->middleware('admin');


Route::resource('users', UserController::class)
->middleware('admin');

Route::post('users/{id}/addmoney', [UserController::class, 'addmoney'])
->middleware('admin')->name('users.addmoney');


// plans

Route::resource('plans', PlanController::class)
->middleware('admin');
