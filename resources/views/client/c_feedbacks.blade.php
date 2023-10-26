<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedbacks</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7528702e77.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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

      .modal-content{
        height:35% !important;
        margin:5% auto !important;
        max-height: 57em !important;
        max-width:66em !important;
        width:85% !important;
        }
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        height: 40%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover, .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

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
            <h3 style="font-size:xx-large; ">Feedbacks</h3>
            <p class="w3-text-grey">Send a feedback to your booked personal trainer!</p>
            <!-- <a class="link-buttons" href="">Send a feedback</a> -->
            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

            <!-- Modal -->
            <button id="myBtn" class="form-buttons">Submit a feedback</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p>Feedback</p>
                    <form id="modalForm" action="post">
                        @csrf
                        <label for="inputfeedback" class="form-label">Content</label>
                        <textarea name="content" id="feedback_inp" class="form-control" required></textarea>
                        <input type="number" name="personal_trainer_id">PT id
                        <input type="number" name="client_id" value="{{ Auth::guard('client')->user()->id}}">
                        <br><button type="submit" onclick="getData()" data-dismiss="modal" name="submit_fback" class="form-buttons" style="float: right;">Submit feedback</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-4" >
                    <div style="background: black;">
                    <img alt="" class="" style="flex-shrink: 0; width: 100%;" src="{{ asset('images/personal-trainer.png') }}" />
                    <center style="padding-top: 0.5rem; padding-bottom: 0.5rem; color: white">Personal Trainer Name 1</center>
                    </div>
                </div> 
                <div class="col-4" >
                    <div style="background: black;">
                    <img alt="" class="" style="flex-shrink: 0; width: 100%;" src="{{ asset('images/personal-trainer.png') }}" />
                    <center style="padding-top: 0.5rem; padding-bottom: 0.5rem; color: white">Personal Trainer Name 2</center>
                    </div>
                </div> 
                <div class="col-4" >
                    <div style="background: black;">
                    <img alt="" class="" style="flex-shrink: 0; width: 100%;" src="{{ asset('images/personal-trainer.png') }}" />
                    <center style="padding-top: 0.5rem; padding-bottom: 0.5rem; color: white">Personal Trainer Name 3</center>
                    </div>
                </div>  -->
                <br>
                <div class="col-12" style="overflow-x:auto;">
                    <table id="feedbackTbl" class="display">
                    <thead>
                        <tr>
                            <th>Feedback</th>
                            <th>Client Name</th>
                            <th>Personal Trainer Name</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                        <tr>
                            <td>{{ $feedback->content }}</td>
                            <td>{{ $feedback->client_id }}</td>
                            <td>{{ $feedback->fullname }}</td>
                            <td>{{ $feedback->created_at }}</td>
                            <td>
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash"></i>
                            </td>
                        </tr>
                        @endforeach
                        </form>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>

  

  </div>
<!-- <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div> -->

@include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#feedbackTbl').DataTable();
        });

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }

        function getData() {
            var inputText = document.getElementById("feedback_inp").value;
            if (inputText == ''){
                alert("Enter feedback.");
            }
            else{
                console.log(inputText); // This will log the input data to the console. You can handle it however you like.
            }
        }

        $(document).ready(function(){
            $("#modalForm").submit(function(e) {
                e.preventDefault();
                var url = "{{ route('client.insert_feedbacks') }}";
                let formData = $(this).serialize();

                $.ajax({
                    type: "POST",
                    url: url,  // update the URL as per your route
                    data: formData,
                    success: function(response) {
                        alert(response.message);
                        window.location.reload();
                        // Refresh the page or update a data list/table if needed
                    },
                    error: function(error) {
                        alert("Error saving data");
                    }
                });
            });
        });

        document.querySelector('input[name=submit_fback]').addEventListener('click', function(e) {
        e.preventDefault();

        window.location.reload();
    });

    
    </script>
</body>
</html>
