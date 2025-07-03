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
$ley=$_POST['ley-1'];
$por=$_POST['porcentaje-1'];
$onz=$_POST['onza-1'];
$can=$_POST['cantidad-1'];
$nitem=$_POST['cantidadC'];
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
$errorMSG="";
if($ley!="" && $por!="" && $onz!="" && $cli!="")
{
	$c=10000001;
	$precios=mysqli_query($link,"select * from pendientes");
	while(mysqli_fetch_assoc($precios))
	{
		$c++;
	}
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=bcdiv($c_ley-(($por*$c_ley)/100),'1',2);
$c_dolar=$c_procentaje*$can;
$cod="PEN-".$c;
mysqli_query($link,"INSERT INTO `pendientes` (`codigo_com`, `comprobante_com`, `cliente_com`, `registro_com`, `usuario_com`,`estado_com`) VALUES ('$cod', '$ven','$cli', '$registro', '$usuario','1');");	

	mysqli_query($link,"INSERT INTO `detalle_pendientes` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod', '$onz', '$ley', '$por', '$can', 'dolares', '0', '$c_dolar', '1');");
		//mysqli_query($link,"update caja set dolares_caj=dolares_caj-$c_dolar where id_caj='1'");
for($i=2;$i<=$nitem;$i++)
{
	//$cod="COM-".($c+1);
	if (empty($_POST['ley-'.$i])) {
		$errorMSG .= "Campo Ley de Compra Requerido ";
	} else {
		$leya = $_POST['ley-'.$i];
	}
	if (empty($_POST['ley-'.$i])) {
		$errorMSG .= "Campo Porcentaje de Compra Requerido ";
	} else {
		$porc = $_POST['porcentaje-'.$i];
	}
	if (empty($_POST['onza-'.$i])) {
		$errorMSG .= "Campo Onza de Compra Requerido ";
	} else {
		$onza = $_POST['onza-'.$i];
	}
if (empty($_POST['cantidad-'.$i])) {
		$errorMSG .= "Campo Onza de Compra Requerido ";
	} else {
		$cant = $_POST['cantidad-'.$i];
	}

	$c_onzaA=$onza/31.1035;
	$c_leyA=$c_onzaA*$leya;
	$c_procentajeA=bcdiv($c_leyA-(($porc*$c_leyA)/100),'1',2);
	$c_dolarA=$c_procentajeA*$cant;

	mysqli_query($link,"INSERT INTO `detalle_pendientes` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod', '$onza', '$leya', '$porc', '$cant', 'dolares', '0', '$c_dolarA', '1');");

		//$cant = $_POST['cantidad-'.$i];

}
	echo '<p class="col-green">Se Guardo en Pendientes para una Compra posterior...</p>';
}
?>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>