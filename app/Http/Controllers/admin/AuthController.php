<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('admin.frontpageadmin.login');
    }

    public function login(Request $request){
        $credentials = $request->only(['username','password']);

        if(Auth::attempt($credentials)){
            return redirect('/admin/patientlist');
        }else{
            return redirect()->back()->withErrors(['message'=>'Invalid username or password']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }
}
