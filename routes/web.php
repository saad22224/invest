<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
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