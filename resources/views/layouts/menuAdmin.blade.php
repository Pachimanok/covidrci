<li><a href="<?php echo base_url(); ?>certificado/grilla">Certificados</a></li>
                    <li><a href="<?php echo base_url(); ?>usuario/grilla">Usuarios</a></li>
                    <li><a href="<?php echo base_url(); ?>producto/grilla">Productos</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cuenta corriente <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>cuenta_corriente/grilla">Cuenta Corriente</a></li>
                             <li><a href="<?php echo base_url(); ?>totales/saldo">Sumatorias de cuenta corriente</a></li>
                             <li class="divider"></li>
                             <li><a href="<?php echo base_url(); ?>credito_debito/grilla">Créditos del administrador</a></li>
                             <!--
                             <li><a href="<?php echo base_url(); ?>totales/credito_debito">Sumatorias de crédito del administrador</a></li>
                             -->
                             <li class="divider"></li>
                             <li><a href="<?php echo base_url(); ?>pagos/index">Pagos</a></li>   
                             <li><a href="<?php echo base_url(); ?>pagos/consultar">Agregar solicitud de pago</a></li>
                             <li><a href="<?php echo base_url(); ?>pagos/adeudados">Sumatoria de pagos adeudados</a></li>   
                         </ul>
                    </li>
        
                    
                    <li><a href="<?php echo base_url(); ?>reporte/totales">Reporte</a></li>
                    
                    <li><a href="<?php echo base_url(); ?>comision/grilla">Comisiones</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exportar <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>descargar_datos/criterios">Emisión y facturación</a></li>
                            <li><a href="<?php echo base_url(); ?>descargar_datos/pagos">Pagos</a></li> 
                        </ul>
                    </li>        
                    <li><a href="<?php echo base_url(); ?>enviar_correo/index">Correo</a></li>
                    <li><a href="<?php echo base_url(); ?>configuracion/grilla">Configuración</a></li>