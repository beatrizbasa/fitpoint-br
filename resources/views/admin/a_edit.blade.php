@extends('layouts.app')
@section('content')

<style>
    .container {
        border-radius: 5px;
        padding: 30px;
      
    }
       .i {
            margin-left: -30px;
            cursor: pointer;
        }
        /* .col-md-8{
            margin-left
        } */
    </style><br> <br><br> <br>
<div class="pull-left text-danger ms-5 ">
<h1>Edit Admin</h1>
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
        <form action="{{ route('admin.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="firstname" class="col-form-label text-md-end">{{ __('Firstame') }}</label>
                        <input id="firstname" type="text" class="form-control" name="firstname" required autofocus value="{{ $admin->firstname }}">
                    </div>
                </div>
          
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastname" class="col-form-label text-md-end">{{ __('Lastname') }}</label>
                        <input id="lastname" type="text" class="form-control" name="lastname" required autofocus value="{{ $admin->lastname }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-end">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control" name="email" required value="{{ $admin->email }}">
                    </div>
                </div>
      
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="input-group">
                            <input id="password" type="password" class="form-control" name="password" required value="{{ $admin->password }}">
                            <span class="input-group-text">
                                <input type="checkbox" id="togglePassword" onclick="togglePasswordVisibility('password')">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="confirm_password" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <div class="input-group">
                            <input id="confirm_password" type="password" class="form-control" name="confirm_password" required value="{{ $admin->confirm_password }}">
                            <span class="input-group-text">
                                <input type="checkbox" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password')">
                            </span>
                        </div>
                    </div>
                </div>
     
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="address" class="col-form-label text-md-end">{{ __('Address') }}</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{ $admin->address }}">
                    </div>
                </div>
   
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contact_no" class="col-form-label text-md-end">{{ __('Contact No') }}</label>
                        <input id="contact_no" type="text" class="form-control" name="contact_no" value="{{ $admin->contact_no }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday" class="col-form-label text-md-end">{{ __('Birthday') }}</label>
                        <input id="birthday" type="date" class="form-control" name="birthday" value="{{ $admin->birthday }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">     
                        <label for="gender" class="col-form-label text-md-end">{{ __('Gender') }}</label>
                        <select id="gender" class="form-select" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 text-end mt-3">
                    <a class="btn btn-primary" href="{{ route('admin.index') }}">Back</a>
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
    </div>
</body>
</html>
@endsection
