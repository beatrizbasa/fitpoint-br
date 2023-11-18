<!DOCTYPE html>
<html lang="en">
<head>
    <title>Clients List</title>
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
          <h3 style="font-size:xx-large; ">Current Clients</h3>
          <p class="w3-text-grey">Below is a list of all your current clients.</p>
      </div>
      <div class="col-12" style="overflow-x:auto;">
        <table id="apptsTbl" class="display">
          <thead>
            <tr>
                <th>Client Name</th>
                <th>Address</th>
                <th>Contact no.</th>
                <th>Birthday</th>
                <th>Gender</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->client_firstname }} {{ $client->client_lastname }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->contact_no }}</td>
                <td>{{ $client->birthday }}</td>
                <td>{{ $client->gender }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <hr style="border: 2px solid black" width="100%">

  <!-- Second Grid -->
  <div class=" " style="margin-top: 0rem;">
    <div class="row mobile"  style="padding: 2rem 15rem 2rem 15rem;">
      <div class="col-12">
        <h3 style="font-size:xx-large; ">Former Clients</h3>
        <h5 style="padding: 2rem 0rem 2rem 0rem;">Below is a list of all your former clients.</h5>
      </div>
      <div class="col-12" style="overflow-x:auto;">
        <table id="frmerTbl" class="display">
          <thead>
            <tr>
                <th>Client Name</th>
                <th>Address</th>
                <th>Contact no.</th>
                <th>Birthday</th>
                <th>Gender</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->client_firstname }} {{ $client->client_lastname }}</td>
                <td>{{ $client->address }}</td>
                <td>{{ $client->contact_no }}</td>
                <td>{{ $client->birthday }}</td>
                <td>{{ $client->gender }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
  $(document).ready(function() {
    $('#apptsTbl').DataTable();
    $('#acc_apptsTbl').DataTable();
    $('#frmerTbl').DataTable();
  });
</script>
</body>
</html>
