@extends('layouts.app')
  
@section('content')

<style>
    a{
        text-decoration:none;
    }
</style>
<br> <br>
<div class="container"> 
<h1 class="mt-5 text-danger">Dashboard</h1>
<div class="container mt-5 ">
    <div class="row ">
        <div class="col-sm-3">
            <div class="card  border border-dark  bg-transparent">
                <div class="card-body" >
                    <h5 class="card-title">Total Admins</h5>
                    <a class="text-danger fw-bold h5" href="{{ route('admin.index') }}" class="text-primary h5"> {{ $totalAdmins }} </a>
                </div>
            </div><br>
        </div>
        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Instructors</h5>
                    <a class="text-danger fw-bold h5"  href="{{ route('instructor.index') }}">{{ $totalInstructor }} </a>
                </div>
            </div><br>
        </div>

        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Clients</h5>
                    <a class="text-danger fw-bold h5" href="{{ route('clients.index') }}" >{{ $totalClient }} </a>
                </div>
            </div><br> 
        </div>

        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Appointments</h5>
                <a class="text-danger fw-bold h5" href="{{ route('appointments.index') }}" >{{ $totalAppointments }}</a> 
                </div>
            </div><br>
        </div>

        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Payments</h5>
                <a class="text-danger fw-bold h5" href="{{ route('payments.index') }}">{{ $totalPayments }} </a> 
                </div>
            </div><br>
        </div>
        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Amount</h5>
                    <a class="text-danger fw-bold h5" href="{{ route('payments.index') }}" >{{ $totalAmount }} </a> 
                </div>
            </div><br>
        </div>

        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Paid Amount</h5>
                <a class="text-danger fw-bold h5" href="{{ route('payments.index') }}" >{{  $totalPaidPayments }} </a>
                </div>
            </div><br>
        </div>
        
        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total UnPaid Amount</h5>
                <a class="text-danger fw-bold h5" href="{{ route('payments.index') }}" >{{  $totalUnPaidPayments }}</a>
                </div>
            </div><br>
        </div>
        
        
        <div class="col-sm-3">
            <div class="card  border border-dark bg-transparent">
                <div class="card-body">
                <h5 class="card-title">Total Paid Persons</h5>
                <a class="text-danger fw-bold h5" href="{{ route('payments.paid-persons') }}" >{{ $paidPayments->where('status', 1)->count() }}</a>
                </div>
            </div><br>
        </div>

  <!-- resources/views/payments/index.blade.php -->

<div class="col-sm-3">
    <div class="card border border-dark bg-transparent">
        <div class="card-body">
            <h5 class="card-title">Total Unpaid Persons</h5>
            <a class="text-danger fw-bold h5" href="{{ route('payments.unpaid-persons') }}">{{ $unpaidPayments->where('status', 0)->count() }}</a>
        </div>
    </div><br>
</div>
   
</div>

// Next na gagawin ay ayusin yong Trainers in category, kapag pinindot yong Trainer ay magppakita lahat ng handle niyang client
@endsection

