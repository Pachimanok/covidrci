<table width="100%" border="0" cellpadding="1" cellspacing="0" bordercolor="#999999" class="tablaContenido">
    <tr>
        <td width="50%" valign="top" class="tdContenido" style="border:none; text-align:center;">
            <img src="http://rail.ar/ru.png" style="width:10rem;" alt="">
        </td>
        <td width="50%" valign="top" class="tdContenido" style="text-align:center;">
                <img src="http://rail.ar/datosPolizaRU.png" style="width:15rem;" alt="">
        </td>
    </tr>
</table>
<h3 style="text-align:center; margin-button: 2%;">Certificado de Incorporacion N° {{$poliza}}</h3>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" class="tablaContenido">
    <tr>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Póliza: </strong></td>
        <td colspan="2" width="25%" bgcolor="#E9E9E9" class="tdContenido"> TAK-2022</td>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Tomador:</strong></td>
        <td colspan="2" width="25%" bgcolor="#E9E9E9" class="tdContenido">{{$tomador}}</td>
    </tr>
    <tr>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Motivo del Endoso:</strong></td>
        <td colspan="2" bgcolor="#E9E9E9" class="tdContenido">Emisión Póliza</td>
        <td align="left"  width="25%"class="tdContenidoItem"><strong>Domicilo:</strong></td>
        <td colspan="2" width="25%"  bgcolor="#E9E9E9" class="tdContenido">{{ $domicilio}}</td>
    </tr>
    <tr>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Seccion:</strong></td>
        <td colspan="2" width="25%"  bgcolor="#E9E9E9" class="tdContenido">SALUD</td>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Localidad:</strong></td>
        <td colspan="2" width="25%"  bgcolor="#E9E9E9" class="tdContenido">{{ $localidad }}</td>
    </tr>
    <tr>
        <td align="left" width="25%"  class="tdContenidoItem"><strong>Lugar de Emision:</strong></td>
        <td colspan="2" width="25%" bgcolor="#E9E9E9" class="tdContenido">SANTIAGO DE CHILE</td>
        <td align="left" width="25%" class="tdContenidoItem"><strong>RUT:</strong></td>
        <td colspan="2" width="25%"  bgcolor="#E9E9E9" class="tdContenido">{{$rut}}</td>
    </tr>
    <tr>
        <td align="left" width="25%" class="tdContenidoItem"><strong>Fecha:</strong></td>
        <td colspan="2" width="25%"bgcolor="#E9E9E9" class="tdContenido">{{ $hoy }}</td>
        <td align="left" width="25%"class="tdContenidoItem"><strong>Vigencia:</strong></td>
        <td colspan="2" width="25%" bgcolor="#E9E9E9" class="tdContenido">Desde: {{ $fecha_inicio }} hasta {{ $fecha_fin}}</td>
    </tr>
</table>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" class="tablaContenido">
    <tr>
        <td align="center" width="100%" class="tdContenidoItem" bgcolor="#E9E9E9"><strong>Nómina de segurados: </strong></td>
    </tr>
    <tr>
        <td>
            <ul>
                <li>Asegurado: {{ $rut }} - {{ $tomador}} - TITULAR</li>
               
               @foreach ($asegurados[0] as $asegurado)
              

                     <li>Asegurado: {{ $asegurado->doc_numero}} - {{ $asegurado->nombre}} - TITULAR</li> 
               
              @endforeach 
                
            </ul>   
        </td>    
    </tr>

</table>
<style>
    .pequeña{
        font-size:2rem;
    }
    .muy-pequeña{
        font-size:1rem;
    }
</style>
<table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#999999" class="tablaContenido">
    <tr>
        <td align="center" width="100%" class="tdContenidoItem" bgcolor="#E9E9E9"><strong>Riesgo Cubierto: </strong></td>
    </tr>
    <tr>
        <td>
            <p><small style="font-size:0.8rem;">
                Se abona al asegurado un monto de USD 5.400,00 por cada día que permanezca internado en una institución
                de salud ya sea en sala común, terapia intermedia o terapia intensiva a consecuencia de haber contraído
                el virus COVID-19
                Se abona al asegurado un monto de USD 5.400,00 por cada día de estadía por reposo forzoso (prolongación de
                la estadía), en caso de que el asegurado deba permanecer en aislamiento a consecuencia de haber
                contraído el virus COVID-19
                Cuando se trate de internación del asegurado en una institución de salud, se abona por un periodo máximo
                de 30 días.</small></p>
            <p><small style="font-size:0.8rem;">
            Cuando se trate de aislamiento del asegurado en el lugar donde se encuentra alojado, se abona por un
            periodo máximo de 10 días, contados a partir de la fecha en la cual el asegurado debía dejar la reserva
            realizada originalmente.</small></p>
            <p><small style="font-size:0.8rem;">
            No aplica carencia. No aplica franquicia.</small></p>
            <p><small style="font-size:0.8rem;">
            El usuario podrá acceder a la atención médica digital a través de la descarga de la aplicación o desde la web mediante el siguiente enlace:
            https://app.doc24.com.ar/paciente/signin
            Servicio de Atención Al Asegurado
            La compañía de seguros dispone de un Servicio de Atención al Asegurado que atenderá las consultas y reclamos que presenten los tomadores de seguros,
            asegurados, beneficiarios y/o derechohabientes. En caso de que el reclamo no haya sido resuelto o que haya sido denegada su admisión o desestimado,
            total o parcialmente, podrá comunicarse con la Superintendencia de Seguros de la Nación por teléfono al 0800 666 8400, correo electrónico a
            denuncias@ssn.gob.ar o por formulario web.El Servicio de Atención al Asegurado está integrado por: RESPONSABLE: FRONTONI DIEGO ALEJANDRO -
            diego.frontoni@riouruguay.com.ar - Tel. +543442420314 SUPLENTE: TEA JUAN ALBERTO - juan.tea@riouruguay.com.ar – Tel. +543442420200
            </small></p>
        </td>    
    </tr>
</table>
<p width="75%">
    <small style="font-size:0.6rem;">
        COMUNICACIÓN AL ASEGURADO: El asegurado que se identifica en este Certificado de Incorporación tendrá derecho a solicitar una copia de la póliza oportunamente
        entregada al Tomador del presente contrato de seguro.
        SEÑOR ASEGURADO: Designar sus beneficiarios en la cobertura que está contratando es un derecho que usted posee. La no designación de beneficiarios, o su designación
        errónea puede implicar demoras en el trámite de cobro del beneficio. Asimismo, usted tiene derecho a efectuar o a modificar su designación en cualquier momento, por escrito
        sin ninguna otra formalidad.
    </small>
</p>
<table width="100%" border="0" cellpadding="2" cellspacing="0" bordercolor="#999999" class="tablaContenido">
    <tr>
        <td width="80%">
            <p  width="75%">
                <small style="font-size:0.6rem;">
                    IMPORTANTE: Los asegurados podrán solicitar información ante la Superintendencia de Seguros de la Nación con relación a la situación económico
            financiera de la entidad aseguradora, dirigiéndose personalmente o por nota a Julio A. Roca 721 (C.C. 1067), Ciudad de Buenos Aires, o a los teléfonos:
            0800-666-8400 (línea gratuita)-(011)4338-4000 (líneas rotativas), en el horario de 10:30 a 17:30. Podrá consultarse via Internet en la siguiente dirección:
            http://wwww.ssn.gov.ar.
                </small>
            </p>
            <p  width="75%">
                <small style="font-size:0.6rem;">
            FIRMA FACSIMIL DE PÓLIZA: La presente Póliza se suscribe mediante firma facsimilar conforme lo previsto en el punto 7.8 del Reglamento
            General de la Actividad Aseguradora.
            </small>
            </p>
            <p  width="75%">
                <small style="font-size:0.6rem;">
            Si el texto de esta póliza difiere del contenido de la propuesta, la diferencia se considerará aprobada por el Asegurado si no reclama dentro de un
            mes de haber recibido la póliza (Art.12 - Ley de Seguros)
            </small>
            </p>
        </td>
        <td width="20%">
            <img src="http://rail.ar/firmaRioSeguros.png" style="width:10rem;" alt="">
        </td>
    </tr>
</table>