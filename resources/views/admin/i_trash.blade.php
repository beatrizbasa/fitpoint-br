@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Trainers</h1>
    <a href="{{ route('instructor.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($Instructor->count() > 0)
        <table class="table table-bordered border border-danger text-center mt-4 h6">
    <thead>
            <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Deleted at</th>
                    <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Instructor as $instructor)
        <tr>
           
                    <td>{{  $instructor->id}}</td>
                    <td>{{ $instructor->firstname }}</td>
                    <td>{{ $instructor->lastname }}</td>
                    <td>{{ $instructor->address }}</td>
                    <td>{{ $instructor->contact_no }}</td>
                    <td>{{ $instructor->email}}</td>
                    <td>{{ $instructor->password }}</td>
                    <td>{{ $instructor->confirm_password }}</td>
                    <td>{{ $instructor->birthday}}</td>
                    <td>{{ $instructor->gender }}</td>
                    <td>{{ $instructor->deleted_at }}</td>
                    
                    
            <td>
            <a href="{{ route('instructor.restore', $instructor->id) }}" class="btn btn-primary btn-sm">Restore</a>
            <a href="{{ route('instructor.forceDelete', $instructor->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p class="mt-3 fs-5 text-center">No trashed instructors found.</p>
    @endif
</div>
@endsection
