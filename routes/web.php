<?php

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;

Route::view('/', 'pages.home')->name('home');

// -----------------------
// CUSTOMER AUTH
// -----------------------
Route::get('/customer/register', [CustomerAuthController::class, 'showRegister'])
    ->name('customer.register');

Route::post('/customer/register', [CustomerAuthController::class, 'register'])
    ->name('customer.register.process');

Route::get('/customer/login', [CustomerAuthController::class, 'showLogin'])
    ->name('customer.login');

Route::post('/customer/login', [CustomerAuthController::class, 'login'])
    ->name('customer.login.process');

Route::post('/customer/logout', [CustomerAuthController::class, 'logout'])
    ->name('customer.logout');

Route::get('/customer/home', fn() => view('pages.customerHome'))
    ->name('customer.home')
    ->middleware('auth:customer');

Route::view('/form-booking', 'pages.form-booking')->name('form.booking');


// -----------------------
// ADMIN AUTH
// -----------------------
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.process');

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', fn() => view('pages.adminDashboard'))
            ->name('admin.dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])
            ->name('admin.logout');
    });
});
