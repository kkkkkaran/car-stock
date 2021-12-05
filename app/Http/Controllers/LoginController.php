<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){

        $validated = $this->validate($request,[
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
        ]);

        $credentials=[
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if(auth()->attempt($credentials)){
            $token= auth()->user()->createToken()->accessToken;

            return response()->json(['token' => $token], 200);
        }
        else{
            return response()->json(['error' => 'Unauthorised Access'], 401);
        }
    }

}
