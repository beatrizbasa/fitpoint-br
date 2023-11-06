@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

</head>
<style>
    .container {
        border-radius: 5px;
        padding: 30px;
    }
    .i {
        margin-left: -30px;
        cursor: pointer;
    }
</style><br><br><br><br>
<body>
    

<div class="pull-left text-danger ms-5">
<h1>Edit Trainer</h1>
            </div>
       
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container border border-secondary col-md-10 border-3 mt-4">
        
        <form action="{{ route('instructor.update',$instructor->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        
        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Firstame') }}</label>
                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus value="{{ $instructor->firstname }}">
            </div>
         </div>
          
            <div class="col-md-4">
            <div class="form-group">
                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>
                <input id="lastname" type="text" class="form-control" name="lastname" required autofocus value="{{ $instructor->lastname }}">
            </div>
        </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                 <input id="email" type="email" class="form-control" name="email" required value="{{ $instructor->email }}">
            </div>
            </div>
      
            <div class="col-md-4">
            <div class="form-group">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required value="{{ $instructor->password }}">
                <span class="input-group-text">
                <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility('password')">
                </span>
            </div>
            </div>
        </div>


            <div class="col-md-4">
            <div class="form-group">
            <label for="confirm_password" class="col-md-6 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required value="{{ $instructor->confirm_password }}">
                <span class="input-group-text">
                <input type="checkbox" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password')">
                </span>
            </div> </div> </div>
     
     
     

        
            <div class="col-md-4">
            <div class="form-group">
                <label for="address" class="col-md-3 col-form-label text-md-end">{{ __('Address') }}</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ $instructor->address }}">
            </div>
            </div>
   
      
            <div class="col-md-4">
            <div class="form-group">
                <label for="contact_no" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>
                 <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ $instructor->contact_no}}">
        </div></div>
         

            <div class="col-md-4">
            <div class="form-group">
                <label for="birthday" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>
                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $instructor->birthday }}">
            </div>
        </div>

            <div class="col-md-4">
            <div class="form-group">     
                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                <select id="gender" class="form-select" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            </div>
                  
            <div class="col-sm-12  text-end mt-3">
            <a class="btn btn-primary border-2" href="{{ route('instructor.index') }}"> Back</a>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>


    <script>
     
    const togglePassword = document.querySelector("#togglePassword");
    const toggleConfirmPassword = document.querySelector("#toggleConfirmPassword");
    const password = document.querySelector("#password");
    const confirm_password = document.querySelector("#confirm_password");

    togglePassword.addEventListener("click", function () {
        togglePasswordVisibility(password, this);
    });

    toggleConfirmPassword.addEventListener("click", function () {
        togglePasswordVisibility(confirm_password, this);
    });

    function togglePasswordVisibility(field, checkbox) {
        // Toggle the type attribute
        const type = field.getAttribute("type") === "password" ? "text" : "password";
        field.setAttribute("type", type);

        // Toggle the eye icon
        checkbox.classList.toggle('fa-eye');
    }
</script>


    </body>
</html>
@endsection