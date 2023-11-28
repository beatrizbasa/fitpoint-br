@extends('layouts.app')
@section('content')
<br><br><br>
@if (session('success'))
    <div class="alert text-white text-center bg-dark bg-gradient">
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
</style>
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
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email Address</th>
                    <th>Password</th>
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
                    <td>{{ $instructor->birthday}}</td>
                    <td>{{ $instructor->gender }}</td>
                    <td>{{ $instructor->created_at}}</td>
                    <td>{{ $instructor->updated_at }}</td>
                    
            <td>
            <form action="{{ route('instructor.destroy', $instructor->id) }}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{ route('instructor.edit', $instructor->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $instructor->id }}">Delete</button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteConfirmationModal{{ $instructor->id }}" tabindex="-1"
                                        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="lead">Are you sure you want to delete this instructor?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Confirmation Modal -->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @include('admin/custom_pagination', ['paginator' => $instructors])
        </div>
    </div>
@endsection