<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
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
$errorMSG="";
if($ley=="" || $por=="" || $onz=="" || $can=="" || $cli=="")
{
?>
<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_material.php','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_material.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Guardar Datos</button>
<?php
}
if($ley!="" && $por!="" && $onz!="" && $can!="" && $cli!="")
{

}
?>