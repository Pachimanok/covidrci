<div class="row">
    <div class="col-sm-12 mx-auto">
        <img src="{{ asset('img/COVID-19Logo.png') }}"     style="height:7rem;" alt="" class="img-fluid">

    </div>
</div>

<div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-1"
        style="border-color: #1b1b1d14;border-style: solid;border-width: 1px;border-radius: 6px;">
        <div class="container-fluid">
            <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/covidrci/public/home">Certificados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/covidrci/public/usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/covidrci/public/transferencias">Transferencias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/covidrci/public/transferencias/create">Crear Transeferencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/covidrci/public/export">Excel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/covidrci/public/estadisticas">Estadisticas</a>
                    </li>
                </ul>
               
                    <a class="btn btn-outline-success" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                    
            </div>
        </div>
    </nav>
</div>
