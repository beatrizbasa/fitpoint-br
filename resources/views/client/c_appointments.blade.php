<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointments</title>
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

    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: medium !important;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }

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
        @if($pen_id == null)<p class="w3-text-grey">No current appointment yet.</p>
        <a class="link-buttons" href="{{ route('client.book_appointment') }}">Book an appointment now!</a>

        @else
        @foreach ($pen_appts as $pen_appt)
        <br>
        <div>
          @if(Session::has('message'))
            {{ session::get('message') }} 
          @endif
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Personal trainer</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $pen_appt->firstname }} {{ $pen_appt->lastname }}" readonly>
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Medical condition</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $pen_appt->medical_condition }}" readonly>
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Target of workout</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $pen_appt->target }}" readonly>
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment date</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $pen_appt->appointment_date }}" readonly>
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment time</b></label>
          <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $pen_appt->appointment_time }}" readonly>
        </div>
        <div class="col-4 adjust-top">
          <label for="inputFname" class="form-label"><b>Appointment status</b></label>
          @if($pen_appt->status == 'Pending')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="PENDING" style="background-color: lightgray; font-weight: bold" readonly>
          @elseif($pen_appt->status == 'Accepted')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="ACCEPTED" style="background-color: lightgreen; color: darkgreen; font-weight: bold" readonly>
          @elseif($pen_appt->status == 'Declined')
            <input name="appointment_time" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="DECLINED" style="background-color: pink; color: darkred; font-weight: bold" readonly>
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

  <!-- Second Grid -->
  <div class=" " style="margin-top: 0rem;">
    <div class="row mobile"  style="padding: 2rem 15rem 2rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Past Appointments</h3>
        <h5 style="padding: 2rem 0rem 2rem 0rem;">Below is a list of all your past appointments in A&T Fitness Center filtered per status.</h5>
      </div>
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'accepted')" id="defaultOpen">Accepted Appointments</button>
        <button class="tablinks" onclick="openCity(event, 'declined')">Declined Appointments</button>
        <button class="tablinks" onclick="openCity(event, 'cancelled')">Cancelled Appointments</button>
      </div>

      <div id="accepted" class="tabcontent">
        <h3>accepted</h3>
        <div class="col-12" style="overflow-x:auto;">
          <table id="acc_apptsTbl" class="display">
          <thead>
            <tr>
                <th>Personal Trainer Name</th>
                <th>Medical Condition</th>
                <th>Target of Workout</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($acc_appts as $acc_appt)
            <tr>
                <td>{{ $acc_appt->firstname }} {{ $acc_appt->lastname }}</td>
                <td>{{ $acc_appt->medical_condition }}</td>
                <td>{{ $acc_appt->target }}</td>
                <td>{{ $acc_appt->appointment_date }}</td>
                <td>{{ $acc_appt->appointment_time }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>

      <div id="declined" class="tabcontent">
        <h3>declined</h3>
        <div class="col-12" style="overflow-x:auto;">
          <table id="dec_apptsTbl" class="display">
          <thead>
            <tr>
                <th>Personal Trainer Name</th>
                <th>Medical Condition</th>
                <th>Target of Workout</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dec_appts as $dec_appt)
            <tr>
                <td>{{ $dec_appt->firstname }} {{ $dec_appt->lastname }}</td>
                <td>{{ $dec_appt->medical_condition }}</td>
                <td>{{ $dec_appt->target }}</td>
                <td>{{ $dec_appt->appointment_date }}</td>
                <td>{{ $dec_appt->appointment_time }}</td>
            </tr>
            @endforeach
          </tbody>
          </table>
        </div>
      </div>

      <div id="cancelled" class="tabcontent">
        <h3>cancelled</h3>
        <div class="col-12" style="overflow-x:auto;">
          <table id="can_apptsTbl" class="display">
          <thead>
            <tr>
                <th>Personal Trainer Name</th>
                <th>Medical Condition</th>
                <th>Target of Workout</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($can_appts as $can_appt)
            <tr>
                <td>{{ $can_appt->firstname }} {{ $can_appt->lastname }}</td>
                <td>{{ $can_appt->medical_condition }}</td>
                <td>{{ $can_appt->target }}</td>
                <td>{{ $can_appt->appointment_date }}</td>
                <td>{{ $can_appt->appointment_time }}</td>
            </tr>
            @endforeach
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

@include('partials.c_footer')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();

  $(document).ready(function() {
    $('#acc_apptsTbl').DataTable();
    $('#dec_apptsTbl').DataTable();
    $('#can_apptsTbl').DataTable();
  });
  
</script>
</body>
</html>
