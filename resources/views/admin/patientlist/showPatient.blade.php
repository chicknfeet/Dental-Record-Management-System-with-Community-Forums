@extends('layout.admin')

@section('content')
    <div class="container"> 

        <h2>Patient for {{ $patientlist->name }}</h2>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>ID: {{ $patientlist->id }}</th>
                    <th>Name: {{ $patientlist->name }}</th>
                    <th>Gender: {{ $patientlist->gender }}</th>
                    <th>Age: {{ $patientlist->age }}</th>
                    <th>Email: {{ $patientlist->email }}</th>
                    <th>Phone NO: {{ $patientlist->phoneno }}</th>
                    <th>Address: {{ $patientlist->address }}</th>
                </tr>
            </thead>
        </table>
        

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('addPatient', $patientlist->id) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Patient Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone NO</label>
                <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            @csrf
            <input type="hidden" name="patient" value="{{ $patientlist->id }}">
            <button type="button" class="btn btn-primary">Add patient</button>
            
        </form>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Phone NO.</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
            @if(is_iterable($patientlist) && count($patientlist) > 0)
                @forelse ($patientlist as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->gender }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->email }}</td>
                        <td>{{ $patient->phone}}</td>
                        <td>{{ $patient->address}}</td>
                        <td>
                            <a href="{{ route('updatePatientlist', [$patientlist->id, $patient->id]) }}" class="btn btn-warning">Edit patient</a>
                            <form method="post" action="{{ route('deletePatientlist', [$patientlist->id, $patient->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No patients registered yet.</td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>

        <a href="{{ route('admin.patientlist') }}" class="btn btn-secondary mt-3">Back to patients</a>
    </div>
@endsection

@section('title')
    Patient
@endsection