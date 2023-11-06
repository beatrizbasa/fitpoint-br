@extends('layouts.app')

@section('content')
<br> <br>
<div class="container">
    <h1 class="text-danger mt-5">Trashed Payments</h1>
    <a href="{{ route('payments.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>


        @if($payments->count() > 0)
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
            <a href="{{ route('payments.forceDelete', $payment->id) }}" class="btn btn-danger btn-sm">Delete Permanently</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p class="mt-3 fs-5 text-center">No trashed instructors found.</p>
    @endif
</div>
@endsection
