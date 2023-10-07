<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('styles.css') }}?version=11">
    <style>
        .center {
            margin: auto;
            width: 50%;
        }
        .adjust-top{
            margin-top: -0.7rem;
        } 
        .center-center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 1rem 1rem 1rem 1.5rem;
            width: 50%
        }

        .logo, img{
            width: 100%
        }

        @media only screen and (max-width: 768px) {
            .center-center{
                position:static;
                top: 0%;
                left: 0%;
                transform: translate(0%, 0%);
                padding: 1rem;
                width: 100%;
            }
            .logo, img{
                width: 50%
            }
        }
    </style>
</head>
<body style="background-color: #28282B;">
    <div class="container center-center" style="background-color: white; border-radius: 1.5rem;">
        <div class="row " >
            <div class="col-6" style="display: grid; place-items: center; border-radius: 1.5rem; background-color: #28282B" >
                <!-- <div style="background-image: url('/images/logo.jpg');
                    background-repeat: no-repeat;
                    background-attachment: fixed;  
                    background-size: fit;">
                </div> -->
                <img alt="" class="logo" style="border-radius: 1.5rem; " src="{{ asset('images/logo.jpg') }}" />
            </div>
            
            <div class="col-6">
                <div class="col-12 adjust-top">
                    <h3 style="font-size: 2.5rem; color: black"><center><b>Login Account</b></center></h3>
                    <center><p style="font-size: 1.5rem; color: black">A&T Fitness Center</p></center>
                </div>
                <div class="col-12 adjust-top">
                    <label for="inputFname" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="inputFname" aria-describedby="emailHelp">
                </div>
                <div class="col-12 adjust-top">
                    <label for="inputFname" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputFname" aria-describedby="passwordHelp">
                </div>
                <div class="col-12">
                <button type="button" class="btn btn-primary" style="padding: .25rem; font-size: 1rem; background-color: black; color: white; border: solid black; float: right; width: 8rem"> Login </button>
                </div>
            </div>
            
        </div>
    </div>
    
    
</body>
</html>