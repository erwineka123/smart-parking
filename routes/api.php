<?php

use App\Http\Controllers\Api\PerizinanApiController;
use Illuminate\Support\Facades\Route;

Route::get('/cek-api', function () {
    return response()->json(['message' => 'API berjalan']);
});

// Gunakan controller untuk semua request
Route::get('/perizinan', [PerizinanApiController::class, 'index']);
Route::post('/perizinan', [PerizinanApiController::class, 'store']);
Route::get('/perizinan/{id}', [PerizinanApiController::class, 'show']);
Route::put('/perizinan/{id}', [PerizinanApiController::class, 'update']);
Route::delete('/perizinan/{id}', [PerizinanApiController::class, 'destroy']);

// endpoint untuk status izin
Route::get('/status-perizinan', [PerizinanApiController::class, 'statusParkir']);