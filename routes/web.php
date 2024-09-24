<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeluhanPelangganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/{any}', [App\Http\Controllers\HomeController::class, 'index'])
    ->where('any', '.*')
    ->name('home');

Route::get('/keluhan-pelanggan/export/txt', [KeluhanPelangganController::class, 'exportTxt']);
Route::get('/keluhan-pelanggan/export/csv', [KeluhanPelangganController::class, 'exportCsv']);
Route::get('/keluhan-pelanggan/export/xls', [KeluhanPelangganController::class, 'exportXls']);
Route::get('/keluhan-pelanggan/export/pdf', [KeluhanPelangganController::class, 'exportPdf']);