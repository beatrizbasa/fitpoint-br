@extends('layouts.app')

@section('content')
<br><br>
<div class="container mt-5">
    <h2 class="text-center text-danger">Appointment Details</h2>

    <div class="container col-sm-5 mt-5 p-4 rounded-3 bg-white dark:bg-gray-800 shadow">
        <table class="table table-bordered border border-dark">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td><span class="fw-bold">{{ $appointment->id }}</span></td>
                </tr>
                <tr>
                    <th>Medical Condition:</th>
                    <td><span class="fw-bold">{{ $appointment->medical_condition }}</span></td>
                </tr>
                <tr>
                    <th>Target:</th>
                    <td><span class="fw-bold">{{ $appointment->target }}</span></td>
                </tr>
                <tr>
                    <th>Instructors ID:</th>
                    <td><span class="fw-bold">{{ $appointment->instructors_id }}</span></td>
                </tr>
                <tr>
                    <th>Appointment Time:</th>
                    <td><span class="fw-bold">{{ $appointment->appointment_time }}</span></td>
                </tr>
                <tr>
                    <th>Created At:</th>
                    <td><span class="fw-bold">{{ $appointment->created_at }}</span></td>
                </tr>
                <tr>
                    <th>Updated At:</th>
                    <td><span class="fw-bold">{{ $appointment->updated_at }}</span></td>
                </tr>
            </tbody>
        </table>

        <form class="d-md-flex justify-content-md-end gap-1" action="{{ route('appointments.destroy', $appointment->id) }}" method="POST">
            <a class="btn btn-primary btn-sm" href="{{ route('appointments.index', $appointment->id) }}">Back</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</div>


</div>
</div>
</div>
@endsection
