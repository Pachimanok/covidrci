<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RCI Covid-19 :: Login</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tabla.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body  style="background:#1156a5;">
<div class="container" style="background:#1156a5; margin-top:15%;">
    
    <div class="row justify-content-center">
        <div class="col-sm-6" style="    border-right: 1px;
        border-left: 0px;
        border-bottom: 0px;
        border-top: 0px;
        border-style: solid;
        border-color: white;">
            <div class="col-sm-7 mx-auto">
                <img src="{{ asset('img/covid-19.png') }}" class="img-fluid" alt="">

            </div>
        </div>
        <div class="col-md-6" >
            
            @if (Route::has('login'))
            @auth
            <div class="row mt-5" >
                <div class="col-sm-5 mx-auto mt-5">
                    <div class="d-grid gap-2">
                        <a href="{{ url('/home') }}" class="btn btn-light  text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    </div>
                </div>
            @else
            <div class="col-sm-5 mx-auto">
                <div class="d-grid gap-2 mt-5">
                    <a href="{{ route('login') }}" class="btn btn-light  text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 mx-auto mt-4">
                    <div class="d-grid gap-2">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light  ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    </div>
                </div>
            </div>
                    @endauth
                </div>
            @endif
    </div>
</div>

{{-- Script Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>