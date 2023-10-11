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
  .navvv:hover{
    background-color: red !important;
    color: white !important;
    text-decoration: none !important;
  }

  /* img:hover{
    background-color: transparent !important;
  } */
</style>

<div class="w3-top">
  <div class="w3-bar w3-card w3-left-align w3-large navs">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item"><img alt="" class="" style="height: 3rem;" src="{{ asset('images/logo.jpg') }}" /></a>
    <!-- <a href="#home" style="margin: 0%;"></a> -->
    <a href="#" class="w3-bar-item w3-hide-small w3-padding-large navvv">Home</a>
    <a href="#" class="w3-bar-item w3-hide-small w3-padding-large navvv">About Us</a>
    <a href="#" class="w3-bar-item w3-hide-small w3-padding-large navvv">Login</a>
    <a href="#" class="w3-bar-item w3-hide-small w3-padding-large navvv">Contact Us</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">About</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Login</a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">Contact Us</a>
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
</script>