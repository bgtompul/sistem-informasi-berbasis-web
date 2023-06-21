<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;


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


Route::get('/',[SiswaController::class,'login']);
Route::post('/dologin',[SiswaController::class,'dologin']);
Route::get('/siswa/dashboard',[SiswaController::class,'dashboard'])->middleware('ceksiswa');
Route::get('/logout',[SiswaController::class,'logout']);

// profile siswa
Route::get('siswa/profile',[SiswaController::class,'profile'])->middleware('ceksiswa');
Route::put('siswa/profile',[SiswaController::class,'update'])->middleware('ceksiswa');

// data mata pelajar
Route::get('siswa/{id_kelas}/mapel',[MapelController::class,'index'])->middleware('ceksiswa');
// data materi pelajara
Route::get('siswa/{id_mapel}/materi',[MapelController::class,'materi'])->middleware('ceksiswa');
Route::get('siswa/{id_materi}/tugas',[MapelController::class,'tugas'])->middleware('ceksiswa');

Route::get('siswa/{id_tugas}/{id_materi}/kumpul_tugas',[MapelController::class,'kumpul_tugas'])->middleware('ceksiswa');
Route::post('siswa/{id_tugas}/{id_materi}/kumpul',[MapelController::class,'kumpul'])->middleware('ceksiswa');
Route::post('siswa/{id_tugas}/{id_materi}/{id_tugas_siswa}/ubah_tugas',[MapelController::class,'kumpul'])->middleware('ceksiswa');

