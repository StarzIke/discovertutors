<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Admin;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.index');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function login(){
        return redirect('/login');
    }

    public function register(){
        return redirect('/register');
    }
}
