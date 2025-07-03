<?php
include("../includes/configuracion.php");
include("../includes/conector.php");
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
$g24k=$_POST['24k'];
$g22k=$_POST['22k'];
$g21k=$_POST['21k'];
$g18k=$_POST['18k'];
$g14k=$_POST['14k'];
$g12k=$_POST['12k'];
$g10k=$_POST['10k'];
$g9k=$_POST['9k'];
$g8k=$_POST['8k'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
//echo $g24k;
if($g24k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 24K</p>';
}
if($g22k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 22K</p>';
}
if($g21k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 21K</p>';
}
if($g18k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 18K</p>';
}
if($g14k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 14K</p>';
}
if($g12k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 12K</p>';
}
if($g10k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 10K</p>';
}
if($g9k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 9K</p>';
}
if($g8k=="")
{
	echo '<p class="col-pink">Debe Ingresar Datos en el Valor de 8K</p>';
}
if($g24k!="" && $g22k!="" && $g21k!="" && $g18k!="" && $g14k!="" && $g12k!="" && $g10k!="" && $g9k!="" && $g8k!="")
{
	mysqli_query($link,"update precios set estado_pre='0'");
	$c=10000001;
	$precios=mysqli_query($link,"select * from precios");
	while(mysqli_fetch_assoc($precios))
	{
		$c++;
	}
	$cod="PRE-".$c;
	mysqli_query($link,"INSERT INTO `precios` (`codigo_pre`, `registro_pre`, `usuario_pre`, `estado_pre`) VALUES ('$cod', '$registro', '".$_SESSION['codigo_S']."', '1');");
	mysqli_query($link,"INSERT INTO `detalle_precio` (`precio_det`, `gramo24_det`, `gramo22_det`, `gramo21_det`, `gramo18_det`, `gramo14_det`, `gramo12_det`, `gramo10_det`, `gramo9_det`, `gramo8_det`) VALUES ('$cod', '$g24k', '$g22k', '$g21k', '$g18k', '$g14k', '$g12k', '$g10k', '$g9k', '$g8k');");
	echo '<p class="col-green">Datos Actualizados Satisfactoriamente...</p>';
}
?>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>