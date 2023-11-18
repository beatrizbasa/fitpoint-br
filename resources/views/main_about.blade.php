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
@include('partials.header')

<!-- First Grid -->
<div class="w3-container">

  <div class="w3-padding-64" style="margin-top: 2rem">
    <div class="row mobile" style="padding: 0rem 15rem 0rem 15rem;">
      <div class="col-12">
        <b style="font-size: xx-large; ">Welcome to A&T Fitness Center!</b>
        <p>
            <br>
            <p style="font-size: medium;">
                At A&T Fitness Center, we believe that a healthy lifestyle is the key to a happy and fulfilling life. Our state-of-the-art fitness facility is more than just a gym; it's a community where individuals come together to achieve their fitness goals and support each other on their wellness journey.
            </p>

            <p style="font-size: medium;">
                <br><b style="font-size: x-large">Our Mission</b>
                <p>
                    Empowering individuals to lead healthier lives by providing a welcoming and inclusive fitness environment. We are committed to promoting physical well-being, mental health, and overall happiness through exercise and community engagement.
                </p>
            </p>
            <p>
                <br><b style="font-size: x-large;">Our Values</b>
                <ul>
                    <li>
                        <b>Inclusivity:</b> We welcome individuals of all fitness levels, ages, and backgrounds. Our diverse community is what makes us strong. 
                    </li>
                    <li>
                        <b>Excellence:</b> We strive for excellence in everything we do, from the quality of our equipment to the expertise of our trainers.                        
                    </li>
                    <li>
                        <b>Community:</b>Community: We believe that fitness is more enjoyable and sustainable when shared with others. Our gym is a place to connect, motivate, and inspire.
                    </li>
                </ul>
            </p>

            <p>
                <br><b style="font-size: x-large">Meet the Team</b>
                <ul>
                    <li><b>Jan Raemel Cabrillas</b></li>
                    Passionate about fitness and dedicated to creating a positive impact on the community, Jan Raemel founded A&T Fitness Center with the vision of making fitness accessible to everyone.
                </ul>
                <br><b style="font-size: large">Our Trainers</b>
                <p>
                    Our team of certified trainers is committed to helping you reach your fitness goals. With diverse expertise in various fitness disciplines, they are here to guide, motivate, and support you on your journey.
                </p>
                <ul>
                    <li><b>Mariano "Yano" Campos</b></li>
                    With a passion for helping individuals surpass their fitness goals, Yano Campos brings an unparalleled level of energy, expertise, and personalized attention to every training session. 
                    <p><b>His expertise include:</b>
                        <ul>
                            <li>Bodybuilding</li>
                            <li>One-on-one personal training</li>
                            <li>Weight loss</li>
                            <li>Mass gaining</li>
                        </ul>
                    </p>

                    <li><b>Mandy Castro</b></li>
                    Mandy is not just a personal trainer; he is your committed partner on your journey to a healthier lifestyle. Mandy brings a wealth of knowledge and expertise to our gym, ensuring that each workout is not just a routine but a carefully crafted experience tailored to your unique needs.
                    <p><b>His expertise include:</b>
                        <ul>
                            <li>Bodybuilding</li>
                            <li>One-on-one personal training</li>
                            <li>Group exercises</li>
                            <li>Weight loss</li>
                            <li>Mass gaining</li>
                        </ul>
                    </p>

                    <li><b>Dan Cayetano</b></li>
                    Dan is not just a fitness professional; he is your confidant on this wellness adventure. His dedication extends beyond the gym floor, as he is committed to providing ongoing support and encouragement, ensuring that you stay on track even outside our gym walls.
                    <p><b>His expertise include:</b>
                        <ul>
                            <li>Bodybuilding</li>
                            <li>One-on-one personal training</li>
                            <li>Group exercises</li>
                            <li>Weight loss</li>
                            <li>Mass gaining</li>
                        </ul>
                    </p>
                </ul>
            </p>
            
            <p>
                <br><b style="font-size: x-large">Services</b>
                <p>From updated workout equipment to a spacious exercise space, A&T Fitness Center offers a variety of amenities to enhance your fitness experience.</p>
                <ul>
                    <li><b>Personal Training</b></li>
                    Passionate about fitness and dedicated to creating a positive impact on the community, [Founder/Owner Name] founded [Gym Name] with the vision of making fitness accessible to everyone.
                    <li><b>Boxing Training</b></li>
                    Passionate about fitness and dedicated to creating a positive impact on the community, [Founder/Owner Name] founded [Gym Name] with the vision of making fitness accessible to everyone.
                    <li><b>Zumba Classes</b></li>
                    Passionate about fitness and dedicated to creating a positive impact on the community, [Founder/Owner Name] founded [Gym Name] with the vision of making fitness accessible to everyone.
                </ul>
            </p>
            
            <p>
                <br><b style="font-size: x-large">Join Our Community</b>
                <p>Whether you're a seasoned athlete or a beginner taking the first steps on your fitness journey, [Gym Name] is the place for you. Join our community and let's achieve greatness together!</p>
            </p>
            
            <a class="link-buttons" href="{{ route('client.login_form') }}">Join us now!</a>
        </p>
      </div>
    </div>
  </div>

  <hr style="border: 2px solid black" width="100%">

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
