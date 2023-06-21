<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\siswa;
use App\Models\tahun_ajaran;
use App\Models\Siswakelas;

class SiswaController extends Controller
{
    //

    function login()
    {
        return view('login');
    }

    function dologin(Request $request)
    {
        $username_siswa=$request->username_siswa;
        $password_siswa=sha1($request->password_siswa);

        $cek=siswa::where('username_siswa',$username_siswa)->where('password_siswa',$password_siswa)->first();

        if(empty($cek))
        {
            // dd($cek);
            return redirect('/');
        }

        else
        {
            $request->session()->put('id_siswa',$cek->id_siswa);
            $request->session()->put('id_jurusan',$cek->id_jurusan);
            $request->session()->put('username_siswa',$cek->username_siswa);
            $request->session()->put('password_siswa',$cek->password_siswa);
            $request->session()->put('nama_siswa',$cek->nama_siswa);
            $request->session()->put('nis_siswa',$cek->nis_siswa);
            $request->session()->put('nisn_siswa',$cek->nisn_siswa);
            $request->session()->put('jk_siswa',$cek->jk_siswa);
            $request->session()->put('alamat_siswa',$cek->alamat_siswa);
            $request->session()->put('foto_siswa',$cek->foto_siswa);

            return redirect("siswa/dashboard");
        }

    }

    function logout(Request $request)
    {
        $request->session()->forget(["id_siswa","id_jurusan","username_siswa","password_siswa","nama_siswa","nis_siswa","nisn_siswa","jk_siswa","alamat_siswa","foto_siswa"]);
        $request->session()->flush();

        return redirect('/');

    }


    function dashboard()
    {
        //mengambil data kelas dari siswa yang login
        $data["kelas"] = Siswakelas::
        join("kelas","kelas.id_kelas","=","siswa_kelas.id_kelas")->
        join("tahun_ajaran","tahun_ajaran.id_tahun","=","kelas.id_tahun")->where("id_siswa",session("id_siswa"))->get();

        return view('dashboard',$data);
    }

    function profile()
    {
        return view('profile');
    }

    function update(Request $request)
    {
        if($request->password_siswa)
        {
            $data['password_siswa']=sha1($request->password_siswa);
        }

        if($request->foto_siswa)
        {
            $namafoto= $request->foto_siswa->getClientOriginalName();
            $request->foto_siswa->move('assets/file/',$namafoto);
            $data['foto_siswa']=$namafoto;
        }

        $data['username_siswa']=$request->username_siswa;
        $data['nama_siswa']=$request->nama_siswa;

        siswa::find(session('id_siswa'))->update($data);
        $cek=siswa::find(session('id_siswa'));


        $request->session()->put('id_siswa',$cek->id_siswa);
            $request->session()->put('id_jurusan',$cek->id_jurusan);
            $request->session()->put('username_siswa',$cek->username_siswa);
            $request->session()->put('password_siswa',$cek->password_siswa);
            $request->session()->put('nama_siswa',$cek->nama_siswa);
            $request->session()->put('nis_siswa',$cek->nis_siswa);
            $request->session()->put('nisn_siswa',$cek->nisn_siswa);
            $request->session()->put('jk_siswa',$cek->jk_siswa);
            $request->session()->put('alamat_siswa',$cek->alamat_siswa);
            $request->session()->put('foto_siswa',$cek->foto_siswa);

            return redirect("siswa/profile");


    }


}
