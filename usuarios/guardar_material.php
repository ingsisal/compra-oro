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
$cli=$_POST['datos_c'];
$ven=$_POST['venta'];
$ley=$_POST['ley'];
$por=$_POST['porcentaje'];
$onz=$_POST['onza'];
$can=$_POST['cantidad'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
$usuario=$_SESSION['codigo'];
//echo $g24k;
if($cli=="")
{
	echo '<p class="col-pink">Ingresar Datos de Comprador</p>';
}
if($ley=="")
{
	echo '<p class="col-pink">Ingresar Ley</p>';
}
if($por=="")
{
	echo '<p class="col-pink">Seleccione Porcentaje</p>';
}
if($onz=="")
{
	echo '<p class="col-pink">Ingresar ONZA</p>';
}
if($can=="")
{
	echo '<p class="col-pink">Ingresar Cantidad</p>';
}
$errorMSG="";
if($ley!="" && $por!="" && $onz!="" && $can!="" && $cli!="")
{
	$c=10000001;
	$precios=mysqli_query($link,"select * from guardaje");
	while(mysqli_fetch_assoc($precios))
	{
		$c++;
	}
$cod="MAT-".$c;
	mysqli_query($link,"INSERT INTO `guardaje` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `registro_com`,`estado_com`) VALUES ('$ven', '$onz', '$ley', '$por', '$can','$registro', '1');");
	echo '<p class="col-green">Material Guardado Satisfactoriamente su codigo es <h3>'.$ven.'</h3></p>';
}
else
{
	echo '<p class="col-pink">Ocurrio un Error revise si no tiene algun dato vacio</p>';
}
?>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>