<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswakelas;
use App\Models\siswa;
use App\Models\kelas;
use App\Models\tahun_ajaran;


class SiswakelasController extends Controller
{
    function siswakelas ($id_siswa)
    {
        // mengambil data siswa kelas berdasarkan siswa yang di pilih 

        $data['siswakelas']=Siswakelas::
        
        join('kelas','kelas.id_kelas','=','siswa_kelas.id_kelas')->

        join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->

        where('id_siswa',$id_siswa)->

        orderBy('id_siswa_kelas','DESC')->get();

        $data['siswa']=siswa::where('id_siswa',$id_siswa)->first();

        return view('siswakelas_tampil',$data);
    }

    function destroy(Request $request,$id_kelas,$id_siswa)
    {
        siswakelas::destroy($id_kelas);

        return redirect('siswa/'.$id_siswa.'/siswakelas');
    }

    function create($id_siswa)
    {
        // mengambil data siswa berdasarkan id_siswa
        $data['siswa']=siswa::where('id_siswa',$id_siswa)->first();
        $data['tahun_ajaran']=tahun_ajaran::all();
        // mengambil data kelas 
        $data['kelas']=kelas::all();

        // mengirim data yang sudah di dapat ke view siswakelas_tambah 
        return view('siswakelas_tambah',$data);
    }

    function store(Request $request,$id_siswa)
    {
        $data['id_siswa']=$request->id_siswa;
        $data['id_kelas']=$request->id_kelas;
        $data['id_tahun']=$request->id_tahun;

        siswakelas::create($data);

        return redirect('siswa/'.$id_siswa.'/siswakelas');
    }

     function edit($id_siswa_kelas,$id_siswa)
    {
        $data["siswakelas"] = Siswakelas::join('kelas','kelas.id_kelas','=','siswa_kelas.id_kelas')->join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->where('id_siswa_kelas',$id_siswa_kelas)->first();
        $data['kelas'] = kelas::all();
        $data['siswa'] = siswa::where('id_siswa',$id_siswa)->first();

        return view('siswakelas_ubah',$data);

    }

    function update(Request $request,$id_siswa_kelas,$id_siswa)
    {
        $data['id_siswa'] = $request->id_siswa;
        $data['id_kelas'] = $request->id_kelas;

        siswakelas::find($id_siswa_kelas)->update($data);

        return redirect('siswa/'.$id_siswa.'/siswakelas');
    }
}
