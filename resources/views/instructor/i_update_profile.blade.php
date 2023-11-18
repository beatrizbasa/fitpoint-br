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

    @media only screen and (max-width: 768px) {
      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }

      .imgs {
        max-width: 100%; 
        height: auto;    /* This ensures the image keeps its aspect ratio */
        display: block;
      }

      .mobile{
        padding: 0.5rem 1rem 0.5rem 1rem !important;
      }
    }
    </style>
</head>
<body>

<!-- Navbar -->
@include('partials.pt_header')

<!-- First Grid -->
<div class="w3-container">

  <div class="w3-padding-64" style="margin-top: 3rem">
    <div class="row mobile" style="padding: 0rem 15rem 0rem 15rem;">
        <div class="col-12">
            <h3 style="font-size:xx-large; ">Update Profile</h3>
            <p class="w3-text-grey">Update your profile information.</p>
        </div>
        <form action="{{ route('instructor.update_profile_changes', Auth::guard('instructor')->user()->id) }}" method="POST">
            @csrf
            <div class="col-12">
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>First name</b></label>
                    <input name="firstname" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->firstname }}">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Last name</b></label>
                    <input name="lastname" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->lastname }}">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Address</b></label>
                    <input name="address" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->address }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Contact no.</b></label>
                    <input name="contact_no" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->contact_no }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Birthday</b></label>
                    <input name="birthday" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->birthday }} ">
                </div>
                <div class="col-4">
                    <label for="inputFname" class="form-label"><b>Gender</b></label>
                    <!-- <input name="gender" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('instructor')->user()->gender }} "> -->

                    <select name="gender" class="form-control">
                        @if (Auth::guard('instructor')->user()->gender == 'female')
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                        @else
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        @endif
                    </select>
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

@include('partials.pt_footer')

</body>
</html>
