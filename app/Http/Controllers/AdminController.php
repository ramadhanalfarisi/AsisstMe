<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.content.user', compact(['user']));
    }
}
