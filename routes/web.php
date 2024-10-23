<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\StripeController;

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
})->name('home');

Route::get('/login', function () {
    return view('authentification-template');
})->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

//gestion password
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
//activation
Route::get('/activate/{token}', [ActivationController::class, 'activateAccount'])->name('activation');
Route::get('/activate-message', [ActivationController::class, 'activationMessage'])->name('activation.message');


//user 
Route::get('/users', function () {
    return view('users.users');
})->name('users');

Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);


Route::get('/cv', function () {
    return view('cs-canadienne');
});


Route::get('/payment', function () {
    return view('payment.index');
})->name('payment');
Route::get('/success', function () {
    return view('payment.paypale.success');
})->name('payment');
//payment with paypal
Route::get('create-payment', [PaypalController::class, 'createPayment'])->name('create.payment');
Route::get('paypal-success', [PaypalController::class, 'paymentSuccess'])->name('paypal.success');
Route::get('paypal-cancel', [PaypalController::class, 'paymentCancel'])->name('paypal.cancel');
//payment with stripe 
Route::get('/stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

//multisteps form

Route::get('/form/multisteps', function () {
    return view('forms.multisteps');
})->name('form.multisteps');