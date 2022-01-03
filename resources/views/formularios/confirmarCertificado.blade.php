@include('layouts.header')
<div class="container">
    @include('layouts.barra')
    <div class="card p-5">
        <h1>Confirmar datos:</h1>
        <p class="text-left">Por favor revisar que los siguientes datos estén correctos: </p>
        <div class="row mb-4">
            <h4>Vigencia: <strong> {{$fecha_emision}} - {{ $fecha_final}}</strong></h4>
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
                <h3 class="text-success">Total a Cobrar: USD {{number_format($pagar,2)}}    </h3>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-6 mx-auto text-center">
                <form action="certificado/{{ $id_cer}}" method="post">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn btn-lg btn-primary">Emitir Certificado</button>
                
                <button class="btn btn-lg btn-danger">No emitir</button>
                </form>
            </div>
           
        </div>
    </div>

</div>
