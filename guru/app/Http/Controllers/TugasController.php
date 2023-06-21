<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tugas;
use App\Models\Materi;

class TugasController extends Controller
{
    //

    function index($id_materi)
    {
        $data['tugas']=Tugas::find($id_materi)->get();
        $data['materi']=Materi::where('id_materi',$id_materi)->first();

        return view('tugas',$data);
    }

    function create($id_materi)
    {
        $data['materi']=materi::find($id_materi);

        return view('tugas_tambah',$data);
    }

    function store(Request $request,$id_materi)
    {
        $data['id_materi']=$request->id_materi;
        $data['nama_tugas']=$request->nama_tugas;
        $namafile=$request->file_tugas->getClientOriginalName();
        $url = env('URL_ADMIN');
        $request->file_tugas->move($url.'assets/file',$namafile);
        $data['file_tugas']=$namafile;

        Tugas::create($data);

        return redirect('guru/'.$id_materi.'/tugas_materi');
    }

    function edit($id_tugas,$id_materi)
    {
        $data['tugas']=tugas::where('id_tugas',$id_tugas)->first();
        $data['materi']=materi::find($id_materi);

        return view('tugas_edit',$data);
    }

    function update(Request $request,$id_tugas,$id_materi)
    {
        if($request->file_tugas)
        {
            $namafile=$request->file_tugas->getClientOriginalName();
            $url = env('URL_ADMIN');
            $request->file_tugas->move($url.'assets/file',$namafile);
            $data['file_tugas']=$namafile;
        }

        $data['nama_tugas']=$request->nama_tugas;
        $data['nama_materi']=$request->nama_materi;

        Tugas::find($id_tugas)->update($data);

        return redirect('guru/'.$id_materi.'/tugas_materi');

    }

    function destroy(Request $request,$id_tugas,$id_materi)
    {
        Tugas::destroy($id_tugas);

        return redirect('guru/'.$id_materi.'/tugas_materi');
    }
}
