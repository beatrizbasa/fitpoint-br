@extends('layouts.app')

@section('content')
<br> <br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Admins</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($admin->count() > 0)
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
        @foreach ($admin as $admin)
        <tr>
           
                    <td>{{  $admin->id}}</td>
                    <td>{{ $admin ->firstname }}</td>
                    <td>{{ $admin ->lastname }}</td>
                    <td>{{ $admin ->address }}</td>
                    <td>{{ $admin ->contact_no }}</td>
                    <td>{{ $admin ->email}}</td>
                    <td>{{ $admin ->password }}</td>
                    <td>{{ $admin ->confirm_password }}</td>
                    <td>{{ $admin ->birthday}}</td>
                    <td>{{ $admin ->gender }}</td>
                    <td>{{ $admin ->deleted_at }}</td>
                    
                    
            <td>
            <a href="{{ route('admin.restore', $admin->id) }}" class="btn btn-primary btn-sm">Restore</a>
            <!-- <a href="{{ route('admin.forceDelete', $admin->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a> -->

            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $admin->id }}">Delete Permanently</button>

                <div class="modal fade" id="deleteConfirmationModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                <button type="button" class="btn-close btn-close-white"
                                    data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this admin permanently?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('admin.forceDelete', $admin->id) }} }}" class="btn btn-danger">Delete Permanently</a>
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
    <p class="mt-3 fs-5 text-center">No trashed Admins found.</p>
    @endif
</div>
</div>
@endsection
