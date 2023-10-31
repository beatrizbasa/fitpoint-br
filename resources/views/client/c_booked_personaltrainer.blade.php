<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booked Personal Trainer</title>
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
@include('partials.c_header')

<!-- First Grid -->
<div class="w3-container">

  <div class="w3-padding-64" style="margin-top: 3rem">
    <div class="row" style="padding: 0rem 15rem 0rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Current Booked Personal Trainer</h3>
        @if($personal_trainer == null)<p class="w3-text-grey">No current booked personal trainer yet.</p>
        <a class="link-buttons" href="{{ route('client.book_appointment') }}">Book your personal trainer now!</a>

        @else
          @foreach ($personal_trainer as $p_trainer)
          <div class="col-4 adjust-top">
            <label for="inputFname" class="form-label"><b>Personal trainer</b></label>
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $p_trainer->fullname }}" readonly>
          </div>
          <div class="col-4 adjust-top">
            <label for="inputFname" class="form-label"><b>Address</b></label>
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $p_trainer->address }}" readonly>
          </div>
          <div class="col-4 adjust-top">
            <label for="inputFname" class="form-label"><b>Contact no.</b></label>
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $p_trainer->contact_no }}" readonly>
          </div>
          <div class="col-4 adjust-top">
            <label for="inputFname" class="form-label"><b>Birthday</b></label>
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $p_trainer->birthday }}" readonly>
          </div>
          <div class="col-4 adjust-top">
            <label for="inputFname" class="form-label"><b>Gender</b></label>
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $p_trainer->gender }}" readonly>
          </div>
        @endforeach
        @endif
    </div>
    </div>
  </div>

  <hr style="border: 2px solid black" width="100%">

  <!-- Second Grid -->
  <div class=" " style="margin-top: 0rem;">
    <div class="row"  style="padding: 2rem 15rem 2rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Former Personal Trainers</h3>
        <h5 style="padding: 2rem 0rem 2rem 0rem;">Below is a list of all your former A&T Fitness Center personal trainers.</h5>
      </div>
      
    </div>
  </div>

  </div>
<!-- <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div> -->

@include('partials.footer')

</body>
</html>