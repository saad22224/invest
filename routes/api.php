<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlanController;

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
    Route::post('resendVerificationCode', 'authController@resendVerificationCode');
    Route::post('login', 'authController@login');
    Route::post('logout', 'authController@logout');
    Route::post('refresh', 'authController@refresh');
    Route::post('me', 'authController@me');

});



// الاشتراك في خطة
Route::post('/subscribe', [PlanController::class, 'subscribeToPlan']);

//  بيجلب كل الخطط
Route::post('/users-plan', [PlanController::class, 'getuserplan']);
// check plans
Route::post('/checkplan', [PlanController::class, 'checkplan']);

// جلب كل الخطط
Route::get('/plans', [PlanController::class, 'getplans']);

// سحب مبلغ من الرصيد
Route::post('/withdraw', [PlanController::class, 'withdraw']);

// آخر المعاملات (سحب، إيداع، اشتراكات)
Route::post('/last-transactions', [PlanController::class, 'lastWithdrawals']);

// نتيجة خطة المستخدم
Route::post('/plan-result', [PlanController::class, 'planresult']);


Route::get('/getoffers', [PlanController::class, 'getoffers']);

Route::post('/getuserprofit' , [PlanController::class, 'getuserprofit']);


Route::get('/notifications' , [PlanController::class, 'notifications']);
