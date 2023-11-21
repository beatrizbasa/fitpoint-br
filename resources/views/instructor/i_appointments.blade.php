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

    .link-buttons{
      text-align: center;
      text-decoration: none;
      display: inline-block;
      border-radius: 0.5rem !important;
      padding: 0.4rem !important;
      width: auto;
    }

    .accept-btn {
      background-color: lightgreen !important;
      color: darkgreen !important;
    }

    .decline-btn {
      background-color: pink !important;
      color: darkred !important;
    }

    .accept-btn:hover{
      background-color: darkgreen !important;
      color: white !important;
    }

    .decline-btn:hover{
      background-color: darkred !important;
      color: white !important;
    }

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
      font-size: 17px;
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
        <h3 style="font-size:xx-large; ">Pending Appointments</h3>
        @if($appointments == null)<p class="w3-text-grey">No pending appointments yet.</p>
        @else<p class="w3-text-grey">Below is a list of all your pending appointments. <b>Press <i class="fa-solid fa-circle-check" style="font-size: larger;"></i> if you accept the appointment, <i class="fa-solid fa-circle-xmark" style="font-size: larger;"></i> if you decline the appointment.</b></p>
      </div>
      
      <div class="col-12" style="overflow-x:auto;">
        <table id="apptsTbl" class="display">
        <thead>
          <tr>
              <th>Client Name</th>
              <th>Medical Condition</th>
              <th>Target of Workout</th>
              <th>Appointment Date</th>
              <th>Appointment Time</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($appointments as $appointment)
          <tr>
              <td>{{ $appointment->client_firstname }} {{ $appointment->client_lastname }}</td>
              <td>{{ $appointment->medical_condition }}</td>
              <td>{{ $appointment->target }}</td>
              <td>{{ $appointment->appointment_date }}</td>
              <td>{{ $appointment->appointment_time }}</td>
              <td><a class="accept-btn link-buttons" href="{{ route('client.book_appointment') }}" ><i class="fa-solid fa-circle-check" style="font-size: larger;"></i></a> <a class="decline-btn link-buttons" href="{{ route('client.book_appointment') }}" ><i class="fa-solid fa-circle-xmark" style="font-size: larger;"></i></a></td>
          </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>
    @endif
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
                <td>{{ $acc_appt->full_name }}</td>
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
                <td>{{ $dec_appt->full_name }}</td>
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
                <td>{{ $can_appt->full_name }}</td>
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

@include('partials.pt_footer')
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
    $('#apptsTbl').DataTable();
    $('#acc_apptsTbl').DataTable();
    $('#dec_apptsTbl').DataTable();
    $('#can_apptsTbl').DataTable();
  });
</script>
</body>
</html>
