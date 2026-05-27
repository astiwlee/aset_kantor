<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//user
Route::get('/user', [UsersController::class, 'index'])->name('user.index');
Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('user.destroy');


//history
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
Route::post('/history', [HistoryController::class, 'store'])->name('history.store');
Route::get('/history/{id}/edit', [HistoryController::class, 'edit'])->name('history.edit');
Route::put('/history/{id}', [HistoryController::class, 'update'])->name('history.update');
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');


//kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


//asset
Route::get('/asset', [AssetController::class, 'index'])->name('asset.index');
Route::get('/asset/create', [AssetController::class, 'create'])->name('asset.create');
Route::post('/asset', [AssetController::class, 'store'])->name('asset.store');
Route::get('/asset/{id}/edit', [AssetController::class, 'edit'])->name('asset.edit');
Route::put('/asset/{id}', [AssetController::class, 'update'])->name('asset.update');
Route::delete('/asset/{id}', [AssetController::class, 'destroy'])->name('asset.destroy');


//lokasi
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');


//laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');