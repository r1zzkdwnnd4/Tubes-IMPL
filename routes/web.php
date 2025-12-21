<?php

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AgenAuthController;

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

Route::get('/payment', function () {
    return view('pages.payment');
});

// -----------------------
// ADMIN AUTH
// -----------------------
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.process');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('pages.adminDashboard');
    })->name('admin.dashboard');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});


// ---------------------
// AGEN
// ---------------------

// LOGIN AGEN (TANPA LOGIN DULU)
Route::get('/agen/login', [AgenAuthController::class, 'showLogin'])
    ->name('agen.login');

Route::post('/agen/login', [AgenAuthController::class, 'login'])
    ->name('agen.login.process');


// HALAMAN KHUSUS AGEN YANG SUDAH LOGIN
Route::middleware('auth:agen')->group(function () {

    Route::get('/agen/dashboard', fn() => view('pages.agenDashboard'))
        ->name('agen.dashboard');

    Route::post('/agen/logout', [AgenAuthController::class, 'logout'])
        ->name('agen.logout');

});


// ---------------------
// TicketController
// ---------------------

use App\Http\Controllers\Auth\TicketController;

Route::get('/ticket/generate/{transactionId}', [TicketController::class, 'generate'])
    ->name('ticket.generate');

Route::get('/ticket/{id}', [TicketController::class, 'show'])
    ->name('ticket.show');

