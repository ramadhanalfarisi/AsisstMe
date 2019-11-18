<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kategori;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.main');
    }

    public function indexSecond()
    {
        $asisten = User::all();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori']));
    }

    public function indexSecondSearch($id)
    {
        $asisten = User::where('kategori_id', $id)->get();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori']));
    }

    public function registerFirst(Request $req)
    {
        $this->validate($req, [
            "nama" => "required",
            "kelamin" => "required",
            "email" => "required",
            "password" => "required",
            "retype" => "required|same:password",
        ]);

        $user = new User;
        $user->role = 1;
        $user->status_hire = 0;
        $user->nama = $req->nama;
        $user->jenis_kelamin = $req->kelamin;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->save();
        
        return redirect()->back()->with('alert-success', 'Berhasil membuat akun silahkan login');
    }

    public function registerSecond(Request $req, $id)
    {
        $this->validate($req, [
            "nomor" => "required",
            "kategori" => "required",
            "provinsi" => "required",
            "kota" => "required",
            "alamat" => "required",
            "bio" => "required",
            "formal" => "required",
            "cv" => "required",
            "portofolio" => "required",
        ]);
        $user = User::find($id);
        $user->no_telp = $req->nomor;
        $user->kategori_id = $req->kategori;
        $user->alamat = $req->provinsi. ', '. $req->kota. ', '. $req->alamat;
        $user->bio = $req->bio;
        $user->foto_profil = $req->formal->getClientOriginalName();
        $user->foto_cv = $req->cv->getClientOriginalName();
        $user->portfolio = $req->portofolio->getClientOriginalName();
            
        $formal = $req->file('formal');
        $formal->move(public_path('images/formal/'), $formal->getClientOriginalName());
        
        $cv = $req->file('cv');
        $cv->move(public_path('images/cv/'), $cv->getClientOriginalName());
        
        $portofolio = $req->file('portofolio');
        $portofolio->move(public_path('images/portofolio/'), $portofolio->getClientOriginalName());

        $user->save();
        
        return redirect()->back()->with('alert-success', 'Terimakasih telah melengkapi data');
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            "email" => "required",
            "password" => "required"
        ]);
        
        $credentials = $req->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('search')->with('alert-success', 'Berhasil login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('search')->with('alert-danger', 'Berhasil logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
