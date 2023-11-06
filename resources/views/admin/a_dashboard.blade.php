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
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-4">
            <div class="card  border border-dark">
                <div class="card-body">
                    <h5 class="card-title">Total Admins</h5>
                    <p class="text-danger fw-bold h5">{{ $totalAdmins }} <a href="{{ route('admin.index') }}" class="text-primary h3" style="margin-left:70%;">view</a></p>
                </div>
            </div><br>
        </div>
        <div class="col-sm-4">
            <div class="card  border border-dark">
                <div class="card-body">
                <h5 class="card-title">Total Instructors</h5>
                    <p class="text-danger fw-bold h5">{{ $totalInstructor }} <a href="{{ route('instructor.index') }}" class="text-primary h3" style="margin-left:70%;">view</a>
</p> 
                </div>
            </div><br>
        </div>

        <div class="col-sm-4">
            <div class="card  border border-dark">
                <div class="card-body">
                <h5 class="card-title">Total Clients</h5>
                    <p class="text-danger fw-bold h5">{{ $totalClient }} <a href="{{ route('clients.index') }}" class="text-primary h3" style="margin-left:70%;">view</a></p> 
                </div>
            </div><br> 
        </div>

        <div class="col-sm-4">
            <div class="card  border border-dark">
                <div class="card-body">
                <h5 class="card-title">Total Appointments</h5>
                    <p class="text-danger fw-bold h5">{{ 3 }} <a  class="text-primary h3" style="margin-left:70%;">view</a></p> 
                </div>
            </div><br>
        </div>

        <div class="col-sm-4">
            <div class="card  border border-dark">
                <div class="card-body">
                <h5 class="card-title">Total Payments</h5>
                    <p class="text-danger fw-bold h5">{{ $totalPayments }} <a href="{{ route('payments.index') }}" class="text-primary h3" style="margin-left:70%;">view</a></p> 
                </div>
            </div><br>
        </div>
        
    
</div>
@endsection

