<?php
include("../includes/configuracion.php");
include("../includes/conector.php");
session_start();
$link=conectarse();
$cli=$_POST['cliente'];
$cal=$_POST['calidad'];
$pes=$_POST['peso'];
$tot=$_POST['total'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
//echo $g24k;
if($cli=="" || $cal=="" || $pes=="")
{
?>
<button class="btn btn-primary btn-lg waves-effect" type="button" onClick="enviarFormulario('guardar_compra.php','frmgeneral','defaultModal');enviarFormulario2('cambio_boton_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Realizar Compra</button>
<?php
}
if($cli!="" && $cal!="" && $pes!="")
{
?>
<button class="btn btn-success btn-lg waves-effect" type="button" onClick="enviarFormulario('registro_compra.php','frmgeneral','principal')">Nueva Compra</button>
<?php
}
?>