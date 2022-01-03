@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <div class="row mt-4">
        <div class="col-sm-7 text-left">
            <h2>Transferencias para Emitir</h2>
        </div>
        <div class="row">
          @if($alerta == 'si')
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Transferencias emitidas correctamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
      </div>
        <div class="row">
            @if($certificados->count() === 0)
              <div class="card">
                <p class="text-center mt-3">No ha transferencias Pendientes</p>
              </div>
            @else
              <div class="form-group pull-right">
                <input type="text" class="search form-control" placeholder="Buscar">
            </div>
            <span class="counter pull-right"></span>
            <table class="table table-hover table-bordered results">
              <thead>
                <tr>
                  <th>#</th>
                  <th class="col-md-3 col-xs-3">usuario</th>
                  <th class="col-md-3 col-xs-3">Monto</th>        
                </tr>
                <tr class="warning no-result">
                  <td colspan="4"><i class="fa fa-warning"></i> Sin Resultados</td>
                </tr>
              </thead>
              <tbody>
                 {{$certificados->count()}}
                  
                  @foreach($certificados as $certificado)
                  
                  
                        <tr>
                            <th scope="row">{{ $certificado->id }}</th>
                            <td width="75%">{{ $certificado->user }}</td>
                            <td width="25%" class="text-center">USD {{ number_format($certificado->costo * 0.8 ,2)}}</td>
                            
                        </tr>
                    @endforeach
               
              </tbody>
            </table>
            @endif
          </div>
          @if($certificados->count() > 0)
            <form action="/transferencias" method="post">
            @csrf
            <div class="row mt-5">
              <div class="col-sm-5 mx-auto text-center">
                <button class="btn btn-primary" type="submit" >Emitir todas las Transferencia</button>
              </div>
            </div>
            </form>
            @endif

    </div>
  
</div><!-- Container -->
