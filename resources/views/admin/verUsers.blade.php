@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <div class="row mt-4">
        <div class="col-sm-3 text-left">
            <h2>Usuarios</h2>
        </div>
        <div class="row">
          @if($alerta == 'si')
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Se modifico el usuario correctamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
      </div>
      
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
                  <th class="col-md-3 col-xs-3">Email</th>
                  <th class="col-md-3 col-xs-3">Rol</th>
                  <th class="col-xs-1 col-xs-1">Activo</th>
                  <th class="col-md-3 col-xs-3">Alta</th>
                  <th class="col-md-2 col-xs-2">Acciones</th>
        
                </tr>
                <tr class="warning no-result">
                  <td colspan="4"><i class="fa fa-warning"></i> Sin Resultados</td>
                </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td width="25%">{{ $user->name }}</td>
                            <td width="25%">{{ $user->email }}</td>
                            <td width="10%">{{ $user->role }}</td>
                            <td width="5%">{{ $user->activo }}</td>
                            <td width="10%">{{ $user->created_at }}</td>        
                            <td>
                                <div class="btn-group btn-group-sm" role="group" >
                                    
                                    <a href="/covidrci/public/usuarios/{{$user->id}}/edit" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                      </svg>
                                    </a>
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach
               
              </tbody>
            </table>
        </div>
    </div>
  
</div><!-- Container -->
