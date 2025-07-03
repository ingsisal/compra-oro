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
$tie=$_POST['tiempo'];
$ven=$_POST['venta'];
$ley=$_POST['ley-1'];
$por=$_POST['porcentaje-1'];
$ent=$_POST['porcent'];
$onz=$_POST['onza-1'];
$can=$_POST['cantidad-1'];
$nitem=$_POST['cantidadC'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
$hoy=date('d', time());
$usuario=$_SESSION['codigo'];
//echo $g24k;
if($cli=="")
{
	echo '<p class="col-pink">Ingresar Datos de Comprador</p>';
}
if($tie=="")
{
	echo '<p class="col-pink">Ingresar Tiempo de Compra</p>';
}
if($ent=="")
{
	echo '<p class="col-pink">Ingresar Porcentaje de Compra</p>';
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
if($ley!="" && $por!="" && $onz!="" && $cli!="" && $tie!="")
{
$date_now = date('Y-m-d');
$date_future = strtotime('+'.$tie.' day', strtotime($date_now));
$date_future = date('Y-m-d', $date_future);
	$c=10000001;
	$precios=mysqli_query($link,"select * from reservas");
	while(mysqli_fetch_assoc($precios))
	{
		$c++;
	}
	$cd=10000001;
	$compras=mysqli_query($link,"select * from compras");
	while(mysqli_fetch_assoc($compras))
	{
		$cd++;
	}
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=bcdiv($c_ley-(($por*$c_ley)/100),'1',2);
$c_dolar=$c_procentaje*$can;
$cod="RES-".$c;
$cod_c="COM-".$cd;
mysqli_query($link,"INSERT INTO `compras` (`codigo_com`, `comprobante_com`, `cliente_com`, `registro_com`, `usuario_com`, `compra_com`) VALUES ('$cod_c', '$ven','$cli', '$registro', '$usuario','1');");
mysqli_query($link,"INSERT INTO `reservas` (`codigo_com`, `comprobante_com`, `cliente_com`, `registro_com`, `usuario_com`, `porcentaje_com`, `tiempo_com`, `estado_com`) VALUES ('$cod', '$ven','$cli', '$registro', '$usuario','$ent','$date_future','1');");
	if($_POST['tipo-1']=="soles")
	{
		$total=$c_dolar*$_POST['cambio-1'];
		$total_d=($c_dolar*$_POST['cambio-1'])*($ent/100);
	mysqli_query($link,"INSERT INTO `detalle_compras` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod_c', '$onz', '$ley', '$por', '$can', '".$_POST['tipo-1']."', '".$_POST['cambio-1']."', '$total_d', '1');");
	mysqli_query($link,"INSERT INTO `detalle_reservas` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `descuento_com`, `estado_com`) VALUES ('$cod', '$onz', '$ley', '$por', '$can', '".$_POST['tipo-1']."', '".$_POST['cambio-1']."', '$total', '$total_d', '1');");
		mysqli_query($link,"update caja set soles_caj=soles_caj-$total_d where id_caj='1'");
	}
	if($_POST['tipo-1']=="dolares")
	{
		$total=$c_dolar;
		$total_d=$c_dolar*($ent/100);
	mysqli_query($link,"INSERT INTO `detalle_compras` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod_c', '$onz', '$ley', '$por', '$can', '".$_POST['tipo-1']."', '0', '$total_d', '1');");
	mysqli_query($link,"INSERT INTO `detalle_reservas` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `descuento_com`, `estado_com`) VALUES ('$cod', '$onz', '$ley', '$por', '$can', '".$_POST['tipo-1']."', '0', '$total', '$total_d', '1');");
		mysqli_query($link,"update caja set dolares_caj=dolares_caj-$total_d where id_caj='1'");
	}
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
		$errorMSG .= "Campo Cantidad de Compra Requerido ";
	} else {
		$cant = $_POST['cantidad-'.$i];
	}
	if (empty($_POST['tipo-'.$i])) {
		$errorMSG .= "Campo Tipo de Compra Requerido ";
	} else {
	$c_onzaA=$onza/31.1035;
	$c_leyA=$c_onzaA*$leya;
	$c_procentajeA=bcdiv($c_leyA-(($porc*$c_leyA)/100),'1',2);
	$c_dolarA=$c_procentajeA*$cant;
	if($_POST['tipo-'.$i]=="soles")
	{
		$totalA=$c_dolarA*$_POST['cambio-'.$i];
		$totalA_d=($c_dolarA*$_POST['cambio-'.$i])*($ent/100);
	mysqli_query($link,"INSERT INTO `detalle_compras` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod_c', '$onza', '$leya', '$porc', '$cant', '".$_POST['tipo-'.$i]."', '".$_POST['cambio-'.$i]."', '$totalA_d', '1');");
	mysqli_query($link,"INSERT INTO `detalle_reservas` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `descuento_com`, `estado_com`) VALUES ('$cod', '$onza', '$leya', '$porc', '$cant', '".$_POST['tipo-'.$i]."', '".$_POST['cambio-'.$i]."', '$totalA' ,'$totalA_d', '1');");
		mysqli_query($link,"update caja set soles_caj=soles_caj-$totalA_d where id_caj='1'");
	}
	if($_POST['tipo-'.$i]=="dolares")
	{
		$total=$c_dolarA;
		$total_d=$c_dolarA*($ent/100);
	mysqli_query($link,"INSERT INTO `detalle_compras` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `estado_com`) VALUES ('$cod_c', '$onza', '$leya', '$porc', '$cant', '".$_POST['tipo-'.$i]."', '0', '$total_d', '1');");
	mysqli_query($link,"INSERT INTO `detalle_reservas` (`codigo_com`, `onza_com`, `ley_com`, `porcentaje_com`, `cantidad_com`, `tipo_com`, `cambio_com`, `total_com`, `descuento_com`, `estado_com`) VALUES ('$cod', '$onza', '$leya', '$porc', '$cant', '".$_POST['tipo-'.$i]."', '0', '$total', '$total_d', '1');");
		mysqli_query($link,"update caja set dolares_caj=dolares_caj-$total_d where id_caj='1'");
	}
		//$cant = $_POST['cantidad-'.$i];
	}

}
	echo '<p class="col-green">Compra de Reserva Realizada Satisfactoriamente...</p>';
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