<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\Auth\SetBankDetailsController;
use App\Http\Controllers\Auth\SetCouponController;
use App\Http\Controllers\Auth\SuccessController;
use App\Http\Controllers\SettingsController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Auth::routes();

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::middleware(['guest', 'reg'])->group(function () {
    Route::get('/password', [SetPasswordController::class, 'index'])->name('password');
    Route::post('/password', [SetPasswordController::class, 'store']);

    Route::get('/bank', [SetBankDetailsController::class, 'index'])->name('bank');
    Route::post('/bank', [SetBankDetailsController::class, 'store']);

    Route::get('/coupon', [SetCouponController::class, 'index'])->name('coupon');
    Route::post('/coupon', [SetCouponController::class, 'store']);

    Route::get('/success', [SuccessController::class, 'index'])->name('success');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/home/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::put('/home/settings', [App\Http\Controllers\SettingsController::class, 'changePassword'])->name('settings.password');
Route::post('/home/settings', [App\Http\Controllers\SettingsController::class, 'changeBank'])->name('settings.bank');
