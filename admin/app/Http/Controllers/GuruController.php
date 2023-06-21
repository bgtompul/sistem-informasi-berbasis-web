<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
class GuruController extends Controller
{
    function index()
    {
        // mendapatkan data guru dari database
        $data['guru']=Guru::all();
        // mengirim data guru ke view guru_tampil
        return view('guru_tampil',$data);
    }

    function create()
    {
        return view('guru_tambah');
    }

    function store(Request $request)
    {
        
        //mendapatkan nama foto yg d masukkan di formulier
        $namafoto = $request->foto_guru->getClientOriginalName();
        //mengupload foto ke folder aplikasi
        $request->foto_guru->move("assets/file",$namafoto);
        //memasukkan namafoto ke dalam database
        $data["foto_guru"] = $namafoto;

        //mendapatkan data yang di input di formulir
        $data["username_guru"] = $request->username_guru;
        $data["password_guru"] = sha1($request->password_guru);
        $data["nama_guru"] = $request->nama_guru;
        $data["nip_guru"] = $request->nip_guru;
        $data["jk_guru"] = $request->jk_guru;
        $data["hp_guru"] = $request->hp_guru;
        $data["alamat_guru"] = $request->alamat_guru;
        $data["email_guru"] = $request->email_guru;

        //menyimpan data ke database
        Guru::create($data);

        //kembali ke halaman tampil
        return redirect("guru/");
    }

    function edit($id_guru)
    {
        // mengambil data guru berdasarkan id_gur
        $data['guru']=guru::find($id_guru);
        // mengirim data yang sudah di dapat ke view guru_ubah
        return view('guru_ubah',$data);
    }

    function update (Request $request,$id_guru)
    {
        // jika mengubah password
        if( $request->password_guru)
        {
            $data['password_guru']=sha1($request->password_guru);
        }
        if( $request->foto_guru)
        {
            $namafoto = $request->foto_guru->getClientOriginalName();
            $request->foto_guru->move('assets/file',$namafoto);
            $data['foto_guru']=$namafoto;
        }
        $data['username_guru'] = $request->username_guru;
        $data['nama_guru'] = $request->nama_guru;
        $data['nip_guru'] = $request->nip_guru;
        $data['jk_guru'] = $request->jk_guru;
        $data['hp_guru'] = $request->hp_guru;
        $data['alamat_guru'] = $request->alamat_guru;
        $data['email_guru'] = $request->email_guru;

        guru::find($id_guru)->update($data);
        return redirect('guru');
        }

        function destroy(Request $request,$id_guru)
        {
            Guru::destroy($id_guru);
            return redirect('guru');
        }
}
