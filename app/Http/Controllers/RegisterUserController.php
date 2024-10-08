<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate
        $validatedAttributes = $request->validate([
            'name'=>['required','string', ],
            'email'=>['required' ],
            'password'=>['required','min:6', 'confirmed' ],
        ]);
        //create user
        $user = User::create( $validatedAttributes );
        //login user
        Auth::login($user);
        //redirect anywhere
        return redirect('/jobs');
    }
}
