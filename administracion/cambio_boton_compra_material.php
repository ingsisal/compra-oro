<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
//echo $_GET['codigo'];
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
if($ley=="" || $por=="" || $onz=="" || $can=="" || $cli=="" || $_POST['tipo-1']=="")
{
?>
<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_compra_material.php?codigo=<?php echo $_GET['codigo']?>','frmgeneral','defaultModal');enviarFormulario2('cambio_boton_compra_material.php?codigo=<?php echo $_GET['codigo']?>','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Guardar Compra</button>
<?php
}
if($ley!="" && $por!="" && $onz!="" && $can!="" && $cli!="" && $_POST['tipo-1']!="")
{
?>
<button class="btn btn-success waves-effect" type="button" onClick="ImprimirComprobante('<?php echo $ven?>')">Imprimir Venta</button>
<?php
}
?>