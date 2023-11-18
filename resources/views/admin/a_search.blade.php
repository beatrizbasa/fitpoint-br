@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    
<div class="container mt-5">
    <h1 class="text-danger">Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-dark mt-3">Add new Admin</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Add a search form -->
    <form action="{{ route('admin.search') }}" method="GET" class="mt-3">
        @csrf
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search Admin">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-bordered border border-danger text-center mt-3 h6">
        <!-- Table headers and data rows go here -->
    </table>
  
 
</div>
</body>
</html>
@endsection
