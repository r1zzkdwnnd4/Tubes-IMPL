<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');
Route::view('/form-booking', 'pages.form-booking')->name('form.booking');
Route::view('/payment', 'pages.payment')->name('payment');
Route::view('/konfirmasi-pembayaran', 'pages.konfirmasi-pembayaran')->name('payment.confirm');
Route::view('/tiket', 'pages.tiket')->name('ticket');
