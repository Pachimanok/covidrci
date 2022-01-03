@include('layouts.header')
<div class="container">
    @include('admin.barra')
    <style>
        .tableAsegurado {
            width: 33%;
        }
    </style>
    <div class="row">
        <div class="col-sm-3 text-left">
            <h2>Usuario: {{ $user->name }}</h2>
        </div>
        <div class="card bg-light pt-4">
            <form action="/usuarios/{{ $user->id }}" method="post">
                @method('put')
                @csrf
                <div class="col-sm-9">
                    <table class="table table-stripped">
                        <tbody>
                            <tr>
                                <td class="tableAsegurado"><label for="nombre">Nombre </label></td>
                                <td>
                                    <h5>{{ $user->name }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tableAsegurado"><label for="nombre">Email </label></td>
                                <td>
                                    <h5>{{ $user->email }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tableAsegurado"><label for="nombre">Role </label></td>
                                <td><select name="role[]" class="form-control">
                                        @if ($user->role == 'Admin')
                                            <option value="Admin">Admin</option>
                                            <option value="Vendedor">Vendedor</option>
                                        @else
                                            <option value="Vendedor">Vendedor</option>
                                            <option value="Admin">Admin</option>
                                        @endif
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tableAsegurado"><label for="nombre">Activo </label></td>
                                <td><select name="activo[]" class="form-control">
                                        @if ($user->activo == 'si')
                                            <option value="si">si</option>
                                            <option value="no">no</option>
                                        @else
                                            <option value="no">no</option>
                                            <option value="si">si</option>
                                        @endif
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tableAsegurado"><label for="nombre">Alta </label></td>
                                <td>
                                    <h5>{{ $user->created_at }}</h5>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <div class="row">
                    <div class="col-sm-5 mx-auto text-center m-5">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <h3 class="mt-3 mb-2">Todas las transfencias.</h3>
    @foreach ($transferencias as $transferencia)
    <div class="card @if($transferencia->estado == 'emitida')alert-danger @else alert-success @endif p-2 m-3">
        <h5>Transferencia pendiente emitida: <strong>{{$transferencia->fecha}}</strong></h5>   
        <p>USD: {{number_format($transferencia->monto,2)}}.00 - CLP {{number_format($transferencia->monto * $transferencia->tipo_cambio_usd,2)}}</p>
        <div class="row">
            <div class="col-sm-3 d-grid gap-2">
                <a href="transferencias/{{$transferencia->id_transferencia}}" class="btn @if($transferencia->estado == 'emitida')btn-danger @else btn-success @endif">Detalle</a>
            </div>
        </div>
    </div>
    @endforeach
</div><!-- Container -->
