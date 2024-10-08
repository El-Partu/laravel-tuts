<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        dd('Hey! I love Jesus Christ with all my soul, body and spirit');
    }
    public function destroy(){
        Auth::logout();
    }
}
