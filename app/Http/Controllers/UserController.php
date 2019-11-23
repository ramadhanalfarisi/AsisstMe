<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kategori;
use App\RequestHire;
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
        $asistenRating = User::all();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori', 'asistenRating']));
    }

    public function indexSecondSearch($id)
    {
        $asisten = User::where('kategori_id', $id)->get();
        $asistenRating = User::all();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori', 'id', 'asistenRating']));
    }

    public function indexSecondQuerySearch(Request $req)
    {
        $asisten = User::where('nama', 'LIKE', '%'.$req->cari.'%')->orWhere('alamat', 'LIKE', '%'.$req->cari.'%')
                        ->orWhere('bio', 'LIKE', '%'.$req->cari.'%')->get();
        $asistenRating = User::all();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori', 'asistenRating']));
    }

    public function indexSecondMenuSearch(Request $req)
    {
        if($req->kategori != null)$asisten = User::where('kategori_id', $req->kategori);
        
        if($req->rating == 'unrated')$asisten = isset($asisten) ? $asisten->whereNull('rating') : User::whereNull('rating');
        if($req->rating == 'low')$asisten = isset($asisten) ? $asisten->whereBetween('rating', [1, 2]) : User::whereBetween('rating', [1, 2]);
        if($req->rating == 'medium')$asisten = isset($asisten) ? $asisten->where('rating', '3') : User::where('rating', '3');
        if($req->rating == 'high')$asisten = isset($asisten) ? $asisten->whereBetween('rating', [4, 5]) : User::whereBetween('rating', [4, 5]);

        if(!is_null($req->lokasi)) {
            $asisten =  isset($asisten) ? $asisten->where('alamat', 'like', '%'.$req->lokasi.'%')->get() : User::where('alamat', 'like', '%'.$req->lokasi.'%')->get();
        } else {
            $asisten = isset($asisten) ? $asisten->get() : User::all();
        }
        
        $asistenRating = User::all();
        $kategori = Kategori::all();

        return view('user.findjob.content.home', compact(['asisten', 'kategori', 'asistenRating']));
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

    public function postRequest(Request $req, $id)
    {
        $user = User::find($id);
        $request = new RequestHire;
        $request->email_pencari = $req->email_pencari;
        $request->email_penyedia = $user->email;
        $request->notelp_pencari = $req->no_telp;
        $request->lokasi_pencari = $req->lokasi;
        $request->gaji = $req->gaji;
        $request->status = 0;
        $request->save();
        
        return redirect()->back()->with('alert-success', 'Terimakasih kami akan memproses ke tahap selanjutnya');
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
    public function indexProfile()
    {
        return view('user.findjob.content.profile');
    }

    public function indexRequest()
    {
        $request = RequestHire::where('email_penyedia', Auth::user()->email)->get();

        return view('user.findjob.content.request', compact(['request']));
    }

    public function controlRequest($id, $status)
    {
        $request = RequestHire::find($id);
        if($status == 1){
            $request->status = 1;
            $user = User::where('email', Auth::user()->email)->first();
            $user->status_hire = 1;
            $request->save();
            $user->save();
        }
        if($status == 0)$request->delete();

        return redirect()->back();
    }
}
