<style>
  body,h1,h2,h3,h4,h5,h6 {
    font-family: Lato;
    font-size: 1.2rem
  }

  body, html {
    height: 100%;
    line-height: 1.8;
  }

  .w3-bar .w3-button {
    padding: 1.5vw 2vw 1.5vw 2vw;
  }

  a.active{
    background-color: #B6E0FF;
    color: black;
    font-weight: bold;
  }

  #overrides a:hover {
    background-color: red !important;
    color: white !important;
    font-weight: bold;
  }

  .navbar a:hover {
    background-color: #B6E0FF !important;
    color: black !important;
  }
</style>

<div class="w3-top" style="background-color: black">
  <div class="w3-bar w3-card" id="overrides">
    <a href="#home" style="margin: 0%;"><img alt="" style=" height: 4.5rem" src="{{ asset('images/logo.jpg') }}" /></a>
    <!-- Right-sided navbar links -->
    <div id="nav" class="w3-right w3-hide-small" style="color: white; ">
      <a href="" class="w3-bar-item w3-button {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
      <a href="" class="w3-bar-item w3-button {{ (request()->is('/')) ? 'active' : '' }}">About</a>
      <a href="" class="w3-bar-item w3-button {{ (request()->is('about')) ? 'active' : '' }}">Register</a>
      <!-- <a href="#pricing" class="w3-bar-item w3-button">Login</a> -->
      
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars" id="overrides" style="color: white"></i>
    </a>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
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