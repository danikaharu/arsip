<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            background-image: url('img/tes.jpg');
            height: 500px; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-size: cover; 
            opacity: 0.8;
        }

    </style>
</head>
<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                <div class="">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Log in</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                    @endif
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row justify-content-center px-4">
            <div class="col-md-12 col-lg-9">
               
            </div>
        </div>
    </div>
</body>
</html>



