@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <div class="row mt-4">
        <h2>Certificados Emitidos</h2>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4 m-2">
            <h5 class="mt-3 mb-2">Certificados emitidos esta semana.</h5>
            <div class="row">
                <table class="table table-hover table-bordered results">
                    <thead>
                        <tr>
                            <th class="col-md-6">Usuario</th>
                            <th class="col-md-2 text-center">Cantidad</th>
                        </tr>
        
                    </thead>
                    <tbody>
                        @foreach ($trasferenciasSemana as $ts)
                            <tr>
                                <th >{{ $ts->user }}</th>
                                <td class="text-center">{{ $ts->count }}</td>
                            </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-4 m-2">
            <h5 class="mt-3 mb-2">Todos los Certificados Emitidos.</h5>
            <div class="row ">
                <table class="table table-hover table-bordered results">
                    <thead>
                        <tr>
                            <th class="col-md-6">Usuario</th>
                            <th class="col-md-2 text-center">Cantidad</th>
                        </tr>
        
                    </thead>
                    <tbody>
                        @foreach ($trasferenciasTodas as $tt)
                            <tr>
                                <th >{{ $tt->user }}</th>
                                <td class="text-center">{{ $tt->count }}</td>
                            </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    
</div>
