<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasSiswaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[GuruController::class,'login']);
Route::post('/dologin',[GuruController::class,'dologin']);
Route::get('logout',[GuruController::class,'logout']);
Route::get('guru/dashboard',[GuruController::class,'dashboard'])->middleware('Cekguru');
Route::get('guru/profile',[GuruController::class,'profile'])->middleware('Cekguru');
Route::put('guru/profile',[GuruController::class,'update'])->middleware('Cekguru');


// tahun
Route::get('guru/{id_tahun}/tahun',[MengajarController::class,'mengajar'])->middleware('Cekguru');
Route::get('guru/{id_mapel}/materi',[MengajarController::class,'materi'])->middleware('Cekguru');

// materi tambah
Route::get('guru/{id_mapel}/materi/create',[MateriController::class,'create'])->middleware('Cekguru');
Route::post('guru/{id_mapel}/materi',[MateriController::class,'store'])->middleware('Cekguru');
// materi ubah
Route::get('guru/{id_mapel}/{id_materi}/ubah',[MateriController::class,'edit'])->middleware('Cekguru');
Route::put('guru/{id_mapel}/{id_materi}',[MateriController::class,'update'])->middleware('Cekguru');
// Hapus materi
Route::delete('guru/{id_mapel}/{id_materi}',[MateriController::class,'destroy'])->middleware('Cekguru');

// Tugas
Route::get('guru/{id_materi}/tugas_materi',[TugasController::class,'index'])->middleware('Cekguru');
// tambah tugas
Route::get('guru/{id_materi}/tugas_tambah/create',[TugasController::class,'create'])->middleware('Cekguru');
Route::post('guru/{id_materi}/tugas_tambah',[TugasController::class,'store'])->middleware('Cekguru');
// edit tugas
Route::get('guru/{id_tugas}/{id_materi}/tugas_ubah/edit',[TugasController::class,'edit'])->middleware('Cekguru');
Route::put('guru/{id_tugas}/{id_materi}/tugas_ubah',[TugasController::class,'update'])->middleware('Cekguru');
// hapus tugas
Route::delete('guru/{id_tugas}/{id_materi}/destroy',[TugasController::class,'destroy'])->middleware('Cekguru');

// tugas siswa
Route::get('guru/{id_tugas}/tugas_siswa',[TugasSiswaController::class,'index'])->middleware('Cekguru');
