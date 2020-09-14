<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function handelRegister(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);


      $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        //login

        Auth::login($user);
        return redirect(route('book.list'));


    }


    public function login()
    {
        return view('auth.login');
    }

    public function handelLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);


        $isLogin=Auth::attempt(['email'=>$request->email ,'password'=>$request->password ]);

        if(! $isLogin)
        {

            return redirect( route('auth.login'));
        }

        return redirect( route('book.list'));

    }

    public function logout(){
        Auth::logout();
        
        return redirect( route('auth.login'));
    }
}
