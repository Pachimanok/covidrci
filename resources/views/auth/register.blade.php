<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RCI Covid-19 :: Register</title>
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
        <div class="col-md-6">
            <div class="card" style="border:none;">
                <div class="card-header" style="background:#1156a5;border: 0px;"><h3 class="text-white text-center mb-0">¡Bienvenido Registrese!</h3></div>
                <div class="card-body" style="background:#1156a5;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-center text-white">{{ __('Usuario') }}</label>
                            <div class="col-md-6">
                                <input id="name" placeholder="Coloque el mismo que RCI" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="email" class="col-md-4 col-form-label text-md-center text-white">{{ __('Correo Electronico') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Coloque el mismo que RCI" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="password" class="col-md-4 col-form-label text-md-center text-white">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" placeholder="Coloque la misma que RCI" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-center text-white">{{ __('Repetir Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Repetir contraseña"type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-6 offset-md-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="d-grid gap-2 mt-2">
                                    <a href="{{ route('login') }}" class="btn btn-outline-light  text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>