@include('layouts.header')
<div class="container">
    @include('layouts.barra')
    <h2>Transferencia # {{ $id }}</h2>
   
    <h3 class="mt-3 mb-2">Certidicados incluidos en la transferencia:</h3>
    
    <table class="table table-hover table-bordered results">
        <thead>
          <tr>
            <th>#</th>
            <th class="col-md-3 col-xs-3">Tipo</th>
            <th class="col-md-3 col-xs-3">ID Asegurado</th>
            <th class="col-md-3 col-xs-3">Fecha</th>
            <th class="col-md-2 col-xs-2">Total</th>
          </tr>
          <tr class="warning no-result">
            <td colspan="4"><i class="fa fa-warning"></i> No result</td>
          </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certficado)
            <tr>
                <th scope="row">{{ $certficado->id }}</th>
                <td width="25%">Cerfitificado COVID</td>
                <td width="25%">{{ $certficado->id_asegurado }}</td>
                <td width="25%">{{ $certficado->created_at }}</td>
                <td width="25%">USD {{ number_format($certficado->costo * 0.8 ,2)  }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



</div>