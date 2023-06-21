<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mapel;
use App\Models\jurusan;

class MapelController extends Controller
{
    function index()
    {
        $data['mapel']=mapel::join('jurusan','jurusan.id_jurusan','=','mapel.id_jurusan')->get();

        return view('mapel_tampil',$data);
    }

    function create()
    {
        $data['jurusan']=jurusan::all();

        return view('mapel_tambah',$data);
    }

    function store(Request $request)
    {
        $data['nama_mapel']=$request->nama_mapel;
        $data['id_jurusan']=$request->id_jurusan;

        mapel::create($data);
        return redirect('mapel');
    }

    function edit($id_mapel)
    {
        $data['mapel']=mapel::find($id_mapel);
        $data['jurusan']=jurusan::all();

        return view('mapel_ubah',$data);
    }

    function update(Request $request,$id_mapel)
    {
        $data['nama_mapel']=$request->nama_mapel;
        $data['id_jurusan']=$request->id_jurusan;

        mapel::find($id_mapel)->update($data);

        return redirect('mapel');
    }

    function destroy($id_mapel)
    {
        mapel::destroy($id_mapel);

        return redirect('mapel');
    }
}
