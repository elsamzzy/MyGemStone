<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\LoginController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', ApiController::class);
Route::resource('login', LoginController::class);
Route::get('/login/info/{info}', [LoginController::class, 'getInfo']);

Route::get('/users/email/{user}', [ApiController::class, 'verifyEmail']);
Route::get('/users/phone/{user}', [ApiController::class, 'verifyPhone']);
Route::get('/users/username/{user}', [ApiController::class, 'verifyUsername']);
Route::get('/users/coupon/{id}/{coupon}', [ApiController::class, 'verifyCoupon']);
Route::put('/users/coupon/{id}', [ApiController::class, 'updateCoupon']);
Route::post('/users/password/{id}', [ApiController::class, 'password']);
Route::get('/users/encrypt/{details}', [ApiController::class, 'encryptUser']);


