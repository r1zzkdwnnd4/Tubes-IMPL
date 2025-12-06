<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;

// ======================
// ROUTE PUBLIC
// ======================

Route::view('/', 'pages.home')->name('home');
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');
Route::view('/form-booking', 'pages.form-booking')->name('form.booking');
Route::view('/payment', 'pages.payment')->name('payment');
Route::view('/konfirmasi-pembayaran', 'pages.konfirmasi-pembayaran')->name('payment.confirm');
Route::view('/tiket', 'pages.tiket')->name('ticket');


use App\Http\Controllers\Auth\PublicAuthController;

Route::post('/login', [PublicAuthController::class, 'login'])->name('login.process');

// ======================
// ROUTE ADMIN
// ======================
Route::prefix('admin')->group(function () {

    // Login Admin (TANPA middleware admin)
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.process');

    // Semua halaman admin yang BUTUH login admin
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('pages.adminDashboard'); 
        })->name('admin.dashboard');

        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});
