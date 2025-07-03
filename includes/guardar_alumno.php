<?php include("../includes/configuracion.php")?>
<?php include("../includes/conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
function encriptar($mensage, $clave)
{
    $textoEncriptado = "";
    settype($mensage, "string");
    $i = strlen($mensage) - 1;
    $j = strlen($clave);
    if (strlen($mensage) <= 0) {
        return "";
    }
    do {
        $textoEncriptado .= ($mensage{$i} ^ $clave{$i % $j});
    } while ($i--);
    $textoEncriptado = base64_encode(base64_encode(strrev($textoEncriptado)));
    return $textoEncriptado;
}
//$vaciar=mysqli_query($link,"truncate tmp_imagen");
//$cod=strtoupper($_POST['codigo']);
$ie=$_POST['institucion'];
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
if($dni=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo DNI</div>';
}
if($nom=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo NOMBRES</div>';
}
if($ape=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo APELLIDOS</div>';
}
if($reg=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe Seleccionar una REGION</div>';
}
if($pro=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe Seleccionar una PROVINCIA</div>';
}
if($dis=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe Seleccionar una DISTRITO</div>';
}
if($dir=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo DIRECCION</div>';
}
if($tel=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo TELEFONO</div>';
}
if($ema=="")
{
	echo '<div class="text-danger"><i class="fa fa-times"></i> Debe ingresar datos al campo CORREO ELECTRONICO</div>';
}
if($dni!="" && $nom!="" && $ape!="" && $reg!="" && $pro!="" && $dis!="" && $dir!="" && $tel!="" && $ema!="")
{
	$c=10000001;
	$alumnos=mysqli_query($link,"select * from alumnos");
	while(mysqli_fetch_assoc($alumnos))
	{
		$c++;
	}
	$cod="ALU-".$c;
	$verificar=mysqli_query($link,"select * from alumnos where dni_alu='$dni'");
	if(mysqli_fetch_assoc($verificar))
	{
		echo '<div class="text-danger"><i class="fa fa-times"></i> DNI ya esta registrado</div>';
	}
	else
	{
	$sql_guardar="insert into alumnos(codigo_alu,ie_alu,dni_alu,nombres_alu,apellidos_alu,region_alu,provincia_alu,distrito_alu,direccion_alu,telefono_alu,correo_alu,perfil_alu,registro_alu,usuario_alu,clave_alu,nivel_alu,estado_alu) values('$cod','$ie','$dni','$nom','$ape','$reg','$pro','$dis','$dir','$tel','$ema','default.png','$registro','$dni','".encriptar($dni,"dublin")."','4','1')";
	$ejecutar=mysqli_query($link,$sql_guardar);
	echo '<div class="text-success"><i class="fa fa-times"></i> Los Datos Fueron Guardados Con EXITO y enviados al Correo : '.$ema.'</div>';
	//echo '<div class="text-danger"><i class="fa fa-times"></i> NOTA: Una vez realizado el registro el ALUMNO debera de realizar el pago al Banco : <b>XXXXX</b> al numero de Cuenta : <b>XXXXX</b> para poder utilizar las operaciones del sistema.</div>';
	echo '<div class="text-danger"><i class="fa fa-times"></i> NOTA: Una vez realizado el registro el ALUMNO debera realizar la Matricula para utilizar las Opciones del Aula Virtual.</div>';
$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: Italy-Asesores";
$subject = "BIENVENIDO - AULA VIRTUAL 2020";
$txt="<img src=\"http://italyasesores.com/archivos/logo-inicial.png\">";
$txt .= "<br><br>Bienvenido : <b>".$nom.", ".$ape."</b> Ud. se ha registrado como Participante de forma Virtual (on-Line)<br><br>";
$txt .="Estimado Alumno sus datos para poder ingresar al Sistema son:<br>";
$txt .= "Usuario: <b>".$dni."</b><br>";
$txt .= "Password: <b>".$dni."</b><br><br>";
$txt .="<br>Fecha de Registro: <b>".$registro."</b>";
$txt .= "<br>UD. puede ingresar al sistema haciendo clic <a href=\"www.virtual.italyasesores.com\">aqui</a>";
$txt .="<br>Saludos y gracias por utilizar este Servicio.";

mail($ema,$subject,$txt,$cabeceras);
}
}
?>