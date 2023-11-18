<!-- resources/views/payments/unpaid-persons.blade.php -->

@extends('layouts.app')

@section('content')
<br><br><br>
    <div class="container mt-3">
        <h1 class="text-danger">Paid Persons</h1>
        
        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-dark mt-3 border-2">Back</a>

        <form action="{{ route('payments.paid-persons') }}" method="GET" class="col-sm-3 mt-3 float-end">
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
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paidPayments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->firstname }}</td>
                            <td>{{ $payment->lastname }}</td>
                            <td>{{ $payment->email}}</td>
                            <td>{{ $payment->amount}}</td>
                            <td>
                        @if ($payment->status == 1)
                            <h6 class="text-success">Paid</h6>
                        @else
                            <h6 class="text-danger">Unpaid</h6>
                        @endif
                    </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
             <div class="container text-end ">
                <p> Total Unpaid Amount:  <span class="fw-bold text-danger">{{ $paidPayments->sum('amount')  }}</span></p>
                <p> Total Paid Person :  <span class="fw-bold text-danger">{{ $paidPayments->where('status', 1)->count() }}</span></p>
            </div>
        </div>
    </div>
@endsection
