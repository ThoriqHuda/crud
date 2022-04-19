<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PengumumanController;

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


Route::get('/home2', [MahasiswaController::class, 'index'])->name('home2');
Route::post('/buat-data2', [MahasiswaController::class, 'store'])->name('artikel.buat-data2');
Route::get('/buat2', [MahasiswaController::class, 'create'])->name('artikel.tambah-data2');
Route::get('/edit2/{id}', [MahasiswaController::class, 'edit'])->name('artikel.edit2');
Route::post('/update2/{id}', [MahasiswaController::class, 'update'])->name('artikel.update2');
Route::delete('/delete2/{id}', [MahasiswaController::class, 'destroy'])->name('artikel.destroy2');
Route::get('/detail2/{id}', [MahasiswaController::class, 'show'])->name('artikel.show2');


Route::get('/', [PengumumanController::class, 'index'])->name('home');
Route::post('/buat-data', [PengumumanController::class, 'store'])->name('artikel.buat-data');
Route::get('/buat', [PengumumanController::class, 'create'])->name('artikel.tambah-data');
Route::get('/edit/{id}', [PengumumanController::class, 'edit'])->name('artikel.edit');
Route::post('/update/{id}', [PengumumanController::class, 'update'])->name('artikel.update');
Route::delete('/delete/{id}', [PengumumanController::class, 'destroy'])->name('artikel.destroy');
Route::get('/detail/{id}', [PengumumanController::class, 'show'])->name('artikel.show');