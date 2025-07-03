<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
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
$errorMSG="";
if($ley=="" || $por=="" || $onz=="" || $can=="" || $cli=="")
{
?>
<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_compra.php','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Guardar Compra</button>
<button class="btn btn-danger waves-effect" type="button" onClick="enviarFormulario('guardar_compra_pendiente.php','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_compra_pendiente.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Reservar Compra</button>
<?php
}
?>