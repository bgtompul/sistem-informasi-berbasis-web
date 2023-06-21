<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;

class jurusanController extends Controller
{
    function index()
    {
       
        $data['jurusan']=jurusan::all();
       
        return view('jurusan',$data);
    }

    function create()
    {
        return view('jurusan_tambah');
    }

    function store(Request $request)
    {
        
      
        $data["nama_jurusan"] = $request->jurusan;


       
        jurusan::create($data);

       
        return redirect("jurusan");
    }

    function edit($id_jurusan)
    {
        $data['jurusan']=jurusan::find($id_jurusan);

        return view("jurusan_ubah",$data);
    }

    function update(Request $request,$id_jurusan)
    {
        $data['nama_jurusan']=$request->nama_jurusan;
        
        jurusan::find($id_jurusan)->update($data);
        return redirect('jurusan');
    }

    function destroy($id_jurusan)
    {
        jurusan::destroy($id_jurusan);
        return redirect('jurusan');
    }
}
