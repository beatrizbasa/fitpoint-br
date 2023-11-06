@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
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
</style><br><br>

<div class="container mt-5">
    <h1 class="text-danger">Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-outline-dark mt-3 border-2">Create Payments</a>
    <a href="{{ route('payments.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>
    <form action="{{ route('payments.search') }}" method="GET" class="col-sm-3 mt-3 float-end border border-dark">
        @csrf
        <input type="text" name="search" class="search form-control" placeholder="Search">
    </form>

    <div class="table-responsive">
        <table class="table table-bordered border-danger text-center mt-4 h6 border-2">
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
                    <th>Status</th>
                    <th>Mark</th>
                    <th>Action</th>
               
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
                    <td>
                        @if ($payment->status == 1)
                            <h6 class="text-success">Paid</h6>
                        @else
                            <h6 class="text-danger">Unpaid</h6>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('payments.markAsPaid', ['id' => $payment->id]) }}" class="btn btn-success btn-sm">Paid</a>
                        <a href="{{ route('payments.markAsUnpaid', ['id' => $payment->id]) }}" class="btn btn-danger btn-sm">Unpaid</a>
                    </td>
                    <td>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{ route('payments.edit', $payment->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @include('admin/custom_pagination', ['paginator' => $payments])
    </div>
</div>
@endsection
