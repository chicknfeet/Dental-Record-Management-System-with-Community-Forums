<?php

namespace App\Http\Controllers\patient;
use App\Http\Controllers\Controller;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function index(){
        return view('patient.frontpagepatient.login');
    }

    public function login(Request $request){
        $credentials = $request->only(['username','password']);

        if(Auth::attempt($credentials)){
            return redirect('/patient/appointment');
        }else{
            return redirect()->back()->withErrors(['message'=>'Invalid username or password']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect('/');
    }

    public function registration(){
        return view('patient.frontpagepatient.registration');
    }

    public function signup(Request $request){

        $validate = $request->validate([
            'name'=>'required|min:4|max:30',
            'username'=>'required|min:5|max:15',
            'password'=>'required|min:5|max:20' 
        ]);

        // Encrypt password
        $validate['password'] = Hash::make($validate['password']);

        $patient = Patient::create($validate);

        if($patient){
            return redirect('/patient/appointment');
        }
    }
}
