<?php include("../includes/configuracion.php")?>
<?php include("../includes/conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
//$vaciar=mysqli_query($link,"truncate tmp_imagen");
//$cod=strtoupper($_POST['codigo']);
$dni=strtoupper($_POST['dni']);
$nom=strtoupper($_POST['nombres']);
$ape=strtoupper($_POST['apellidos']);
$reg=strtoupper($_POST['region']);
$pro=strtoupper($_POST['provincia']);
$dis=strtoupper($_POST['distrito']);
$dir=strtoupper($_POST['direccion']);
$tel=strtoupper($_POST['telefono']);
//$pas=$_POST['codigo_ing'];
$ema=$_POST['correo'];
date_default_timezone_set('America/Lima');
$registro=date('d/m/Y H:i:s', time());
//echo $cod.$nom.$des.$can;
if($dni=="" || $nom=="" || $ape=="" || $reg=="" || $pro=="" || $dis=="" || $dir=="" || $tel=="" || $ema=="")
{
?>
<button type="button" class="btn btn-primary" onClick="enviarFormulario('includes/guardar_alumno.php','frmregistro','respuesta_datosALM');enviarFormulario2('includes/cambio_boton_alumno.php','frmregistro','cambio_botonA')">Registrarse</button>
<button type="reset" class="btn btn-info">Borrar</button>
<button type="button" class="btn btn-danger" onClick="hide('popDivR');">Cancelar</button>
<?php
}
if($dni!="" && $nom!="" && $ape!="" && $reg!="" && $pro!="" && $dis!="" && $dir!="" && $tel!="" && $ema!="")
{
?>
<button type="button" class="btn btn-danger" onClick="hide('popDivR');">Cerrar Ventana</button>
<?php
}
?>