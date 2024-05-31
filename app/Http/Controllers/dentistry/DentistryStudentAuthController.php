<?php

namespace App\Http\Controllers\dentistry;
use App\Http\Controllers\Controller;

use App\Models\Dentistry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DentistryStudentAuthController extends Controller
{
    public function index(){
        return view('dentistry.frontpagedentistry.login');
    }

    public function login(Request $request){
        $credentials = $request->only(['username','password']);

        if(Auth::attempt($credentials)){
            return redirect('/dentistry-student/login');
        }else{
            return redirect()->back()->withErrors(['message'=>'Invalid username or password']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function registration(){
        return view('dentistry.frontpagedentistry.registration');
    }

    public function signup(Request $request){

        $validate = $request->validate([
            'name'=>'required|min:5|max:30',
            'username'=>'required|min:5|max:15',
            'password'=>'required|min:5|max:20' 
        ]);

        // Encrypt password
        $validate['password'] = Hash::make($validate['password']);

        $dentistry = Dentistry::create($validate);

        if($dentistry){
            return redirect('/dentistry-student/community-forum');
        }
    }
}
