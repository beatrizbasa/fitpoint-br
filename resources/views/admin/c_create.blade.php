@extends('layouts.app')

  
@section('content')
<br><br>
<div class="container">
<div class="row p-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left text-danger mt-3">
            <h2>Create Client</h2>
        </div>
    </div>
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
   
<div class="container border border-secondary col-md-10 border-3 mt-3 p-3 ">

<form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="firstname" class="col-md-2 col-form-label ">{{ __('Firstame') }}</label>
                <input id="firstname" type="text" class="form-control" name="firstname" required autofocus >
            </div>
         </div>
          
            <div class="col-md-4">
            <div class="form-group">
                <label for="lastname" class="col-md-2 col-form-label">{{ __('Lastname') }}</label>
                <input id="lastname" type="text" class="form-control" name="lastname" required autofocus >
            </div>
        </div>

            <div class="col-md-4">
            <div class="form-group">
                <label for="email" class="col-md-2 col-form-label">{{ __('Email') }}</label>
                 <input id="email" type="email" class="form-control" name="email" required >
            </div>
            </div>
      
            <div class="col-md-4">
            <div class="form-group">
            <label for="password" class="col-md-2 col-form-label mt-2">{{ __('Password') }}</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" required >
                <span class="input-group-text">
                <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility('password')">
                </span>
            </div>
            </div>
        </div>


            <div class="col-md-4">
            <div class="form-group">
            <label for="confirm_password" class="col-md-6 col-form-label mt-2">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required>
                <span class="input-group-text">
                <input type="checkbox" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password')">
                </span>
            </div> </div> </div>
     
     
     

        
            <div class="col-md-4">
            <div class="form-group">
                <label for="address" class="col-md-2 col-form-label mt-2">{{ __('Address') }}</label>
                <input id="address" type="text" class="form-control" name="address">
            </div>
            </div>
   
      
            <div class="col-md-4">
            <div class="form-group">
                <label for="contact_no" class="col-md-4 col-form-label mt-2">{{ __('Contact No') }}</label>
                 <input id="contact_no" type="text" class="form-control" name="contact_no">
        </div></div>
         

            <div class="col-md-4">
            <div class="form-group">
                <label for="birthday" class="col-md-2 col-form-label mt-2">{{ __('Birthday') }}</label>
                <input id="birthday" type="date" class="form-control" name="birthday" >
            </div>
        </div>

            <div class="col-md-4">
            <div class="form-group">     
                <label for="gender" class="col-md-2 col-form-label mt-2">{{ __('Gender') }}</label>
                <select id="gender" class="form-select" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            </div>
                  
            <div class="col-sm-12  text-end mt-3">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
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