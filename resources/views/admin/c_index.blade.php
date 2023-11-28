@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif

<style>
    .search{
        border: none; 
    }
        .table-responsive{
    overflow-x: auto;
}
</style> 
<div class="container mt-5">
<h1 class="text-danger ">Clients</h1>
<a href="{{ route('clients.create') }}" class="btn btn-outline-dark mt-3 border-2">Create Client</a>
<a href="{{ route('clients.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>


<form method="GET" class="col-sm-3 mt-3 float-end border-dark  border-2">
        @csrf
    
            <input type="text" name="search" class="search form-control" placeholder="Search">
        
        <!-- <button type="submit" class="btn btn-primary">Search</button> -->
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
                    <th>Password</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Active</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($clients as $client)
        <tr>      
                    <td>{{ $client->id}}</td>
                    <td>{{ $client->firstname }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->contact_no }}</td>
                    <td>{{ $client->email}}</td>
                    <td>{{ $client->password }}</td>
                    <td>{{ $client->birthday}}</td>
                    <td>{{ $client->gender }}</td>     
                    <td>{{ $client->created_at}}</td>
                    <td>{{ $client->updated_at }}</td>
                         
            <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">

                    <a class="btn btn-primary btn-sm" href="{{ route('clients.edit', $client->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $client->id }}">Delete</button>

                    <div class="modal fade" id="deleteConfirmationModal{{ $client->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">Are you sure you want to delete this client?</p>
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
        
   </div>
@include('admin/custom_pagination', ['paginator' => $clients])
@endsection