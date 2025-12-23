<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AgenAuthController;
use App\Http\Controllers\Auth\BookingController;
use App\Http\Controllers\Auth\PaymentController;

/*
|--------------------------------------------------------------------------
| HOME
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

Route::get('/customer/home', fn () => view('pages.customerHome'))
    ->name('customer.home')
    ->middleware('auth:customer');

/*
|--------------------------------------------------------------------------
| CUSTOMER BOOKING
|--------------------------------------------------------------------------
*/
Route::middleware('auth:customer')->group(function () {

    // tampilkan form booking
    Route::get('/customer/booking', [BookingController::class, 'create'])
        ->name('form.booking');

    // simpan booking (submit form)
    Route::post('/customer/booking', [BookingController::class, 'store'])
        ->name('customer.booking.store');

    
    Route::middleware('auth:customer')->group(function () {

    Route::get('/customer/payment', [PaymentController::class, 'show'])
        ->name('customer.payment');

    Route::post('/customer/konfirmasi', [PaymentController::class, 'konfirmasi'])
        ->name('customer.konfirmasi');

    Route::get('/customer/konfirmasi', function () {
        return view('pages.konfirmasi-pembayaran');
    })->name('konfirmasi.pembayaran');

});

    Route::get('/customer/konfirmasi', function () {
        return view('pages.konfirmasi-pembayaran');
    })->name('konfirmasi.pembayaran');
});


Route::get('/customer/tiket/{kode_booking}', 
    [PaymentController::class, 'tiket']
)->name('customer.tiket');

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

    Route::get('/admin/dashboard', fn () => view('pages.adminDashboard'))
        ->name('admin.dashboard');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    Route::get('/admin/manajemen-wisata', fn () => view('pages.adminManajemenWisata'))
        ->name('admin.wisata');

    Route::get('/admin/manajemen-customer', fn () => view('pages.adminManajemenCustomer'))
        ->name('admin.customer');

    Route::get('/admin/manajemen-agen', fn () => view('pages.adminManajemenAgen'))
        ->name('admin.agen');

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
