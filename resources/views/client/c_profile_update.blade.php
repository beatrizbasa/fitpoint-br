<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('styles.css') }}?version=20">
    <style>
    body,h1,h2,h3,h4,h5,h6 {
        font-family: 'Open Sans', sans-serif;
    }
    .w3-bar,h1,button {
        font-family: 'Open Sans', sans-serif;
    }
    .fa-dumbbell,.fa-user-group {font-size:200px}
    </style>
</head>
<body>

<!-- Navbar -->
@include('partials.c_header')

<!-- First Grid -->
<div class="w3-container">

  <div class="w3-padding-64" style="margin-top: 3rem">
    <div class="row" style="padding: 0rem 15rem 0rem 15rem;">
        <div class="col-12">
            <h3 style="font-size:xx-large; ">Update Profile</h3>
            <p class="w3-text-grey">Update your profile information.</p>
        </div>
        <form action="{{ route('client.update_profile_changes', Auth::guard('client')->user()->id) }}" method="POST">
            @csrf
            <div class="col-12">
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>First name</b></label>
                    <input name="firstname" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->firstname }}">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Last name</b></label>
                    <input name="lastname" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->lastname }}">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Address</b></label>
                    <input name="address" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->address }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Contact no.</b></label>
                    <input name="contact_no" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->contact_no }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Birthday</b></label>
                    <input name="birthday" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->birthday }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Gender</b></label>
                    <input name="gender" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->gender }} ">
                </div>
                <div class="col-12">
                    <button type="submit" class="form-buttons" style="float: right;"> Save changes </button>
                </div>
            </div>
        </form>
    </div>
  </div>

  </div>
<!-- <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div> -->

@include('partials.footer')

</body>
</html>
