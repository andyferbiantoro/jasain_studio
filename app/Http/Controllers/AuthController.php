<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    
    public function proses_login(Request $request){
        //remember
        $ingat = $request->remember ? true : false; //jika di ceklik true jika tidak gfalse
        //akan ingat selama 5 tahun jika tidak logout

        //auth()->attempt buat proses login  request input username dan password,  request input  sama kayak $request->password dan usernamenya, ditambah $ingat jika pengen ingat
        if(auth()->attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $ingat)){
            //auth->user() untuk memanggil data user yang sudah login
         if(auth()->user()->role == "admin"){
            return redirect()->route('dashboard-index')->with('success', 'Anda Berhasil Login');
    }else{
        
            return redirect()->route('login')->with('error', 'Username / Password anda salah'); //route itu isinya name dari route di web.php

        }
    }
}


 public function logout(){

        auth()->logout(); //logout
        
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
        
    }
    
}
