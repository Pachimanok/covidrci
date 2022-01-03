@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <form action="/transferencias/{{ $id }}" method="post">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <h2>Transferencia # {{ $id }}</h2>
            </div>
            <div class="col-sm-2 text-center">
                <select name="estado[]" class="form-control">
                    @if ($transferencias->estado == 'emitida')
                        <option value="emitida">emitida</option>
                        <option value="pagada">pagada</option>
                    @else
                        <option value="pagada">pagada</option>
                        <option value="emitida">emitida</option>
                    @endif
                </select>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary" type="submit">Cambiar</button>
            </div>
        </div>
      </form>



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
                        <td width="25%">USD {{ number_format($certficado->costo, 2) }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>



</div>
