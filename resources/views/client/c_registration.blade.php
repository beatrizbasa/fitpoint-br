<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}?version=15">
    <style>
        .center {
            margin: auto;
            width: 50%;
        }
        .adjust-top{
            margin-top: -1rem;
        } 
        .center-center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 1rem 1rem 1rem 1.5rem;
            width: 70%;
            height: 100%;
        }

        @media only screen and (max-width: 768px) {
            .center-center{
                position: static;
                top: 0%;
                left: 0%;
                transform: translate(0%, 0%);
                padding: 1rem;
                width: 100%;
            }
        }
    </style>
</head>
<body style="background-color: #28282B;">
    <div class="container center-center" style="background-color: white; ">
        <div class="row " >
            <div class="col-5" style="display: grid; place-items: center; border-radius: 1.5rem; background-color: #28282B; height: auto" >
                <!-- <div style="background-image: url('/images/logo.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;  
                    background-size: fit;">
                </div> -->
                <img alt="" class="" style="width: 100%; border-radius: 1.5rem; " src="{{ asset('images/logo.jpg') }}" />
            </div>
            

            <div class="col-7 adjust-top">
                <div class="col-12 adjust-top">
                    <b style="font-size: 2.5rem; color: black; font-size:xx-large"><center>Register Account</center></b>
                    <center><p style="font-size: 1.5rem; color: black">A&T Fitness Center</p></center>
                </div>
                <form action="{{ route('client.register_acc') }}" method="post"> 
                @csrf
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">First name</label>
                        <input type="text" name="firstname" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Last name</label>
                        <input type="text" name="lastname" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-12 adjust-top">
                        <label for="inputFname" class="form-label">Address</label>
                        <input type="text"name="address" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Contact no.</label>
                        <input type="number" name="contact" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Birthday</label>
                        <input type="date" name="birthday" class="form-control" id="inputFname" aria-describedby="emailHelp" style="padding: 0.3rem;">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Gender</label>
                        <!-- <input type="text" name="gender" class="form-control" id="inputFname" aria-describedby="emailHelp"> -->
                        <select name="gender" class="form-control">
                            <option val>-- select --</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputFname" aria-describedby="passwordHelp">
                    </div>
                    <div class="col-6 adjust-top">
                        <label for="inputFname" class="form-label">Confirm password</label>
                        <input type="password" name="conf_passw" class="form-control" id="inputFname" aria-describedby="emailHelp">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="form-buttons" style="float: right;"> Register </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    
    
</body>
</html>