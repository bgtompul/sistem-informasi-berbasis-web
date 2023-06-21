<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\tahun_ajaran;

class GuruController extends Controller
{
    function login()
    {
        return view('login');
    }

    function dologin(Request $request)
    {
        $username=$request->username_login;
        $password=sha1($request->password_login);

        $cek=Guru::where('username_guru',$username)->where('password_guru',$password)->first();

        if(empty($cek))
        {
            return redirect('/');
        }
        else
        {
            $request->session()->put('id_guru',$cek->id_guru);
            $request->session()->put('username_guru',$cek->username_guru);
            $request->session()->put('password_guru',$cek->password_guru);
            $request->session()->put('nama_guru',$cek->nama_guru);
            $request->session()->put('nip_guru',$cek->nip_guru);
            $request->session()->put('jk_guru',$cek->jk_guru);
            $request->session()->put('hp_guru',$cek->hp_guru);
            $request->session()->put('alamat_guru',$cek->alamat_guru);
            $request->session()->put('email_guru',$cek->email_guru);
            $request->session()->put('foto_guru',$cek->foto_guru);

            return redirect('guru/dashboard');

        }
    }

    function logout(Request $request)
    {
        $request->session()->forget(['id_guru','username_guru','password_guru','nama_guru','nip_guru','jk_guru','hp_guru','alamat_guru','email_guru','foto_guru']);
        $request->session()->flush();

        return redirect('/');
    }

    function dashboard()
    {
        $data['tahun']=tahun_ajaran::all();

        return view('dashboard',$data);
    }

    function profile()
    {
        return view('profile');
    }

    function update(Request $request)
    {
        if($request->password_guru)
        {
            $data['password_guru']=sha1($request->password_guru);
        }

        if($request->foto_guru)
        {
            // mendapatkan foto dari inputan 
            $nama_foto=$request->foto_guru->getClientOriginalName();
            // mengupload foto ke folder file
            $url = env('PUBLIC_ADMIN');
            $request->foto_guru->move($url.'/assets/file/',$nama_foto);
            $data['foto_guru']=$nama_foto;
        }

        // mendapatkan data yang di input di formulir untuk di ubah di database
        $data['username_guru']=$request->username_guru;
        $data['nama_guru']=$request->nama_guru;

        Guru::find(session('id_guru'))->update($data);
        $cek=Guru::find(session('id_guru'));


        // memasukan data yang baru diubah ke dalam session baru 
        $request->session()->put('username_guru',$cek->username_guru);
        $request->session()->put('nama_guru',$cek->nama_guru);
        $request->session()->put('password',$cek->password);
        $request->session()->put('nip_guru',$cek->nip_guru);
        $request->session()->put('jk_guru',$cek->jk_guru);
        $request->session()->put('hp_guru',$cek->hp_guru);
        $request->session()->put('alamat_guru',$cek->alamat_guru);
        $request->session()->put('email_guru',$cek->email_guru);
        $request->session()->put('foto_guru',$cek->foto_guru);
        

        return redirect('guru/profile');
    }
}
