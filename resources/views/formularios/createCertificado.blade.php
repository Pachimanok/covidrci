@include('layouts.header')
<div class="container">
    @include('layouts.barra')
    <legend>Fecha de Cobertura</legend>
    <hr>
    <form action="/certificado" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-9">
        <table class="table table-stripped">
            <tbody>
                <tr>
                    <td><label for="nombre">Fecha Inicio Cobertura</label><input type="date" name="fecha_inicio"
                            class="form-control" required></td>
                    <td><label for="nombre">Fecha Finalizacion Cobertura</label><input type="date" name="fecha_final"
                            class="form-control" required></td>

                </tr>
            </tbody>
        </table>
    </div>
    <legend>Datos del Asegurado</legend>
    <hr>
    <div class="col-sm-9">
        <table class="table table-stripped">
            <tbody>
                <style>
                    .tableAsegurado {
                        width: 33%;
                    }

                </style>
                <tr>
                    <td class="tableAsegurado"><label for="nombre" >Nombre y Apellido</label></td>
                    <td><input type="text" name="tomador_nombre" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="nombre">RUT</label></td>
                    <td><input type="text" name="tomador_rut" placeholder="1122334455" maxlength="25"
                            class="form-control" required>
                        <span class="badge badge-light text-secondary" >Usar números sin puntos. Usar el guión para
                            RUT.</span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nombre" >Domicilio</label></td>
                    <td><input type="text" name="tomador_domicilio" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="nombre">Localidad:</label></td>
                    <td><input type="text" name="tomador_localidad" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="nombre">Pais:</label></td>
                    <td><input type="text" name="tomador_pais" class="form-control">
                        <span class="badge badge-light text-secondary">Indicar el país del pasaporte. Chile si es
                            RUT.</span>
                    </td>
                </tr>
                <tr>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <label for="altura" >Altura:</label>

                    </td>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <input type="number" name="asegurado_altura"  min="0" max="3" step=".01" class="form-control">
                        <span class="badge badge-light text-secondary">Separar con punto</span>
                    </td>
                </tr>
                <tr>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <label for="peso">Peso:</label>
                    </td>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <input type="number" min="0" max="200" name="asegurado_peso" class="form-control">
                        
                    </td>
                </tr>
                <tr>
                    <td class="p-1 pt-3">
                        <label for="archivo">PCR:</label>
                    </td>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <input type="file" name="asegurado_pcr" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td class="p-1 pt-3" style="width:4rem;">

                    </td>
                    <td class="p-1 pt-3" style="width:4rem;">

                    </td>
                </tr>
                <tr>
                    <td class="p-1">¿Toma medicamentos de manera habitual?:</td>
                    <td class="p-1 text-left"><input type="checkbox" name="asegurado_medicamentos[]" value="si" > Si | <input
                            type="checkbox" name="asegurado_medicamentos" value="no"> No</td>
                </tr>
                <tr>
                    <td><label for="nombre">¿Cuales?:</label></td>
                    <td class="p-1"><input type="text" class="form-control" name="asegurado_medicamento_detalle">
                    </td>
                </tr>
                <tr>
                    <td class="p-1">¿Actualmente está cursando sintomas asociados al COVID-19?:</td>
                    <td class="p-1 text-left"><input type="checkbox" name="asegurado_sintomas[]" value="si" > Si | <input
                            type="checkbox" name="asegurado_sintomas[]" value="no"> No</td>
                <tr>

                    <td><label for="nombre">Especifique:</label></td>
                    <td class="p-1"><input type="text" class="form-control" name="asegurado_sintomas_detalle"></td>
                </tr>
                <tr>
                    <td class="p-1">¿Estuvo expuesto en los úlitmos 10 días a situaciones de mayor riesgo que
                        puedan derivar en contagio de COVID-19?:</td>
                    <td class="p-1 text-left"><input type="checkbox" name="asegurado_ulitmosDias[]" value="si"> Si | <input
                            type="checkbox" name="asegurado_ultimaosDias[]" value="no"> No</td>
                </tr>
                <tr>
                    <td><label for="nombre">Especifique:</label></td>
                    <td class="p-1"><input type="text" class="form-control" name="asegurado_ultimosDias_detalle">
                    </td>
                </tr>
                <tr>
                    <td class="p-1">¿Estuvo en contacto estrecho con alguna persona COVID-19 Positivo en los
                        ultimos 15 dias?:</td>
                    <td class="p-1 text-left"><input type="checkbox" name="asegurado_contactoEstrecho[]" value="si"> Si | <input
                            type="checkbox" name="asegurado_contactoEstrecho[]" value="no"> No</td>
                </tr>
                <tr>
                    <td><label for="nombre">Especifique:</label></td>
                    <td class="p-1"><input type="text" class="form-control"
                            name="asegurado_contactoEstrecho_detalle"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <legend>Acompañantes: <button type="button" id="button" class="btn btn-success pt-1 pb-1" style="margin-left:3rem;">Agregar
            Acompañante</button></legend>
    <hr>

    <div class="tabla mt-3"></div>

    <div class="row mt-4">
        <div class="col-sm-5 mx-auto text-center">
            <button class="btn btn-primary btn-lg">Emitir Certificado</button>
        </div>
    </div>
</form>



</div>
<script>
    $('#button').click(function() {

        //creo una nueva fila


        var fila = '<tr><td>&nbsp;</td>' +

            '<td class="p-1 pt-3"><label for="nombre"> Nombre y Apellido:</label><input type="text" class="form-control" name="nombre[]" required></td>' +

            '<td class="p-1 pt-3"><label for="rut">RUT:</label><input type="text" name="rut[]" class="form-control"required ></td>' +

            '<td class="p-1 pt-3" style="width:4rem;"><label for="altura">Altura:</label><input type="number" min="0" max="3" step=".01" name="altura[]" class="form-control"></td>' +

            '<td class="p-1 pt-3" style="width:4rem;"><label for="peso">Peso:</label><input type="number" min="0" max="200" name="peso[]" class="form-control"></td>' +

            '<td class="p-1 pt-3"><label for="archivo">PCR:</label><input type="file" name="pcr[]" class="form-control"></td>' +

            '</tr>' +

            '<tr><td>&nbsp;</td>' +
            '<td class="p-1">¿Toma medicamentos de manera habitual?:</td>' +
            '<td class="p-1 text-center"><input type="checkbox" name="medicamentos[]" value="si"> Si | <input type="checkbox" name="medicamentos[]" value="no"> No</td>' +
            '<td>&nbsp;</td>' +
            '<td><label for="nombre">¿Cuales?:</label></td>' +
            '<td class="p-1"><input type="text" class="form-control" name="medicamento_detalle[]"></td>' +
            '</tr>' +
            '<tr><td>&nbsp;</td>' +
            '<td class="p-1">¿Actualmente está cursando sintomas asociados al COVID-19?:</td>' +
            '<td class="p-1 text-center"><input type="checkbox" name="sintomas[]" value="si"> Si | <input type="checkbox" name="sintomas[]" value="no"> No</td>' +
            '<td>&nbsp;</td>' +
            '<td><label for="nombre">Especifique:</label></td>' +
            '<td class="p-1"><input type="text" class="form-control" name="sintomas_detalle[]"></td>' +
            '</tr>' +
            '<tr><td>&nbsp;</td>' +
            '<td class="p-1">¿Estuvo expuesto en los úlitmos 10 días a situaciones de mayor riesgo que puedan derivar en contagio de COVID-19?:</td>' +
            '<td class="p-1 text-center"><input type="checkbox" name="ultimosDias[]" value="si"> Si | <input type="checkbox" name="ultimosDias[]" value="no"> No</td>' +
            '<td>&nbsp;</td>' +
            '<td><label for="nombre">Especifique:</label></td>' +
            '<td class="p-1"><input type="text" class="form-control" name="ultimosDias_detalle[]"></td>' +
            '</tr>' +
            '<tr><td style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;">&nbsp;</td>' +
            '<td class="p-1" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;">¿Estuvo en contacto estrecho con alguna persona COVID-19 Positivo en los ultimos 15 dias?:</td>' +
            '<td class="p-1 text-center" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;"><input type="checkbox" name="contactoEstrecho[]" value="si"> Si | <input type="checkbox" name="contactoEstrecho[]" value="no"> No</td>' +
            '<td style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;">&nbsp;</td>' +
            '<td style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;"><label for="nombre">Especifique:</label></td>' +
            '<td class="p-1" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;"><input type="text" class="form-control" name="contactoEstrecho_detalle[]"></td>' +
            '</tr>' +
            '<hr>';



        //añado fila a la tabla

        $('.tabla').append(fila);



    });
</script>
