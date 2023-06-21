<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kelas;
use App\Models\jurusan;
use App\Models\tahun_ajaran;
use App\Models\Siswakelas;


class KelasController extends Controller
{
    function index()
    {
    $data['kelas']=kelas::join('jurusan','jurusan.id_jurusan','=','kelas.id_jurusan')->join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->get();

    return view('kelas_tampil',$data);
    }

    function create()
    {
        $data['jurusan']=jurusan::all();
        $data['tahun']=tahun_ajaran::all();

        return view('kelas_create',$data);
    }


    function store(Request $request)
    {
        $data['nama_kelas'] = $request->nama_kelas;
        $data['id_jurusan'] = $request->id_jurusan;
        $data['id_tahun'] = $request->id_tahun;
        // dd($data);
        Kelas::create($data);

        return redirect('kelas');

    }

    function edit($id_kelas)
    {
        $data['kelas']=kelas::find($id_kelas);
        // mengambil data jurusan
        $data['jurusan']=jurusan::all();
        // mengambil tahun ajaran
        $data['tahun_ajaran']=tahun_ajaran::all();

        // mengambil data yang sudah di dapat ke dalam view kelas_ubah
        return view('kelas_ubah',$data);
    }

    function update(Request $request,$id_kelas)
    {
        $data['nama_kelas']=$request->nama_kelas;
        $data['id_jurusan']=$request->id_jurusan;
        $data['id_tahun']=$request->id_tahun;

        kelas::find($id_kelas)->update($data);

        return redirect('kelas');
    }

    function destroy($id_kelas)
    {
        kelas::destroy($id_kelas);
        return redirect('kelas');
    }

    function tampil_siswa($id_kelas)
    {
        // mengambil data siswakelas berdasarkan id_kelas / melihat siswa siswa di dalam suatu kelas

        $data['siswakelas']=Siswakelas::join('siswa','siswa.id_siswa','=','siswa_kelas.id_siswa')->join('jurusan','jurusan.id_jurusan','=','siswa.id_jurusan')->where('id_kelas',$id_kelas)->get();
        $data['kelas']=kelas::join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->where('id_kelas',$id_kelas)->first();


        return view('tampil_siswa_kelas',$data);
    }

}
