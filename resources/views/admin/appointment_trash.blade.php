@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Appointments</h1>
    <a href="{{ route('appointments.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($appointment->count() > 0)
        <table class="table table-bordered border-2 border-danger text-center mt-4 h6">
    <thead>
            <tr>
                    <th>ID</th>
                    <th>Client ID</th>
                    <th>Medical Condition</th>
                    <th>Target</th>
                    <th>Personal Trainer ID</th>
                    <th>Appointment Time</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Deleted</th>
                    <th>Action</th>
                  
        </tr>
        </thead>
        <tbody>
        @foreach ($appointment as $appointment)
        <tr>
                    <td>{{ $appointment->id}}</td>
                    <td>{{ $appointment->client_id}}</td>
                    <td>{{ $appointment->medical_condition }}</td>
                    <td>{{ $appointment->target }}</td>
                    <td>{{ $appointment->instructors_id }}</td>
                    <td>{{ $appointment->appointment_time}}</td>
                    <td>{{ $appointment->created_at}}</td>
                    <td>{{ $appointment->updated_at}}</td>
                    <td>{{ $appointment->deleted_at }}</td></td>
                    
                    
            <td>
            <a href="{{ route('appointments.restore', $appointment->id) }}" class="btn btn-primary btn-sm">Restore</a>
            <a href="{{ route('appointments.forceDelete', $appointment->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p class="mt-3 fs-5 text-center">No trashed Appointments found.</p>
    @endif
</div>
@endsection
