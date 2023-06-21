<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tahun_ajaran;
use App\Models\Mengajar;
use App\Models\Materi;
use App\Models\mapel;

class MengajarController extends Controller
{
    function mengajar($id_tahun)
    {
        $data['mengajar'] = Mengajar::join('kelas','kelas.id_kelas','=','Mengajar.id_kelas')->
        join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->
        join('mapel','mapel.id_mapel','=','mengajar.id_mapel')-> 
        join('jurusan','jurusan.id_jurusan','=','mapel.id_jurusan')->where('kelas.id_tahun',$id_tahun)->get();

        $data['tahun']=tahun_ajaran::where('id_tahun',$id_tahun)->first();

        return view('mengajar',$data);
    }

    function materi($id_mapel)
    {
        $data['materi']=Materi::join('mapel','mapel.id_mapel','=','materi.id_mapel')->where('mapel.id_mapel',$id_mapel)->get();
        $data['mapel']=mapel::join('jurusan','jurusan.id_jurusan','=','mapel.id_jurusan')->where('id_mapel',$id_mapel)->first();
        
        return view('materi',$data);
    }



}
