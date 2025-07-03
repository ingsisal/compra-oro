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
$codigo=$_POST['codigo-v'];
$cli=$_POST['datos_c'];
$ven=$_POST['venta'];
$ide=$_POST['id-1'];
$ley=$_POST['ley-1'];
$por=$_POST['porcentaje-1'];
$onz=$_POST['onza-1'];
$can=$_POST['cantidad-1'];
$mon=$_POST['monto-1'];
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
if($can=="")
{
	echo '<p class="col-pink">Ingresar Cantidad</p>';
}
$errorMSG="";
if($ley!="" && $por!="" && $onz!="" && $can!="" && $cli!="" && $_POST['tipo-1']!="")
{
	$c=10000001;
	$precios=mysqli_query($link,"select * from compras");
	while(mysqli_fetch_assoc($precios))
	{
		$c++;
	}
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=bcdiv($c_ley-(($por*$c_ley)/100),'1',2);
$c_dolar=$c_procentaje*$can;
$cod="COM-".$c;
mysqli_query($link,"UPDATE `compras` SET `cliente_com`='$cli' where codigo_com='$codigo'");	
	if($_POST['tipo-1']=="soles")
	{
		$anterior=$_POST['monto-1'];
		$total=$c_dolar*$_POST['cambio-1'];
		$actual=$total-$anterior;
	mysqli_query($link,"UPDATE `detalle_compras` SET `onza_com`='$onz', `ley_com`='$ley', `porcentaje_com`='$por', `cantidad_com`='$can', cambio_com='".$_POST['cambio-1']."', `total_com`='$total' where id_com='".$_POST['id-1']."'");
		mysqli_query($link,"update caja set soles_caj=soles_caj-$actual where id_caj='1'");
	}
	if($_POST['tipo-1']=="dolares")
	{
		$anterior=$_POST['monto-1'];
		$total=$c_dolar;
		$actual=$total-$anterior;
	mysqli_query($link,"UPDATE `detalle_compras` SET `onza_com`='$onz', `ley_com`='$ley', `porcentaje_com`='$por', `cantidad_com`='$can', cambio_com='".$_POST['cambio-1']."', `total_com`='$total' where id_com='".$_POST['id-1']."'");
		mysqli_query($link,"update caja set dolares_caj=dolares_caj-$actual where id_caj='1'");
	}
for($i=2;$i<=$nitem;$i++)
{
	//$cod="COM-".($c+1);
	//echo $_POST['id-'.$i];
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
		//$totalA=$c_dolarA*$_POST['cambio-'.$i];
		$anteriorA=$_POST['monto-'.$i];
		$totalA=$c_dolarA*$_POST['cambio-'.$i];
		$actualA=$totalA-$anteriorA;
	mysqli_query($link,"UPDATE `detalle_compras` SET `onza_com`='".$_POST['onza-'.$i]."', `ley_com`='".$_POST['ley-'.$i]."', `porcentaje_com`='".$_POST['porcentaje-'.$i]."', `cantidad_com`='".$_POST['cantidad-'.$i]."', cambio_com='".$_POST['cambio-'.$i]."', `total_com`='$totalA' where id_com='".$_POST['id-'.$i]."'");
		mysqli_query($link,"update caja set soles_caj=soles_caj-$actualA where id_caj='1'");
	}
	if($_POST['tipo-'.$i]=="dolares")
	{
		//echo "actualiza dolares : ".$_POST['cantidad-'.$i];
		$anteriorA=$_POST['monto-'.$i];
		$totalA=$c_dolarA;
		$actualA=$totalA-$anteriorA;
	mysqli_query($link,"UPDATE `detalle_compras` SET `onza_com`='".$_POST['onza-'.$i]."', `ley_com`='".$_POST['ley-'.$i]."', `porcentaje_com`='".$_POST['porcentaje-'.$i]."', `cantidad_com`='".$_POST['cantidad-'.$i]."', cambio_com='".$_POST['cambio-'.$i]."', `total_com`='$totalA' where id_com='".$_POST['id-'.$i]."'");
		mysqli_query($link,"update caja set dolares_caj=dolares_caj-$actualA where id_caj='1'");
	}
		//$cant = $_POST['cantidad-'.$i];
	}

}
	echo '<p class="col-green">Compra Realizada Satisfactoriamente...</p>';
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