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
        .table-responsive{
    overflow-x: auto;
}
    }
</style><br><br>
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

                    <a class="btn btn-primary  btn-sm" href="{{ route('clients.edit',$client->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        
        <div class="pagination">
   
   </div>
   
</body>
</html>
@include('admin/custom_pagination', ['paginator' => $clients])
@endsection