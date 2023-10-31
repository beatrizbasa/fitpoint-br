<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('styles.css') }}?version=20">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
    <div class="row mobile" style="padding: 0rem 15rem 0rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Upcoming Appointment</h3>
        @if($appointments == null)<p class="w3-text-grey">No current appointment yet.</p>
        <a class="link-buttons" href="{{ route('client.book_appointment') }}">Book an appointment now!</a>

        @else
        @foreach ($appointments as $appointment)
        <br>
        <div>
          @if(Session::has('message'))
            {{ session::get('message') }} 
          @endif
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Personal trainer</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $appointment->fullname }}">
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Medical condition</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $appointment->medical_condition }}">
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Target of workout</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $appointment->target }}">
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment date</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $appointment->appointment_date }}">
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment time</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $appointment->appointment_time }}">
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment status</b></label>
          @if($appointment->status == 'Pending')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="PENDING" style="background-color: lightgray; font-weight: bold">
          @elseif($appointment->status == 'Accepted')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACCEPTED" style="background-color: lightgreen; color: darkgreen; font-weight: bold">
          @elseif($appointment->status == 'Declined')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="DECLINED" style="background-color: pink; color: darkred; font-weight: bold">
          @endif
        </div>
        <div class="col-12">
          <hr style="border: 2px solid black" width="100%">
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>

  <hr style="border: 2px solid black" width="100%">

  <div >
    <div class="row mobile" style="padding: 2rem 15rem 2rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Workout Plan</h3>
        <p class="w3-text-grey">No ongoing workout plan yet.</p>
        <a class="link-buttons" href="">Book your personal trainer now!</a>
      </div>
    </div>
  </div>

  <hr style="border: 2px solid black" width="100%">

  <!-- Second Grid -->
  <div class=" " style="margin-top: 0rem;">
    <div class="row mobile"  style="padding: 2rem 15rem 2rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Personal Trainers</h3>
        <h5 style="padding: 2rem 0rem 2rem 0rem;">Below is a list of A&T Fitness Center's personal trainers where you can choose who you want to help you achieve your dream body!</h5>
        <div class="col-12" style="overflow-x:auto;">
          <table id="per_trainersTbl" class="display">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Address</th>
                    <th>Contact no.</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personal_trainers as $personal_trainer)
                <tr>
                    <td>{{ $personal_trainer->full_name }}</td>
                    <td>{{ $personal_trainer->address }}</td>
                    <td>{{ $personal_trainer->contact_no }}</td>
                    <td>{{ $personal_trainer->gender }}</td>
                    <td><a class="link-buttons" href="{{ route('client.book_appointment_form', $personal_trainer->id) }}">Book an appointment</a></td>
                </tr>
                @endforeach
                </form>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>

  </div>
<!-- <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div> -->

@include('partials.footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#per_trainersTbl').DataTable();
    });
</script>
</body>
</html>
