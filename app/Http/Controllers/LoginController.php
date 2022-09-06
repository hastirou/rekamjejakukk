<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller{
    public function login(Request $request){
        // Retrive Input
      //dd($request);
        $cek = DB::table('users')->where('status','OPN')
        ->where('Username',$request->Username)
        ->get();
        if(count($cek)>0){
            $credentials = $request->only('Username', 'password');
           // dd($cek,$credentials);
    
            if (Auth::attempt($credentials)) {
                // if success login
    
                return redirect('/');
    
                //return redirect()->intended('/details');
            }
        }
        // if failed login
        $message = 'Username atau Password Salah';
        return redirect('login')->with(['login' => $message]);
    }

}