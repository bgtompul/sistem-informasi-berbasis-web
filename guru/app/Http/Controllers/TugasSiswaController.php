<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TugasSiswa;
use App\Models\Tugas;

class TugasSiswaController extends Controller
{
    function index($id_tugas)
    {
        // mengambil data tugas
        $data['tugas']=Tugas::find($id_tugas);
        $data['tugas_siswa']=TugasSiswa::join('siswa_kelas','siswa_kelas.id_siswa_kelas','=','tugas_siswa.id_siswa_kelas')->join('siswa','siswa.id_siswa','=','siswa_kelas.id_siswa')->join('kelas','kelas.id_kelas','=','siswa_kelas.id_kelas')->where('id_tugas',$id_tugas)->get();

        return view('tugas_siswa',$data);
    }
}
