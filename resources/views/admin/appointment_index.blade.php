@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif

<style>
    .search{
        border: none; /* or border: 0; */
    }
</style><br><br>
<div class="container mt-5">
<h1 class="text-danger ">Appointments</h1>

<form action="#" method="GET" class="col-sm-3 mt-3 float-end border-dark  border-2 mb-4">
        @csrf
    
            <input type="text" name="search" class="search form-control  " placeholder="Search">
        
    </form>
    <table class="table table-bordered border-danger text-center mt-5 h6 border-2">
    <thead>
    <tr class="text-center">
                    <th>ID</th>
                    <th>Client ID</th>
                    <th>Medical Condition</th>
                    <th>Target</th>
                    <th>Personal Trainer ID</th>
                    <th>Appointment Time</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
        </tr>
        </thead>
        <tbody>

                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    
            <td>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  btn-sm">Delete</button>
                </form>
            </td>
        </tr>
 
        </tbody>
    </table>
    <div class="pagination">
   
</div>
@include('admin/custom_pagination', ['paginator' => $appointments])
@endsection