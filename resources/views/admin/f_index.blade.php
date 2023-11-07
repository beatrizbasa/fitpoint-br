@extends('layouts.app')

@section('content')

@if (session('success'))
    <div class="alert text-white bg-dark bg-gradient">
        {{ session('success') }}
    </div>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<br><br><br><br>

<div class="container">
    <h1 class="text-danger "> Feedbacks</h1>
    <div class="container mt-3 border border-secondary p-4">
    <h7 class="p-3 fw-bold text-success"> Rochelle Alarcio </h7>
            <div class="overflow-hidden shadow-lg ">
            <p class="p-3"> Very Good System! I recommend  Very Good System! I recommend    Very Good System! I recommend Very Good System! I recommend   Very Good System! I recommend    Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend</p>    
            </div>
            
            <button class="btn btn-outline-danger btn-sm mt-3"> Delete</button><br><br><br>
       
            <h7 class="p-3 fw-bold text-success"> Rochelle Alarcio </h7>
            <div class="overflow-hidden shadow-lg ">
            <p class="p-3"> Very Good System! I recommend  Very Good System! I recommend    Very Good System! I recommend Very Good System! I recommend   Very Good System! I recommend    Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend   Very Good System! I recommend</p>    
            </div>
            
            <button class="btn btn-outline-danger btn-sm mt-3"> Delete</button><br><br><br>
            
            <h7 class="p-3 text-success fw-bold"> Rochelle Alarcio </h7>
            <div class="overflow-hidden shadow-lg ">
            <p class="p-3 "> Very Good System! I recommend thissssssssssssssssssssssssssssssss</p>    
            </div>
            <button class="btn btn-outline-danger btn-sm mt-3"> Delete</button><br><br>
         </div>
    </div>

</body>
</html>
@endsection