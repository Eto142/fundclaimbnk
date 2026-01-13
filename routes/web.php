<?php

use App\Http\Controllers\Auth\AccessCodeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\User\DashboardController;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {
    return view('home.homepage');
});





// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('show.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// Logout Route
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');
Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.form');
Route::post('/verify', [AuthController::class, 'verifyCode'])->name('verify.code');



// Route::get('/access-code', [AccessCodeController::class, 'show'])->name('access.code');
// Route::post('/access-code', [AccessCodeController::class, 'verify'])->name('access.code.verify');





Route::get('forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgot.password.form');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot.password.submit');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.submit');





Route::middleware(['auth', 'verified'])->group(function () {
    
Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');

Route::get('/payment-history', [DashboardController::class, 'PaymentHistory'])->name('payment.history');
Route::get('/transfers', [DashboardController::class, 'TransferPage'])->name('transfers');
Route::get('/profile', [DashboardController::class, 'ProfilePage'])->name('profile');



});