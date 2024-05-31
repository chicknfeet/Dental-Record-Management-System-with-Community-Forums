<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Patientlist;
use Illuminate\Http\Request;

class PatientListController extends Controller
{
    public function index(){

        $patient = Patientlist::all();
        $patient = Patientlist::paginate(10);
        return view('admin.patientlist.patientlist', ['patientlist' => $patient]);
        
    }

    public function deletePatientlist($id) {
        $patient = Patientlist::findOrFail($id);
        $patient->delete();

        return back()
            ->with('success', 'Patient deleted successfully!');
    }

    public function updatePatientlist($id){
        $patient = Patientlist::findOrFail($id);
        return view('admin.patientlist.updatePatientlist', compact('patient'));
    }

    public function updatedPatientlist(Request $request, $id){

        $patient = Patientlist::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'email' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $patient->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('admin.patientlist')
            ->with('success', 'patient updated successfully!');
    }
}
