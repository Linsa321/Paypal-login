<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalPaymentController;

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


Route::get('/', [PaypalPaymentController::class, 'index'])->name('paypal.index');
Route::post('login', [PaypalPaymentController::class, 'login'])->name('paypal.login');
Route::any('paypal-success-return', [PaypalPaymentController::class, 'success'])->name('paypal.successreturn');
Route::get('user', [PaypalPaymentController::class, 'user'])->name('paypal.user');