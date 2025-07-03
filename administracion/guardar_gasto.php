<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="defaultModalLabel"><?php echo $sistema?></h4>
		</div>
		<div class="modal-body">
<?php
//$cli=$_POST['cliente'];
$tip=$_POST['tipo'];
$det=$_POST['detalle'];
$mon=$_POST['monto'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
//echo $g24k;
if($tip=="")
{
	echo '<p class="col-pink">Seleccionar Tipo de Gasto</p>';
}
if($det=="")
{
	echo '<p class="col-pink">Ingresar Detalle de Gasto</p>';
}
if($mon=="")
{
	echo '<p class="col-pink">Ingresar Monto de Dinero</p>';
}

if($det!="" && $tip!="" && $mon!="")
{
	if($tip=="soles")
	{
		$saldo=ejecutarSQL::consultar("select * from caja");
		if($sal=mysqli_fetch_assoc($saldo))
		{
			$monto=$sal['soles_caj'];
		}
		$total=$monto-$mon;
		mysqli_query($link,"INSERT INTO `gastos` (`usuario_gas`,`tipo_gas`,`monto_gas`,`detalle_gas`,`registro_gas`) VALUES ('".$_SESSION['codigo']."','$tip','$mon','$det','$registro');");
		mysqli_query($link,"update caja set soles_caj='$total' where id_caj='1'");
	}
	if($tip=="dolares")
	{
		$saldo=ejecutarSQL::consultar("select * from caja");
		if($sal=mysqli_fetch_assoc($saldo))
		{
			$monto=$sal['dolares_caj'];
		}
		$total=$monto-$mon;
		mysqli_query($link,"INSERT INTO `gastos` (`usuario_gas`,`tipo_gas`,`monto_gas`,`detalle_gas`,`registro_gas`) VALUES ('".$_SESSION['codigo']."','$tip','$mon','$det','$registro');");
		mysqli_query($link,"update caja set dolares_caj='$total' where id_caj='1'");
	}

	echo '<p class="col-green">Compra Realizada Satisfactoriamente...</p>';
}
?>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>