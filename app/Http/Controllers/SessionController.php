<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(Request $request){
        //validate
$validatedAtributes = $request->validate([
    'email'=> ['required','email'],
    'password'=> ['required'],
]);
        //attempt to login in user
        if(!Auth::attempt($validatedAtributes)){
            throw ValidationException::withMessages(messages: [
                'password'=>'Invalid email or password.'
            ]);
        }
        //generate new session token
        $request->session()->regenerate();
        //redirect user
        return redirect('/jobs');
    }
    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
