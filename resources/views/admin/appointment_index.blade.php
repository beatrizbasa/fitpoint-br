@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif

<style>
    .search{
        border: none; /* or border: 0; */
    }
</style><br><br>
<div class="container mt-5">
<h1 class="text-danger ">Appointments</h1>
<a href="{{ route('appointments.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>
<form action="#" method="GET" class="col-sm-3 mt-3 float-end border-dark  border-2 mb-4">
        @csrf
    
            <input type="text" name="search" class="search form-control  " placeholder="Search">
        
    </form>
    <table class="table table-bordered border-danger text-dark text-center mt-5 h6 border-2" style="color: black;">
    <thead>
    <tr class="text-center">
                    <th>ID</th>
                    <th>Client ID</th>
                    <th>Medical Condition</th>
                    <th>Target</th>
                    <th>Personal Trainer ID</th>
                    <th>Appointment Time</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
        <tr>
                    <td>{{ $appointment->id}}</td>
                    <td>{{ $appointment->client_id}}</td>
                    <td>{{ $appointment->medical_condition }}</td>
                    <td>{{ $appointment->target }}</td>
                    <td>{{ $appointment->instructors_id }}</td>
                    <td>{{ $appointment->appointment_time}}</td>
                    <td>{{ $appointment->created_at}}</td>
                    <td>{{ $appointment->updated_at}}</td>

            <td>
            <form action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
   
            <a class="btn btn-success btn-sm" href="{{ route('appointments.view',$appointment->id) }}">View</a>

                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $appointment->id }}">Delete</button>

                    <div class="modal fade" id="deleteConfirmationModal{{ $appointment->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete this appointment?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin/custom_pagination', ['paginator' => $appointments])
    </div>
@endsection