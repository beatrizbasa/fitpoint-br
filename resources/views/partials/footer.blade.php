<!-- Footer -->
<link rel="stylesheet" href="{{ asset('styles.css') }}?version=14">
<style>
    li a{
        font-size: medium !important;
    }
    .qck:hover{
        text-decoration: underline !important;
        cursor: pointer !important;
    }

    .srvc:hover{
        text-decoration: none !important;
        cursor: default !important;
    }
    
</style>
<div class="w3-container w3-black w3-opacity  ">
<div class="row">
        <div class="col-6 foot" style=" padding: 3rem">
            <div class="col-12">
                <b style="float: left; font-size: xx-large">About</b>
            </div>
            <div class="col-12">
                <p style="font-size: medium">
                    A&T Fitness Center is located at <b>3rd Floor A&T Building, Zone 3, Pedro T Orata, Urdaneta City, Pangasinan</b>. Owned by <b>Jan Raemel Cabrillas</b>, he thought to make getting fit be accessible to anyone. It is a fitness center with decked out with gym equipment suited for anyone's needs.

                </p>
            </div>
        </div>
        <div class="col-3 foot" style=" padding: 3rem">
            <div class="col-12">
                <b style="float: left; font-size: xx-large">Services</b>
            </div>
            <div class="col-12">
                <ul style="list-style-type: none; padding: 0rem; text-decoration: none; cursor: none">
                    <li><a class="srvc" href="">Personal Trainer</a></li>   
                    <li><a class="srvc" href="">Boxing Training</a></li>
                    <li><a class="srvc" href="">Zumba Classes</a></li>
                </ul>
            </div>
        </div>
        <div class="col-3 foot" style=" padding: 3rem">
            <div class="col-12">
                <b style="float: left; font-size: xx-large">Quick links</b>
            </div>
            <div class="col-12">
                <ul style="list-style-type: none; padding: 0rem;">
                    <li><a class="qck" href="{{ route('about') }}">About Us</a></li>   
                    <li><a class="qck" href="{{ route('client.login_form') }}">Login</a></li>
                    <li><a class="qck" href="">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <hr style="width: 100%; margin: 0rem">
        <div class="col-12" style=" width: 100%; padding-left: 3rem">
            <h1>Copyright © 2023 All Rights Reserved by DigiBuild</h1>
        </div>
    </div>
</div>

<!-- <footer class="w3-container w3-opacity">  
    <div class="row">
        <div class="col-4 foot" style="background-color: red; padding: 4rem">
            <div class="col-12">
                <b style="float: left; font-size: xx-large">About</b>
            </div>
            <div class="col-12" >
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
        <div class="col-4 foot" style="background-color: blue; padding: 1rem">

        </div>
        <div class="col-4 foot" style="background-color: pink; padding: 1rem">

        </div>
        <div class="col-12" style="background-color: black; width: 100%">

        </div>
    </div>
</footer> -->