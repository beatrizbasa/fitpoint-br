@extends('layouts.app')

@section('content')
<br><br><br>
@if (session('success'))
    <div class="alert text-white text-center bg-dark bg-gradient">
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
</style>

<div class="container mt-5">
    <h1 class="text-danger">Payments</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-outline-dark mt-3 border-2">Create Payments</a>
    <a href="{{ route('payments.trash') }}" class="btn btn-outline-danger mt-3 border-2">Trash</a>

        <!-- <label for="paymentStatusFilter">Filter by Payment Status:</label>
        <select id="paymentStatusFilter" class="col-sm-3 mt-3 border border-dark">
            <option value="">All Payments</option>
            <option value="1">Paid</option>
            <option value="0">Unpaid</option>
        </select>
     -->

    <form action="{{ route('payments.search') }}" method="GET" class="col-sm-3 mt-3 float-end border border-dark">
        @csrf
        <input type="text" name="search" class="search form-control" placeholder="Search">
    </form>

    <div class="table-responsive">
    <table id="per_trainersTbl" class=" payment-status table table-bordered border-danger text-center mt-4 h6 border-2">
        
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

                                    
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal{{ $payment->id }}">Delete</button>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteConfirmationModal{{ $payment->id }}" tabindex="-1"
                                        aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="lead">Are you sure you want to delete this payment?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete Confirmation Modal -->
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="container text-end ">
        <p> Total Amount: ₱<span class="fw-bold text-danger">{{ $totalAmount }} </span></p>
        <p> Total Paid Amount:  <span class="fw-bold text-danger">{{ $paidPayments->sum('amount')  }}</span></p>
        <p> Total Unpaid Amount:  <span class="fw-bold text-danger">{{ $unpaidPayments->sum('amount')  }}</span></p>
        <p> Total Paid Person :  <span class="fw-bold text-danger">{{ $paidPayments->where('status', 1)->count() }}</span></p>
        <p> Total Unpaid Person :  <span class="fw-bold text-danger">{{ $unpaidPayments->where('status', 0)->count() }}</span></p>
        </div>
        @include('admin/custom_pagination', ['paginator' => $payments])
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
    

            // Add a dropdown filter for the payment status
            $('#paymentStatusFilter').on('change', function() {
                var selectedValue = $(this).val();

                // Filter the DataTable based on the selected payment status
                table.columns('.payment-status').search(selectedValue).draw();
            });
       
    </script>

@endsection