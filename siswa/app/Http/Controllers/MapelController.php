<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\mapel;
use App\Models\Mengajar;
use App\Models\kelas;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasSiswa;
use App\Models\Siswakelas;


class MapelController extends Controller
{
    //
    function index($id_kelas)
    {
        // mengambil data mapel berdasarkan kelas
        $data['mengajar']=Mengajar::join('mapel','mapel.id_mapel','=','mengajar.id_mapel')->join('kelas','kelas.id_kelas','=','mengajar.id_kelas')->join('jurusan','jurusan.id_jurusan','=','kelas.id_jurusan')->where('kelas.id_kelas',$id_kelas)->get();

        $data['kelas']=kelas::join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->where('id_kelas',$id_kelas)->first();

        return view('pelajaran',$data);
    }



    function materi($id_mapel)
    {
        $data['materi']=Materi::join('mapel','mapel.id_mapel','=','materi.id_mapel')->where('mapel.id_mapel',$id_mapel)->get();
        $data['mapel']=mapel::join('jurusan','jurusan.id_jurusan','=','mapel.id_jurusan')->where('id_mapel',$id_mapel)->first();


        return view('materi',$data);
    }

    function tugas($id_materi)
    {
        $data['tugas']=Tugas::where('id_materi',$id_materi)->get();

        return view('tugas',$data);
    }

    function kumpul_tugas($id_tugas,$id_materi)
    {
        $data['materi']=Materi::find($id_materi);
        $data['tugas']=Tugas::find($id_tugas);
        $data['siswa_kelas']=Siswakelas::join('siswa','siswa.id_siswa','=','siswa_kelas.id_siswa')->join('kelas','kelas.id_kelas','=','siswa_kelas.id_kelas')->where('siswa.id_siswa',session('id_siswa'))->first();

        $data['tugas_siswa']=TugasSiswa::where('id_tugas',$id_tugas)->first();

        return view('kumpul_tugas',$data);
    }

    function kumpul(Request $request,$id_tugas,$id_materi)
    {
        $data['id_siswa_kelas']=$request->id_siswa_kelas;
        $data['id_tugas']=$request->id_tugas;

        $namafile=$request->file_tugas->getClientOriginalName();
        $request->file_tugas->move('assets/file/',$namafile);
        $data['file_tugas_siswa']=$namafile;


        TugasSiswa::create($data);

        return redirect('siswa/'.$id_materi.'/tugas');
    }

    function ubah_tugas(Request $request,$id_tugas,$id_materi,$id_tugas_siswa)
    {
        $data['id_siswa_kelas']=$request->id_siswa_kelas;
        $data['id_tugas']=$request->id_tugas;

        $namafile=$request->file_tugas->getClientOriginalName();
        $request->file_tugas->move('assets/file/',$namafile);
        $data['file_tugas_siswa']=$namafile;


        TugasSiswa::find($id_tugas_siswa)->update($data);

        return redirect('siswa/'.$id_materi.'/tugas');
    }
}
