@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Clients</h1>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($client->count() > 0)
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
        @foreach($client as $client)
        <tr>
           
                    <td>{{  $client->id}}</td>
                    <td>{{ $client->firstname }}</td>
                    <td>{{ $client->lastname }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->contact_no }}</td>
                    <td>{{ $client->email}}</td>
                    <td>{{ $client->password }}</td>
                    <td>{{ $client->confirm_password }}</td>
                    <td>{{ $client->birthday}}</td>
                    <td>{{ $client->gender }}</td>
                    <td>{{ $client->deleted_at }}</td>
                    
                    
            <td>
            <a href="{{ route('clients.restore', $client->id) }}" class="btn btn-primary btn-sm">Restore</a>
            <a href="{{ route('clients.forceDelete', $client->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p class="mt-3 fs-5 text-center">No trashed Clients found.</p>
    @endif
</div>
@endsection
