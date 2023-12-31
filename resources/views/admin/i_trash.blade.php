@extends('layouts.app')

@section('content')
<br><br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Trainers</h1>
    <a href="{{ route('instructor.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($Instructor->count() > 0)
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
            <!-- <a href="{{ route('instructor.forceDelete', $instructor->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a> -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $instructor->id }}">Delete Permanently</button>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $instructor->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $instructor->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this instructor permanently?
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <a href="{{ route('instructor.forceDelete', $instructor->id) }}" class="btn btn-danger">Delete Permanently</a>
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
    <p class="mt-3 fs-5 text-center">No trashed instructors found.</p>
    @endif
</div>
</div>
@endsection
