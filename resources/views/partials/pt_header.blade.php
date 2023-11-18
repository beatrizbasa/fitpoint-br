<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
body,h1,h2,h3,h4,h5,h6 {
  font-family: 'Open Sans', sans-serif !important;
}

  body, html {
    height: 100%;
    line-height: 1.8;
  }
  .navs, a{
    background-color: black !important;
    color: white;
    text-decoration: none;
    font-size: large !important;
  }

  .navvv:hover, .mini-nav:hover{
    background-color: red !important;
    color: white !important;
    text-decoration: none !important;
  }

  a.active{
    border-bottom: 5px solid red !important;
    /* color: red !; */
    font-weight: 900;
  }

  a {
    color: white !important;
  } 

  .drpdwn:hover{
    background-color: red !important;
    color: white !important;
    text-decoration: none !important;
  }

  .drpdwn{
    min-width: 180px !important;
  }
</style>

<div class="w3-top" style="padding: 0rem;">
  <div id="nav" class="w3-bar w3-card w3-left-align w3-large navs">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item"><img alt="" class="" style="height: 3rem;" src="{{ asset('images/logo.jpg') }}" /></a>
    <!-- <a href="#home" style="margin: 0%;"></a> -->
    <a href="{{ route('instructor.appointments') }}" class="w3-bar-item w3-hide-small w3-padding-large navvv {{ (\Request::route()->getName() == 'instructor.appointments') ? 'active' : '' }}">Appointments</a>
    <a href="{{ route('instructor.clients_list') }}" class="w3-bar-item w3-hide-small w3-padding-large navvv {{ (\Request::route()->getName() == 'instructor.clients_list') ? 'active' : '' }}">Clients List</a>
    <a href="{{ route('instructor.workout_plans') }}" class="w3-bar-item w3-hide-small w3-padding-large navvv {{ (\Request::route()->getName() == 'instructor.workout_plans') ? 'active' : '' }}">Workout Plan</a>
    <a href="{{ route('instructor.feedbacks') }}" class="w3-bar-item w3-hide-small w3-padding-large navvv {{ (\Request::route()->getName() == 'instructor.feedbacks') ? 'active' : '' }}">Feedbacks</a>
    <div class="w3-dropdown-hover w3-right drpdwn">
      <a href="#" class="w3-hide-small w3-button w3-padding-large navvv drpdwn {{ (\Request::route()->getName() == 'instructor.profile') ? 'active' : '' }}">{{ Auth::guard('instructor')->user()->firstname }} {{ Auth::guard('instructor')->user()->lastname }}</a>
      <div class="w3-dropdown-content w3-bar-block w3-border drpdwn">
        <a href="{{ route('instructor.profile') }}" class="w3-bar-item w3-button drpdwn ">View profile</a>
        <a href="{{ route('instructor.logout') }}" class="w3-bar-item w3-button drpdwn">Logout</a>
      </div>
    </div>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3- dropdown">
    <a href="{{ route('instructor.appointments') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Appointments</a>
    <a href="{{ route('instructor.clients_list') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Clients List</a>
    <a href="{{ route('instructor.workout_plans') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Workout Plan</a>
    <a href="{{ route('instructor.appointments') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Feedbacks</a>
    <a href="{{ route('instructor.profile') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Profile</a>
    <a href="{{ route('instructor.feedbacks') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Feedbacks</a>
    <a href="{{ route('instructor.logout') }}" class="w3-bar-item w3-button w3-padding-large mini-nav">Logout</a>
  </div>
</div>

<script src="
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

$(".list-group-item").click(function() {
  // Select all list items
  var listItems = $(".list-group-item");
    
  // Remove 'active' tag for all list items
  for (let i = 0; i < listItems.length; i++) {
      listItems[i].classList.remove("active");
  }
    
  // Add 'active' tag for currently selected item
  this.classList.add(" active");
});
</script>