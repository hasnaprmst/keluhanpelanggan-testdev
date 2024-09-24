<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeluhanPelangganController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/keluhan-pelanggan', [KeluhanPelangganController::class, 'index']);
Route::post('/keluhan-pelanggan', [KeluhanPelangganController::class, 'store']);
Route::get('/keluhan-pelanggan/{id}', [KeluhanPelangganController::class, 'show']);
Route::put('/keluhan-pelanggan/{id}', [KeluhanPelangganController::class, 'update']);
Route::delete('/keluhan-pelanggan/{id}', [KeluhanPelangganController::class, 'destroy']);
Route::get('/data-keluhan', [DashboardController::class, 'getDataKeluhan']);
Route::get('/top-10-keluhan', [DashboardController::class, 'index']);
Route::get('/history-keluhan-pelanggan', [KeluhanPelangganController::class, 'history']);
Route::get('/export-keluhan-pelanggan', [KeluhanPelangganController::class, 'exportData']);
Route::put('/keluhan-pelanggan/{id}/status', [KeluhanPelangganController::class, 'updateStatus']);
Route::delete('/keluhan-pelanggan/{id}/status', [KeluhanPelangganController::class, 'deleteKeluhanById']);