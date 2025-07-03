<?php
include("../includes/configuracion.php");
$link=conectarse();
session_start();
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
                                        <th>CLIENTE</th>
										<th>ONZA</th>
										<th>%</th>
										<th>PESO g.</th>
                                        <th>PAGO</th>
										<th>UNIT.</th>
										<th>TOTAL</th>
										<th>COMPRA</th>
										<th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$compras=mysqli_query($link,"select * from compras where estado='0' order by registro_com desc");
while($com=mysqli_fetch_assoc($compras))
{
	$tota=0;
	$cant=0;
$datos=ejecutarSQL::consultar("select * from detalle_compras where codigo_com='".$com['codigo_com']."'");
while($dat=mysqli_fetch_assoc($datos))
{
	$tipo=$dat['tipo_com'];
	$onza=$dat['onza_com'];
	$porc=$dat['porcentaje_com'];
	$cant=$cant+$dat['cantidad_com'];
	$tota=$tota+$dat['total_com'];
}
	//echo $_SESSION['nivel'];
?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo date("d-m-Y", strtotime($com['registro_com']))?></td>
                                        <td><?php echo $com['cliente_com']?></td>
                                        <td><?php echo $onza?></td>
										<td><?php echo $porc?> %</td>
										<td><?php echo $cant?></td>
										<td style="text-transform: capitalize;font-weight: bold;"><?php echo $tipo?></td>
										<td><?php echo $tota/$cant;?></td>
										<td align="right"><b class="text-danger"><?php if($tipo=="soles"){echo "S/. ".bcdiv($tota,'1',2);}if($tipo=="dolares"){echo "$. ".bcdiv($tota,'1',2);}?></b></td>
										<td><?php if($com['compra_com']==0){echo '<code class="font-bold col-teal">Normal</code>';}if($com['compra_com']==1){echo '<code class="font-bold col-pink">Reserva</code>';}?></td>
										<td><button name="<?php echo $com['codigo_com']?>" class="btn btn-xs btn-warning" type="button" onClick="enviarFormulario('detalle_compra.php?codigo=<?php echo $com['codigo_com']?>','frmgeneral','defaultModal');" data-toggle="modal" data-target="#defaultModal"><i class="material-icons">info</i></button> <button name="<?php echo $com['codigo_com']?>" class="btn btn-xs btn-success botonmodificar" type="button"><i class="material-icons">edit</i></button> <button class="btn btn-xs btn-primary" type="button" onClick="ReImprimir('<?php echo $com['codigo_com']?>')"><i class="material-icons">print</i></button> <button onClick="enviarFormulario('eliminar_compra.php?codigo=<?php echo $com['codigo_com']?>','frmgeneral','defaultModal');" data-toggle="modal" data-target="#defaultModal" class="btn btn-xs btn-danger" type="button"><i class="material-icons">delete</i></button></td>
                                    </tr>
<?php
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
<script>
    $(document).on("click",".botonmodificar",function () {
        var variable = $(this).attr('name');
        //$("#codigo").val(variable);
        //alert(variable);
		$("#principal").load('modificar_compra.php?codigo_p='+variable);
    });
    $(document).on("click",".actualizarlista",function () {
        var variable = $(this).attr('name');
        //$("#codigo").val(variable);
        //alert(variable);
		$("#principal").load('lista_compras.php');
    });
</script>