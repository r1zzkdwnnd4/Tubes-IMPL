<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AgenAuthController;
use App\Http\Controllers\Auth\AdminCustomerController;
use App\Http\Controllers\Auth\BookingController;
use App\Http\Controllers\Auth\PaymentController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.home')->name('home');

/*
|--------------------------------------------------------------------------
| CUSTOMER AUTH
|--------------------------------------------------------------------------
*/
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

/*
|--------------------------------------------------------------------------
| CUSTOMER (AUTHENTICATED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:customer')->group(function () {

    // HOME
    Route::get('/customer/home', fn () => view('pages.customerHome'))
        ->name('customer.home');

    // BOOKING
    Route::get('/customer/booking', [BookingController::class, 'create'])
        ->name('form.booking');

    Route::post('/customer/booking', [BookingController::class, 'store'])
        ->name('customer.booking.store');

    // PAYMENT
    Route::get('/customer/payment', [PaymentController::class, 'show'])
        ->name('customer.payment');

    Route::post('/customer/konfirmasi', [PaymentController::class, 'konfirmasi'])
        ->name('customer.konfirmasi');

    Route::get('/customer/konfirmasi', fn () => view('pages.konfirmasi-pembayaran'))
        ->name('konfirmasi.pembayaran');

    // TIKET (PAKAI KODE BOOKING)
    Route::get('/customer/tiket/{kode_booking}', 
        [PaymentController::class, 'tiket']
    )->name('customer.tiket');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.process');

Route::middleware('auth:admin')->group(function () {

    // DASHBOARD
    Route::get('/admin/dashboard', fn () => view('pages.adminDashboard'))
        ->name('admin.dashboard');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // MANAJEMEN WISATA
    Route::get('/admin/manajemen-wisata', fn () => view('pages.adminManajemenWisata'))
        ->name('admin.wisata');

    // MANAJEMEN CUSTOMER
    Route::get('/admin/manajemen-customer', [AdminCustomerController::class, 'index'])
        ->name('admin.customer');

    Route::post('/admin/manajemen-customer', [AdminCustomerController::class, 'store'])
        ->name('admin.customer.store');

    Route::put('/admin/manajemen-customer/{id}', [AdminCustomerController::class, 'update'])
        ->name('admin.customer.update');

    Route::delete('/admin/manajemen-customer/{id}', [AdminCustomerController::class, 'destroy'])
        ->name('admin.customer.delete');

    // MANAJEMEN AGEN
    Route::get('/admin/manajemen-agen', fn () => view('pages.adminManajemenAgen'))
        ->name('admin.agen');

    // HISTORY TRANSAKSI
    Route::get('/admin/manajemen-transaksi', fn () => view('pages.adminHistoryTransaksi'))
        ->name('admin.transaksi');
});

/*
|--------------------------------------------------------------------------
| AGEN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/agen/login', [AgenAuthController::class, 'showLogin'])
    ->name('agen.login');

Route::post('/agen/login', [AgenAuthController::class, 'login'])
    ->name('agen.login.process');

Route::middleware('auth:agen')->group(function () {

    Route::get('/agen/dashboard', fn () => view('pages.agenDashboard'))
        ->name('agen.dashboard');

    Route::post('/agen/logout', [AgenAuthController::class, 'logout'])
        ->name('agen.logout');
});
