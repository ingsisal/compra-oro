<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETALLE DE COMPRAS
                                <small>Detalle del Dia</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>USUARIO</th>
										<th>TIPO</th>
										<th>MONTO</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$c=1;
$compras=mysqli_query($link,"select * from detalle_ingreso inner join usuarios on detalle_ingreso.usuario_det=usuarios.id_usu order by registro_det desc");
while($com=mysqli_fetch_assoc($compras))
{
?>
                                    <tr>
                                        <th scope="row"><?php echo $c;?></th>
                                        <td><?php echo $com['registro_det']?></td>
                                        <td><?php echo $com['nombre_usu']." ".$com['apellido_usu']?></td>
                                        <td style="text-transform: capitalize;"><?php echo $com['tipo_det']?></td>
										<td class="text-primary"><b><?php echo $com['ingreso_det']?></b></td>
                                    </tr>
<?php
	$c++;
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>