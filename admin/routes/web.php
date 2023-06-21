<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Tahun_ajaranController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\SiswakelasController;


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

Route::get('/',[AdminController::class,'login']);
Route::post('/dologin',[AdminController::class,'dologin']);
Route::get('logout',[AdminController::class,'logout']);
Route::get('admin/dashboard',[AdminController::class,'dashboard'])->middleware('cekuser');
Route::get('admin/profile',[AdminController::class,'profile'])->middleware('cekuser');
Route::put('admin/profile',[AdminController::class,'update'])->middleware('cekuser');



// tampil guru
Route::get('guru',[GuruController::class,'index'])->middleware('cekuser');
// tambah guru
Route::get('guru/create',[GuruController::class,'create'])->middleware('cekuser');
Route::post('guru',[GuruController::class,'store'])->middleware('cekuser');
// edit guru
Route::get('guru/{id_guru}/edit',[GuruController::class,'edit'])->middleware('cekuser');
Route::put('guru/{id_guru}',[GuruController::class,'update'])->middleware('cekuser');
// hapus guru
Route::delete('guru/{id_guru}',[GuruController::class,'destroy'])->middleware('cekuser');


// tahun mengajar guru
Route::get('guru/{id_guru}/mengajar',[MengajarController::class,'mengajar'])->middleware('cekuser');
// hapus tahun mengajar guru
Route::delete('guru/{id_mengajar}/{id_guru}/mengajar',[MengajarController::class,'destroy'])->middleware('cekuser');
// tambah mengajar
Route::get('guru/mengajar/{id_guru}/create',[MengajarController::class,'create'])->middleware('cekuser');
Route::post('guru/mengajar/{id_guru}',[MengajarController::class,'store'])->middleware('cekuser');
// ubah mengajah 
Route::get('guru/mengajar/{id_mengajar}/{id_guru}/edit',[MengajarController::class,'edit'])->middleware('cekuser');
Route::put('guru/mengajar/{id_mengajar}/{id_guru}',[MengajarController::class,'update'])->middleware('cekuser');


// siswa
Route::get('siswa',[siswaController::class,'index'])->middleware('cekuser');
Route::get('siswa/{id_siswa}/detailsiswa',[siswaController::class,'detail'])->middleware('cekuser');
// tambah siswa
Route::get('siswa/create',[siswaController::class,'create'])->middleware('cekuser');
Route::post('siswa/',[siswaController::class,'store'])->middleware('cekuser');
// ubah siswa
Route::get('siswa/{id_siswa}/edit',[siswaController::class,'edit'])->middleware('cekuser');
Route::put('siswa/{id_siswa}',[siswaController::class,'update'])->middleware('cekuser');
// hapus siswa
Route::delete('siswa/{id_siswa}',[siswaController::class,'destroy'])->middleware('cekuser');

// Siswakelas
//tampil siswa kelas
Route::get('siswa/{id_siswa}/siswakelas',[SiswakelasController::class,'siswakelas'])->middleware('cekuser');
// hapus siswa kelas
Route::delete('siswa/{id_siswa_kelas}/{id_siswa}/siswakelas',[SiswakelasController::class,'destroy'])->middleware('cekuser');
// tambah siswa kelas
Route::get('siswa/siswakelas/{id_siswa}/create',[SiswakelasController::class,'create'])->middleware('cekuser');
Route::post('siswa/siswakelas/{id_siswa}',[SiswakelasController::class,'store'])->middleware('cekuser');
// ubah siswa kelas
Route::get('siswa/{id_siswa_kelas}/{id_siswa}/edit',[SiswakelasController::class,'edit'])->middleware('cekuser');
Route::put('siswa/{id_siswa_kelas}/{id_siswa}',[SiswakelasController::class,'update'])->middleware('cekuser');


// tahun_ajaran
Route::get('tahun_ajaran',[Tahun_ajaranController::class,'index'])->middleware('cekuser');
// tambah tahun ajaran 
Route::get('tahun_ajaran/create',[Tahun_ajaranController::class,'create'])->middleware('cekuser');
Route::post('tahun_ajaran',[Tahun_ajaranController::class,'store'])->middleware('cekuser');
// edit tahun ajaran
Route::get('tahun_ajaran/{id_tahun}/edit',[Tahun_ajaranController::class,'edit'])->middleware('cekuser');
Route::put('tahun_ajaran/{id_tahun}',[Tahun_ajaranController::class,'update'])->middleware('cekuser');
// hapus tahun ajaran
Route::delete('tahun_ajaran/{id_tahun}',[Tahun_ajaranController::class,'destroy'])->middleware('cekuser');




// jurusan
Route::get('jurusan',[jurusanController::class,'index'])->middleware('cekuser');
//tambah jurusan
Route::get('jurusan/create',[jurusanController::class,'create'])->middleware('cekuser');
Route::post('jurusan',[jurusanController::class,'store'])->middleware('cekuser');
// edit jurusan
Route::get('jurusan/{id_jurusan}/edit',[jurusanController::class,'edit'])->middleware('cekuser');
Route::put('jurusan/{id_jurusan}',[jurusanController::class,'update'])->middleware('cekuser');
// hapus jurusan
Route::delete('jurusan/{id_jurusan}',[jurusanController::class,'destroy'])->middleware('cekuser');




// kelas
Route::get('kelas',[KelasController::class,'index'])->middleware('cekuser');
// tambah siswa
Route::get('kelas/create',[KelasController::class,'create'])->middleware('cekuser');
Route::post('kelas',[KelasController::class,'store'])->middleware('cekuser');
// edit kelas siswa
Route::get('kelas/{id_kelas}/edit',[KelasController::class,'edit'])->middleware('cekuser');
Route::put('kelas/{id_kelas}',[KelasController::class,'update'])->middleware('cekuser');
// hapus kelas 
Route::delete('kelas/{id_kelas}',[KelasController::class,'destroy'])->middleware('cekuser');
// tampil siswakelas
Route::get('kelas/{id_kelas}/siswakelas',[KelasController::class,'tampil_siswa'])->middleware('cekuser');


// mapel
Route::get('mapel',[MapelController::class,'index'])->middleware('cekuser');
// tambah mapel
Route::get('mapel/create',[MapelController::class,'create'])->middleware('cekuser');
Route::post('mapel/',[MapelController::class,'store'])->middleware('cekuser');
//edit mapel
Route::get('mapel/{id_mapel}/edit',[MapelController::class,'edit'])->middleware('cekuser');
Route::put('mapel/{id_mapel}',[MapelController::class,'update'])->middleware('cekuser');
// hapus mapel
Route::delete('mapel/{id_mapel}',[MapelController::class,'destroy'])->middleware('cekuser');

