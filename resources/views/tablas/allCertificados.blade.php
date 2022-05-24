<div class="row">
    <div class="form-group pull-right">
        <input type="text" class="search form-control" placeholder="Buscar">
    </div>
    <span class="counter pull-right"></span>
    <table class="table table-hover table-bordered results">
      <thead>
        <tr>
          <th>#</th>
          <th class="col-md-3 col-xs-3">Nombre</th>
          <th class="col-md-3 col-xs-3">Documento</th>
          <th class="col-md-3 col-xs-3">vigencia</th>
          <th class="col-md-2 col-xs-2">Total</th>
          @if( $user->role == 'Admin')<th>User</th>@endif
          <th class="col-md-2 col-xs-2">acciones</th>

        </tr>
        <tr class="warning no-result">
          <td colspan="4"><i class="fa fa-warning"></i> Sin Resultados</td>
        </tr>
      </thead>
      <tbody>
          @foreach($certficados as $certficado)
                <tr>
                    <th scope="row">{{ $certficado->id }}</th>
                    <td width="25%">{{ $certficado->nombre }}</td>
                    <td width="25%">{{ $certficado->doc_numero }}</td>
                    <td width="25%">{{ $certficado->fecha_emision }} - {{ $certficado->fecha_final }}</td>
                    <td>USD {{ $certficado->costo }}</td>
                    @if($user->role == 'Admin')<td>{{ $certficado->user }}</td>@endif

                    <td>
                        <div class="btn-group btn-group-sm" role="group" >
                            <a href="https://rail.ar/covidrci/public/certificados/{{$certficado->archivo}}" download="{{ $certficado->archivo }}" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                              </svg></a>
                            
                        </div>
                    </td>
                </tr>
            @endforeach
       
      </tbody>
    </table>
</div>