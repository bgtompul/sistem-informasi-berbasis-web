<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\mapel;

class MateriController extends Controller
{
    function create($id_mapel)
    {
        $data['mapel']=mapel::where('id_mapel',$id_mapel)->first();

        return view('materi_tambah',$data);
    }

    function store(Request $request,$id_mapel)
    {
        $namafile=$request->file_materi->getClientOriginalName();
        $url = env('URL_ADMIN');
        $request->file_materi->move($url.'/assets/file/',$namafile);
        $data['file_materi']=$namafile;

        $data['id_mapel']=$request->id_mapel;
        $data['nama_materi']=$request->nama_materi;

        materi::create($data);

        return redirect('guru/'.$id_mapel.'/materi');

    }

    function edit($id_mapel,$id_materi)
    {

        $data['mapel']=mapel::where('id_mapel',$id_mapel)->first();
        $data['materi']=materi::find($id_materi);

        return view('materi_ubah',$data);
    }

    function update(Request $request, $id_materi, $id_mapel)
    {
        if($request->file_materi)
        {
            $namafile=$request->file_materi->getClientOriginalName();
            $url = env('URL_ADMIN');
            $request->file_materi->move($url.'assets/file',$namafile);
            $data['file_materi']=$namafile;

        }

        $data['id_mapel']=$request->id_mapel;
        $data['nama_materi']=$request->nama_materi;

        materi::find($id_materi)->update($data);

        return redirect('guru/'.$id_mapel.'/materi');
    }

    function destroy( Request $request, $id_mapel, $id_materi)
    {
        materi::destroy($id_materi);

        return redirect('guru/'.$id_mapel.'/materi');
    }
}
