@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Clients</h1>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($client->count() > 0)
        <div class="table-responsive">
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
            <!-- <a href="{{ route('clients.forceDelete', $client->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>
 -->

            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $client->id }}">Delete Permanently</button>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $client->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this payment permanently?
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('clients.forceDelete', $client->id) }}" class="btn btn-danger">Delete Permanently</a>
                                     </div>
                                </div>
                            </div>
                        </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p class="mt-3 fs-5 text-center">No trashed Clients found.</p>
    @endif
</div></div>
@endsection
