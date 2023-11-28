@extends('layouts.app')

@section('content')
<br> <br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Payments</h1>
    <a href="{{ route('payments.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($payments->count() > 0)
        <div class="table-responsive">
        <table class="table table-bordered border border-danger text-center mt-4 h6">
    <thead>
            <tr>
            <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
                    <th>Amount</th>
                    <th>Date Create</th>
                    <th>Date Updated</th>
                    <th>Deleted at</th>
                    <th>Status</th>
                    <th>Action </th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
        <tr>
           
        <td>{{ $payment->id }}</td>
                    <td>{{ $payment->firstname }}</td>
                    <td>{{ $payment->lastname }}</td>
                    <td>{{ $payment->address }}</td>
                    <td>{{ $payment->contact_no }}</td>
                    <td>{{ $payment->gender }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->created_at }}</td>
                    <td>{{ $payment->updated_at }}</td>
                    <td>{{ $payment->deleted_at }}</td>
                    <td>
                        @if ($payment->status == 1)
                            <h6 class="text-success">Paid</h6>
                        @else
                            <h6 class="text-danger">Unpaid</h6>
                        @endif
                    </td>
                    
                    
            <td>
            <a href="{{ route('payments.restore', $payment->id) }}" class="btn btn-primary btn-sm">Restore</a>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $payment->id }}">Delete Permanently</button>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $payment->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel{{ $payment->id }}" aria-hidden="true">
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
                                        <a href="{{ route('payments.forceDelete', $payment->id) }}" class="btn btn-danger">Delete Permanently</a>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Confirmation Modal -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="mt-3 fs-5 text-center">No trashed instructors found.</p>
    @endif
</div>

@endsection
