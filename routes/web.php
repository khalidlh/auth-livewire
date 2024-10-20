<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
});

Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);
