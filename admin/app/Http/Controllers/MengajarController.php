<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Guru;
use App\Models\mapel;
use App\Models\kelas;
use App\Models\tahun_ajaran;

class MengajarController extends Controller
{

    function mengajar($id_guru)
    {
        // mengambil data mengajar berdasarkan guru yang di pilih 
        $data['mengajar']=mengajar::join('kelas','kelas.id_kelas','=','mengajar.id_kelas')->

        join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->

        join('mapel','mapel.id_mapel','=','mengajar.id_mapel')->

        join('jurusan','jurusan.id_jurusan','=','mapel.id_jurusan')->
        where('id_guru',$id_guru)->
        // mengurutkan data dari terbesar
        orderBy('id_mengajar','DESC')->get();

        // mengambil data guru
        $data['guru']=Guru::where('id_guru',$id_guru)->first();


        return view('mengajar',$data);
    }

    function destroy(Request $request,$id_mengajar,$id_guru)
    {
        mengajar::destroy($id_mengajar);

        return redirect('guru/'.$id_guru.'/mengajar');
    }

    function create($id_guru)
    {
        // mengambil data guru berdasarkan id_guru
        $data['guru']=guru::where('id_guru',$id_guru)->first();
        // mengambil data mapel
        $data['mapel']=mapel::all();
        // megambil data kelas yang di gabung ke table tahun 
        $data['kelas']=kelas::join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->orderBy('id_kelas','DESC')->get();
        
        // mengirim data yang sudah di dapat ke view mengajar_tambah
        return view('mengajar_tambah',$data);
    }

    function store(Request $request,$id_guru)
    {
        $data['id_guru']=$request->id_guru;
        $data['id_mapel']=$request->id_mapel;
        $data['id_kelas']=$request->id_kelas;

        Mengajar::create($data);

        return redirect('guru/'.$id_guru.'/mengajar');
    }

    function edit($id_mengajar,$id_guru)
    {
        $data['mengajar']=mengajar::find($id_mengajar);
        // mengambil data guru berdasarkan id_guru
        $data['guru']=guru::where('id_guru',$id_guru)->first();
        // mengambil data mapel
        $data['mapel']=mapel::all();
        // megambil data kelas yang di gabung ke table tahun 
        $data['kelas']=kelas::join('tahun_ajaran','tahun_ajaran.id_tahun','=','kelas.id_tahun')->orderBy('id_kelas','DESC')->get();

        // mengirim data yang sudah di dapat ke view mengajar_tambah
        return view('mengajar_ubah',$data);
    }

    function update(Request $request,$id_mengajar,$id_guru)
    {
        $data['id_guru']=$request->id_guru;
        $data['id_mapel']=$request->id_mapel;
        $data['id_kelas']=$request->id_kelas;

        Mengajar::find($id_mengajar)->update($data);

        return redirect('guru/'.$id_guru.'/mengajar');
    }
}
