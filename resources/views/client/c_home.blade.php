<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<body>
    @include('partials.header')
    <div class="row">
        <div class="col-12" style="padding: 0px;">
            <img alt="" src="{{ asset('images/logo.jpg') }}" style="flex-shrink: 0; width: 100%;"/>
        </div>
        <div class="col-12" style="margin-top: -25rem;">
            <b style="font-size: 4rem; font-weight: 900; color: white; margin-left: 2rem;">Alan Turing</b>
            <br><b style="font-size: 1.5rem; font-weight: 55; color: white; margin-left: 2rem;">Mathematician and computer scientist</b>
        </div>
    </div>
</body>
</html>