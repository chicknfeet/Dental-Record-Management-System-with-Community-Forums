<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Patientlist;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function create()
    {
        return view('patient.create');
    }

    public function addPatient(Request $request, $patientlistId){
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'age' => 'required|int|max:2',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('patientlist')->where(function ($query) use ($patientlistId) {
                    return $query->where('patientlist_id', $patientlistId);
                }),
            ],
            'phone' => 'required|int|max:11',
            'address' => 'required|string|max:100',
            // Add other validation rules as needed
        ]);

        $patient = Patient::create([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'patientlist_id' => $patientlistId
        ]);

        return redirect()->route('showPatient', ['patientlistId' => $patientlistId])
            ->with('success', 'Patient added successfully!');
    }

    public function showPatient($patientlistId){

        $patientlist = Patientlist::findOrFail($patientlistId);
        $patients = $patientlist->patients;
    
        return view('admin.patientlist.showPatient', compact('patientlist', 'patients'));
    }

    public function storePatient(Request $request, $patientlistId){

            $patientlistId = $request->input('patientlist');
    
            $patientlist = Patientlist::findOrFail($patientlistId);
    
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:attendees,email,NULL,id,event_id,' . $patientlist->id,
            ]);
    
            $patient = new Patient([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
    
            $patientlist->patientlist()->save($patient);
    
            return redirect()->route('showPatient', $patientlist->id)
                ->with('success', 'Patient registered successfully!');
    }

    public function destroy($patientlistId, $patientId){

        $patientlist = Patientlist::findOrFail($patientlistId);
        $patient = Patient::findOrFail($patientId);

        $patient->delete();

        return redirect()->route('showPatient', $patientlist->id)->with('success', 'Patient deleted successfully!');
    }

    public function edit($patientlistId, $patientId){

        $patientlist = Patientlist::findOrFail($patientlistId);
        $patient = Patient::findOrFail($patientId);

        return view('updatePatient', compact('patientlist', 'patient'));
    }

    public function update(Request $request, $patientlistId, $patientId){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        $patientlist = Patientlist::findOrFail($patientlistId);
        $patient = Patient::findOrFail($patientId);

        $patient->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('showPatient', $patientlist->id)
            ->with('success', 'Patient updated successfully!');
    }
}
