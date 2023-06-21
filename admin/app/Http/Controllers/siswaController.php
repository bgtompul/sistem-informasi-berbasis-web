<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\jurusan;

class siswaController extends Controller
{
    //

    function index()
    {
        // mendapat data dari table siswa yang di gabung dengan table jurusan menggunakan join
        $data['siswa']=siswa::join('jurusan','jurusan.id_jurusan','=','siswa.id_jurusan')->get();
        
        return view('siswa_tampil',$data);
    }

    function detail($id_siswa)
    {
        $data['siswa']= siswa::join('jurusan','jurusan.id_jurusan','=','siswa.id_jurusan')->where('id_siswa',$id_siswa)->first();

        return view('siswa_detail',$data);
    }

    function create()
    {
        // Mengambil data jurusan
        $data['jurusan']= jurusan::all();

        // mengirim dara ke view siswa_tambah
        return view('siswa_tambah',$data);
    }

    function store(Request $request)
    {
        //mengambil nama foto yang di imput di formulir
        $namafoto = $request->foto_siswa->getClientOriginalName();
        // mengupload foto yang di input ke folder aplikasi 
        $request->foto_siswa->move('assets/file',$namafoto);
        // menyimpan ke database 
        $data['foto_siswa'] = $namafoto;


        // mengambil data yang di input di database menggunakan perintah $request->name
        $data['username_siswa'] = $request->username_siswa;
        $data['password_siswa'] = sha1($request->password_siswa);
        $data['nama_siswa'] = $request->nama_siswa;
        $data['nis_siswa'] = $request->nis_siswa;
        $data['nisn_siswa'] = $request->nisn_siswa;
        $data['alamat_siswa'] = $request->alamat_siswa;
        $data['id_jurusan'] = $request->id_jurusan;

        // menyimpan data formulir ke database
        siswa::create($data);


        // kembali ke url
        return redirect('siswa/');
    }

    function edit($id_siswa)
    {
        // mengambil data siswa berdasarkan id_siswa
        $data['siswa'] = siswa::find($id_siswa);
        // mengambil data jurusan 
        $data['jurusan']=jurusan::all();

        // mengirim data yang sudah didapat ke dalam view siswa_ubah
        return view('siswa_ubah',$data);
    }

    function update(Request $request,$id_siswa)
    {
        if($request->foto_siswa)
        {
            // mengambil nama foto yang di input dari formulir
            $namafoto=$request->foto_siswa->getClientOriginalName();
            // mengupload folder ke folder aplikasi 
            $request->foto_siswa->move('assets/file',$namafoto);
            // menyimpan nama foto ke database
            $data['foto_siswa']= $namafoto;    
        }

        if ($request->password_siswa) 
        {
            // mendapatkan data yang di input di formulir password_siswa
            $data['password_siswa']=sha1($request->password_siswa);
        }

        $data['username_siswa'] = $request->username_siswa;
        $data['nama_siswa'] = $request->nama_siswa;
        $data['nis_siswa'] = $request->nis_siswa;
        $data['nisn_siswa'] = $request->nisn_siswa;
        $data['alamat_siswa'] = $request->alamat_siswa;
        $data['id_jurusan'] = $request->id_jurusan;

        // menyimpan data yang di dapat dari formulir 
        siswa::find($id_siswa)->update($data);

        return redirect('siswa');

    }

    function destroy(Request $request,$id_siswa)
    {
        siswa::destroy($id_siswa);

        return redirect('siswa');
    }
}