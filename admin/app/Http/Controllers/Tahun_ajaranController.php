<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tahun_ajaran;

class Tahun_ajaranController extends Controller
{
    function index()
    {
        
        $data['tahun_ajaran']=tahun_ajaran::all();
        
        return view('tahun_ajaran',$data);
    }

     function create()
    {
        return view('tahun_ajaran_tambah');
    }

    function store(Request $request)
    {
        
      
        $data["tahun_ajaran"] = $request->tahun_ajaran;


        //menyimpan data ke database
        tahun_ajaran::create($data);

        //kembali ke halaman tampil
        return redirect("tahun_ajaran/");
    }

    function edit($id_tahun)
    {
        $data['tahun_ajaran']=tahun_ajaran::find($id_tahun);
        return view('tahun_ajaran_ubah',$data);
    }

    function update(Request $request,$id_tahun)
    {
        $data['tahun_ajaran']= $request->tahun_ajaran;

        tahun_ajaran::find($id_tahun)->update($data);
        return redirect('tahun_ajaran');
    }
    
    function destroy($id_tahun)
    {
        tahun_ajaran::destroy($id_tahun);
        return redirect('tahun_ajaran');
    }

}
