<?php

use Illuminate\Support\Facades\Route;

// CUSTOMER
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\CustomerHomeController;
use App\Http\Controllers\Auth\BookingController;
use App\Http\Controllers\Auth\PaymentController;
use App\Http\Controllers\Auth\WisataKatalogController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\CustomerHistoryController;
use App\Http\Controllers\Auth\AgenPesananController;


// ADMIN
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AdminCustomerController;
use App\Http\Controllers\Auth\AdminTransaksiController;
use App\Http\Controllers\Auth\AdminWisataController;
use App\Http\Controllers\Auth\AdminAgenController;
use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\Auth\AdminLaporanController;

// AGEN
use App\Http\Controllers\Auth\AgenAuthController;
use App\Http\Controllers\Auth\AgenDashboardController;
use App\Http\Controllers\Auth\AgenPaketController;
use App\Http\Controllers\Auth\AgenRiwayatController;

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

//reset password customer

Route::get('/customer/reset-password', function () {
    return view('pages.reset-password');
})->name('customer.reset.form');

Route::post('/customer/reset-password', 
    [CustomerAuthController::class, 'resetPassword']
)->name('customer.reset.process');


/*
|--------------------------------------------------------------------------
| CUSTOMER (AUTHENTICATED)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:customer')->group(function () {

    // HOME (PAKAI CONTROLLER — INI YANG BENAR)
    Route::get('/customer/home', [CustomerHomeController::class, 'index'])
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
  Route::get('/customer/tiket', 
        [PaymentController::class, 'tiket']
    )->name('customer.tiket');

    //history customer
    Route::get('/customer/history', 
        [CustomerHistoryController::class, 'index']
    )->name('customer.history');
});

//metode pembayaran
Route::get('/pembayaran/kartu-kredit', function () {
    return view('pages.pembayaran-kartu-kredit');
})->name('pembayaran.kartu-kredit');

Route::get('/pembayaran/paypal', function () {
    return view('pages.pembayaran-paypal');
})->name('pembayaran.paypal');

Route::get('/pembayaran/transfer-bank', function () {
    return view('pages.pembayaran-transfer-bank');
})->name('pembayaran.transfer-bank');

/*
|--------------------------------------------------------------------------
| KATALOG WISATA (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/wisata/katalog', function () {
    return view('pages.katalog-wisata');
})->name('wisata.katalog');



Route::get('/wisata/katalog', [WisataKatalogController::class, 'index'])
    ->name('wisata.katalog');

Route::get('/wisata/{id}', [WisataKatalogController::class, 'show'])
    ->name('wisata.detail');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.process');

Route::middleware(['auth:admin', 'block.manager'])->group(function () {

    // DASHBOARD
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // MANAJEMEN WISATA
    Route::get('/admin/manajemen-wisata', [AdminWisataController::class, 'index'])
        ->name('admin.wisata');

    Route::post('/admin/manajemen-wisata', [AdminWisataController::class, 'store'])
        ->name('admin.wisata.store');

    Route::put('/admin/manajemen-wisata/{id}', [AdminWisataController::class, 'update'])
        ->name('admin.wisata.update');

    Route::delete('/admin/manajemen-wisata/{id}', [AdminWisataController::class, 'destroy'])
        ->name('admin.wisata.destroy');

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
    Route::get('/admin/manajemen-agen', [AdminAgenController::class, 'index'])
        ->name('admin.agen');

    Route::post('/admin/manajemen-agen', [AdminAgenController::class, 'store'])
        ->name('admin.agen.store');

    Route::put('/admin/manajemen-agen/{id}', [AdminAgenController::class, 'update'])
        ->name('admin.agen.update');

    Route::delete('/admin/manajemen-agen/{id}', [AdminAgenController::class, 'destroy'])
        ->name('admin.agen.destroy');

    // TRANSAKSI
    Route::get('/admin/manajemen-transaksi', [AdminTransaksiController::class, 'index'])
        ->name('admin.transaksi');

    // LAPORAN
    Route::get('/admin/laporan/transaksi', [AdminLaporanController::class, 'laporanTransaksi'])
        ->name('admin.laporan.transaksi');

    Route::get('/admin/laporan/pelanggan', [AdminLaporanController::class, 'laporanPelanggan'])
        ->name('admin.laporan.pelanggan');

    Route::get('/admin/laporan/agen', [AdminLaporanController::class, 'laporanAgen'])
        ->name('admin.laporan.agen');
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

    Route::get('/agen/dashboard', [AgenDashboardController::class, 'index'])
        ->name('agen.dashboard');

    Route::get('/agen/paket', fn () => view('pages.agenPaket'))
        ->name('agen.paket');

    Route::get('/agen/riwayat', fn () => view('pages.agenRiwayat'))
        ->name('agen.riwayat');

    Route::post('/agen/logout', [AgenAuthController::class, 'logout'])
        ->name('agen.logout');
        
    Route::get('/agen/paket', [AgenPaketController::class, 'index'])
        ->name('agen.paket');
        
    Route::get('/agen/riwayat', [AgenRiwayatController::class, 'index'])
        ->name('agen.riwayat');

    Route::get('/agen/pesanan', [AgenPesananController::class, 'index'])
        ->name('agen.pesanan');

    Route::post('/agen/pesanan/{id}/status', [AgenPesananController::class, 'updateStatus'])
        ->name('agen.pesanan.updateStatus');
});
