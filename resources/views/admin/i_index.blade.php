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
    .table-responsive{
    overflow-x: auto;
}
    }
</style><br><br>
<div class="container mt-5">
<h1 class="text-danger ">Personal Trainers</h1>
<a href="{{ route('instructor.create') }}" class="btn btn-outline-dark mt-3 border-2">Create Trainer</a>
<a href="{{ route('instructor.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>

<form action="{{ route('instructor.search') }}" method="GET" class="col-sm-3 mt-3 float-end border border-dark">
        @csrf
    
            <input type="text" name="search" class="search form-control" placeholder="Search">     
    </form>
    <div class="table-responsive">
    <table class="table table-bordered border-danger text-center mt-4 h6 border-2 ">
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
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($instructors as $instructor)
        <tr class="text-center">
           
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
                    <td>{{ $instructor->created_at}}</td>
                    <td>{{ $instructor->updated_at }}</td>
                    
            <td>
                <form action="{{ route('instructor.destroy',$instructor->id) }}" method="POST">
   

                    <a class="btn btn-primary btn-sm" href="{{ route('instructor.edit',$instructor->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @include('admin/custom_pagination', ['paginator' => $instructors])
@endsection