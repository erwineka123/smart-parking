<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenAuthController;
use App\Http\Controllers\PerizinanController;

Route::get('/', function () {
    return view('welcome');
})->name('home');;


Route::get('/dosen/login', [DosenAuthController::class, 'showLoginForm'])->name('dosen.login');
Route::get('/dosen/login', [DosenAuthController::class, 'showLoginForm'])->name('login'); // tambahkan ini

Route::post('/dosen/login', [DosenAuthController::class, 'login']);
Route::post('/dosen/logout', [DosenAuthController::class, 'logout']);
// Logout
Route::post('/dosen/logout', [DosenAuthController::class, 'logout'])->name('dosen.logout');

Route::get('/perizinan', [PerizinanController::class, 'showForm'])->name('perizinan.form');
Route::post('/perizinan', [PerizinanController::class, 'submitForm'])->name('perizinan.submit');
Route::post('/dosen/logout', [DosenAuthController::class, 'logout'])->name('dosen.logout');

Route::get('/perizinan/informasi', [PerizinanController::class, 'showInformasi'])->name('perizinan.informasi');
