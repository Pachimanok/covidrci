@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <div class="row mt-4">
    <h2>Transferencias</h2>
</div>
    <div class="card p-2 bg-light">
       <p> Una vez realizada una transfencia, puede demorar hasta <strong> 72 horas </strong> hasta actualizarse en el sistema. Se muestran las últimas 10 transferencias realizadas. </p>
    </div>
    <h3 class="mt-3 mb-2">Todas las transfencias.</h3>
    @foreach ($transferencias as $transferencia)
    <div class="card @if($transferencia->estado == 'emitida')alert-danger @else alert-success @endif p-2 m-3">
        <h5>Transferencia pendiente emitida: <strong>{{$transferencia->fecha}}</strong> </h5>   
        <h6 class="text-uppercase">User: {{$transferencia->user}}</h6>
        <p>USD: {{number_format($transferencia->monto,2)}} - CLP {{number_format($transferencia->monto * $transferencia->tipo_cambio_usd,2)}}</p>
        <div class="row">
            <div class="col-sm-3 d-grid gap-2">
                <a href="/covidrci/public/transferencias/{{$transferencia->id_transferencia}}/edit" class="btn @if($transferencia->estado == 'emitida')btn-danger @else btn-success @endif">Editar</a>
            </div>
        </div>
    </div>
    @endforeach
</div>