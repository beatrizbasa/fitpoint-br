<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Appointment Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('styles.css') }}?version=24">
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
        <h3 style="font-size:xx-large; ">Book Appointment</h3>
        <p class="w3-text-grey">Fill up appointment form.</p>
      </div>
      <div class="row " >
        <div class="col-12">
          <form id="apptForm" action="post">
            @csrf
            <div class="row">
              <p class="w3-text-black" style="font-size: large;"><b>Personal Information</b></p>
              <input name="client_id" type="hidden"  class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->id }}">
              <div class="col-4 adjust-top">
                <label for="inputFname" class="form-label">First name</label>
                <input name="fname_inp" type="text"  class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->firstname }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                <label for="inputFname" class="form-label">Last name</label>
                <input name="lname_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->lastname }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                <label for="inputFname" class="form-label">Gender</label>
                <input name="gender_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->gender }}" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-4 adjust-top">
                <label for="inputFname" class="form-label">Address</label>
                <input name="address_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->address }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Contact no.</label>
                  <input name="contact_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ Auth::guard('client')->user()->contact_no }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Birthday</label>
                  <input name="bday_inp" type="date" class="form-control" id="inputFname" aria-describedby="emailHelp"  value="{{ Auth::guard('client')->user()->birthday }}" readonly>
              </div>
              <input name="instructor_id" type="hidden"  class="form-control" id="inputFname" aria-describedby="emailHelp"  value="{{ $ptid }}">
            </div>
            <hr style="border: 2px solid black" width="100%">
            @foreach ($instructors as $instructor)
            <div class="row">
              <p class="w3-text-black" style="font-size: large;"><b>Personal Trainer Information</b></p>
              <div class="col-4 adjust-top">
                <label for="inputFname" class="form-label">Fullname</label>
                <input name="address_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $instructor->fullname }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Address</label>
                  <input name="contact_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $instructor->address }} }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Contact no.</label>
                  <input name="bday_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp"  value="{{ $instructor->contact_no }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Birthday</label>
                  <input name="contact_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp" value="{{ $instructor->birthday }}" readonly>
              </div>
              <div class="col-4 adjust-top">
                  <label for="inputFname" class="form-label">Gender</label>
                  <input name="bday_inp" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp"  value="{{ $instructor->gender }}" readonly>
              </div>
            </div>
            <hr style="border: 2px solid black" width="100%">
            <div class="row">
              <p class="w3-text-black" style="font-size: large;"><b>Appointment Information</b></p>
              <div class="col-3 adjust-top">
                <label for="inputFname" class="form-label">Medical condition</label>
                <input name="medical_condition" type="text" class="form-control" id="inputFname" aria-describedby="emailHelp">
              </div>
              <div class="col-3 adjust-top">
                <label for="inputFname" class="form-label">Target of workout</label>
                <!-- <input type="text" class="form-control" id="inputFname" aria-describedby="emailHelp"> -->
                <select name="target" class="form-control" >
                  <option>Select target of workout:</option>
                  <option value="bodybuilding">Bodybuilding</option>
                  <option value="powerlifting">Powerlifting</option>
                  <option value="cardio">Cardio</option>
                </select>
              </div>
              <div class="col-3 adjust-top">
                <label for="inputFname" class="form-label">Appointment date</label>
                <input name="appointment_date" type="date" class="form-control" id="inputFname" aria-describedby="emailHelp">
              </div>
              <div class="col-3 adjust-top">
                <label for="inputFname" class="form-label">Appointment time</label>
                <input name="appointment_time" type="time" class="form-control" id="inputFname" aria-describedby="emailHelp">
              </div>
            </div>
            @endforeach
            <div class="col-12">
              <button type="submit" class="form-buttons" style="float: right;">Submit appointment </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

@include('partials.c_footer')
<script>
  $(document).ready(function(){
    $("#apptForm").submit(function(e) {
        e.preventDefault();
        var url = "{{ route('client.insert_appointment') }}";
        var redirect = "{{ route('client.home') }}"
        let formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: url,  // update the URL as per your route
            data: formData,
            success: function(response) {
            //     // alert(response.message);
              window.location.href=redirect;
            //     // Refresh the page or update a data list/table if needed
            },
            error: function(error) {
                alert("Error saving data");
            }
        });
    });
});
</script>
</body>
</html>
