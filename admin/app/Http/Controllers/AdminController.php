<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    function login()
    {
        return view('login');
    }

    function dologin(Request $request)
    {
        $username = $request->username_login;
        $password = sha1($request->password_login);

        $cek = Admin::where("username_admin",$username)->where('password_admin', $password)->first();

        if (empty($cek)) 
        {
            return redirect("/");
        }

        else
        {
            $request->session()->put('id_admin',$cek->id_admin);
            $request->session()->put('username_admin',$cek->username_admin);
            $request->session()->put('password_admin',$cek->password_admin);
            $request->session()->put('nama_admin',$cek->nama_admin);
            $request->session()->put('foto_admin',$cek->foto_admin);

            return redirect("admin/dashboard");
        }


     }

    function logout(Request $request)
    {
        $request->session()->forget(["id_admin","nama_admin","email_admin","username_admin","password_admin"]);
        $request->session()->flush();

        return redirect('/');
    }

    function dashboard ()
    {
        return view("dashboard");
    }

    function profile ()
    {
        return view("profile");
    }

    function update (Request $request)
    {
        // jika ada yang menginput password
        if ($request->password_admin) 
        {
            $data["password_admin"] = sha1($request->password_admin);
        }

        // jika ada yang menginput foto
        if ($request->foto_admin) 
        {
            // mendapatkan nama foto di input
            $namafoto = $request->foto_admin->getClientOriginalName();
            //  memproses upload foto ke folder file 
            $request->foto_admin->move("assets/file",$namafoto);
            // menyimpan nama foto ke database
            $data["foto_admin"]=$namafoto;
        }

        // mendapatkan data yang di input di formulir untuk diubah di database
        $data['username_admin']=$request->username_admin;
        $data['nama_admin']=$request->nama_admin;

        // mendapatkan id admin/user yang login lalu di update

        Admin::find(session('id_admin'))->update($data);
        $cek=Admin::find(session('id_admin'));

        // memasukkan data yang baru diubah ke dalam session baru
            $request->session()->put('id_admin',$cek->id_admin);
            $request->session()->put('username_admin',$cek->username_admin);
            $request->session()->put('password_admin',$cek->password_admin);
            $request->session()->put('nama_admin',$cek->nama_admin);
            $request->session()->put('foto_admin',$cek->foto_admin);

            return redirect("admin/profile");
    }











}
