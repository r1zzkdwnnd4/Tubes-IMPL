<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AgenAuthController;
use App\Http\Controllers\Auth\AdminCustomerController;

// ---------------------
// PUBLIC
// ---------------------
Route::view('/', 'pages.home')->name('home');

// ---------------------
// CUSTOMER AUTH
// ---------------------
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

// ---------------------
// ADMIN AUTH
// ---------------------
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.process');

Route::middleware(['auth:admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', fn() => view('pages.adminDashboard'))
        ->name('admin.dashboard');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Manajemen Wisata
    Route::get('/admin/manajemen-wisata', fn() => view('pages.adminManajemenWisata'))
        ->name('admin.wisata');

    // -------------------------
    // Manajemen Customer
    // -------------------------
    Route::get('/admin/manajemen-customer', [AdminCustomerController::class, 'index'])
        ->name('admin.customer'); // untuk menampilkan view

    Route::post('/admin/manajemen-customer', [AdminCustomerController::class, 'store'])
        ->name('admin.customer.store');

    Route::put('/admin/manajemen-customer/{id}', [AdminCustomerController::class, 'update'])
        ->name('admin.customer.update');

    Route::delete('/admin/manajemen-customer/{id}', [AdminCustomerController::class, 'destroy'])
        ->name('admin.customer.delete');

    // Manajemen Agen
    Route::get('/admin/manajemen-agen', fn() => view('pages.adminManajemenAgen'))
        ->name('admin.agen');

    // Manajemen Transaksi
    Route::get('/admin/manajemen-transaksi', fn() => view('pages.adminHistoryTransaksi'))
        ->name('admin.transaksi');
});

// ---------------------
// AGEN AUTH
// ---------------------
Route::get('/agen/login', [AgenAuthController::class, 'showLogin'])
    ->name('agen.login');
Route::post('/agen/login', [AgenAuthController::class, 'login'])
    ->name('agen.login.process');

Route::middleware('auth:agen')->group(function () {
    Route::get('/agen/dashboard', fn() => view('pages.agenDashboard'))
        ->name('agen.dashboard');

    Route::post('/agen/logout', [AgenAuthController::class, 'logout'])
        ->name('agen.logout');
});
