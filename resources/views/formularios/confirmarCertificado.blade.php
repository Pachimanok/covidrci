<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tabla.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        if (history.forward(1)) {
            history.replace(history.forward(1));
        }
    </script>
</head>

<body onload="nobackbutton();">
    <div class="container">
        @include('layouts.barra')
        <div class="card p-5">
            <h1>Confirmar datos:</h1>
            <p class="text-left">Por favor revisar que los siguientes datos estén correctos: </p>
            <div class="row mb-4">
                <h4>Vigencia: <strong> {{ $fecha_emision }} - {{ $fecha_final }}</strong></h4>
            </div>
            <div class="row row-cols-4">
                @foreach ($asegurados as $asegurado)
                    @if ($asegurado->orden == '1')
                        <div class="col-sm-4">
                            <div class="card" style="width: auto;">
                                <div class="card-header">
                                    <div class="card-title">Tomador:</div>
                                </div>
                                <div class="card-body">
                                    Nombre: {{ $asegurado->nombre }} <br>
                                    Domicilo: {{ $asegurado->domicilio }}<br>
                                    Localidad: {{ $asegurado->localidad }}<br>
                                    Rut: {{ $asegurado->doc_numero }}<br>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4">
                            <div class="card" style="width: auto;">
                                <div class="card-header">
                                    <div class="card-title">Acompañante:</div>
                                </div>
                                <div class="card-body">
                                    Acompañante: {{ $asegurado->nombre }} <br>
                                    Domicilo: {{ $asegurado->domicilio }}<br>
                                    Localidad: {{ $asegurado->localidad }}<br>
                                    Rut: {{ $asegurado->doc_numero }}<br>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row">
                <div class="col-sm-5 text-center mx-auto">
                    <h3 class="text-success">Total a Cobrar: USD {{ number_format($pagar, 2) }}</h3>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-8 mx-auto text-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <form action="certificado/{{ $id_cer }}" method="post">
                            @method('put')
                            @csrf
                            <button type="submit" class="btn btn-lg btn-primary" style="width: 13rem;">Emitir
                                Certificado</button>
                        </form>
                        <form action="certificado/{{ $id_cer }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button href="/certificado/{{ $id_cer }}"
                                onclick="return confirm('¿Está seguro? Se eliminaran todos los datos deberá volver a cargarlos')"
                                class="btn btn-danger btn-lg" style="margin-left: 1rem; width: 13rem;">No
                                emitir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
