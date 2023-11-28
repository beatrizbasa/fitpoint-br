@extends('layouts.app')
@section('content')
<br><br><br>
@if (session('success'))
    <div class="alert text-white text-center bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif

<style>
    .search {
        border: none;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>

<div class="container mt-3">
<h1 class="text-danger ">Admins</h1>
<a href="{{ route('admin.create') }}" class="btn btn-outline-dark mt-3 border-2">Create Admin</a>
<a href="{{ route('admin.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>


<form action="{{ route('admins.search') }}" method="GET" class="col-sm-3 mt-3 float-end border border-dark">
        @csrf
        <input type="text" name="search" class="search form-control" placeholder="Search">
    </form>

    <div class="table-responsive">
    <table class="table table-bordered border-danger text-center mt-4 h6 border-2">
    <thead>
            <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Contact No</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>gender</th>
                    <th>Password</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($admins as $admin)
        <tr>
                    <td>{{ $admin->id}}</td>
                    <td>{{ $admin->firstname }}</td>
                    <td>{{ $admin->lastname }}</td>
                    <td>{{ $admin->address }}</td>
                    <td>{{ $admin->contact_no }}</td>
                    <td>{{ $admin->email}}</td>
                    <td>{{ $admin->birthday}}</td>
                    <td>{{ $admin->gender}}</td>
                    <td>{{ $admin->password }}</td>
                    <td>{{ $admin->created_at}}</td>
                    <td>{{ $admin->updated_at }}</td>
            <td>
                <form action="{{ route('admin.destroy',$admin->id) }}" method="POST">
   
                    <a class="btn btn-primary  btn-sm" href="{{ route('admin.edit',$admin->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $admin->id }}">Delete</button>

                    <div class="modal fade" id="deleteConfirmationModal{{ $admin->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete this admin?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
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
    @include('admin/custom_pagination', ['paginator' => $admins])
    </div>
@endsection