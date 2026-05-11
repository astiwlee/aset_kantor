<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\LokasiController;
use Illuminate\Support\Facades\Route;

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


Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/asset', [AssetController::class, 'index'])->name('asset.index');
Route::get('/asset/create', [AssetController::class, 'create'])->name('asset.create');
Route::post('/asset/store', [AssetController::class, 'store'])->name('asset.store');
Route::get('/asset/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');
Route::put('/asset/update/{id}', [AssetController::class, 'update'])->name('asset.update');
Route::delete('/asset/delete/{id}', [AssetController::class, 'destroy'])->name('asset.destroy');

Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
Route::get('/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit'])->name('lokasi.edit');
Route::put('/lokasi/update/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/delete/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');