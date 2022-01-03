@include('layouts.header')
<div class="container">
    @include('layouts.barra')
    <div class="row">
        <div class="col-sm-3 text-left">
            <h2>Certificados</h2>
        </div>
        <div class="col-sm-9 " style="text-align:right;">           
                @if(Auth::user()->activo == 'si')
                <a href="/certificado/create" class="btn btn-success"> + Certificado</a>
            @else
                <a href="#" class="btn btn-secondary" style="pointer-events: none;"> + Certificado</a><br>
                <span class="badge badge-light text-danger" >Para emitir certificado debe regularizar cuenta corriente.</span>
            @endif
          
            
        </div>
    </div>
    @include('tablas.allCertificados')
</div><!-- Container -->
