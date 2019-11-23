<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $req)
    {
        $credentials = $req->only('nama', 'password');

        if(Auth::attempt($credentials)) {
            if(Auth::user()->role == 'Superuser'){
                return redirect()->route('adminUser');
            } else {
                return redirect()->back()->with('alert-danger', 'Maaf anda tidak dapat mengakses admin');
            }
        } 

        return redirect()->back()->with('alert-danger', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.content.user', compact(['user']));
    }

    public function postRating(Request $req, $id)
    {
        $user = User::find($id);
        $user->rating = $req->rating;
        $user->save();

        return redirect()->back()->with('alert-success', 'Berhasil memberi rating');
    }

    public function editUser(Request $req, $id)
    {
        $user = User::find($id);
        $user->nama = $req->nama;
        $user->email = $req->email;
        $user->no_telp = $req->no_telp;
        $user->jenis_kelamin = $req->jenis_kelamin;
        $user->alamat = $req->alamat;
        $user->bio = $req->bio;
        $user->save();

        return redirect()->back()->with('alert-success', 'Berhasil merubah user');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('alert-success', 'Berhasil delete user');
    }
}
