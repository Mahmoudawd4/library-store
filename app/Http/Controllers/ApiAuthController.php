<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class ApiAuthController extends Controller
{
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
            'password'=>Hash::make($request->password),
            'access_token' => Str::random(64),
        ]);


        return response()->json($user->access_token);
    }


    public function handelLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);


     $is_user=Auth::attempt(['email'=>$request->email , 'password'=>$request->password]);

      if(!$is_user)
      {
        $error='credentials are not correct' ;
        return response()->json($error);
      }
      //lo user  haat email bta3o
      $user=User::where('email','=',$request->email)->first();

      $new_access_token=Str::random(64);
      $user->update([
          'access_token'=>$new_access_token
      ]);

        return response()->json($new_access_token);
    }

    public function logout(Request $request)
    {
        $access_token=$request->access_token;
        $user =User::where('access_token' ,$access_token)->first();

        if($user ==null)
        {
            $error='token not correct' ;
            return response()->json($error);
        }
        $user->update([
            'access_token'=> null
        ]);

        $success='logged out sucssufully' ;
        return response()->json($success);
    }
}
