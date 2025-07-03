<?php include("configuracion.php")?>
<?php include("conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
$em=$_POST['email'];
?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">

	<div class="modal-header">
	  <h4 class="modal-title" id="myModalLabel">Recuperar Contraseña</h4>
	  <button type="button" class="close" data-dismiss="modal" onClick="hide('popDiv');"><span aria-hidden="true">×</span>
	  </button>
	</div>
<?php
if($em=="")
{
?>
	<div class="modal-body">
		<div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Correo Electronico</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" class="form-control" id="email" name="email" placeholder="ejemplo@italyasesores.com">
		</div>
		<div>Debe Ingresar su Correo Electronico...</div>
	  	</div>
	</div>
	<div class="modal-footer" id="respuesta_datos">
		  <button type="button" class="btn btn-primary" onClick="enviarFormulario('includes/procesar_recuperacion.php','frmrecuperar','recuperar');">Enviar Solicitud</button>
		  <button type="button" class="btn btn-danger" onClick="hide('popDiv');">Cancelar</button>
	</div>	
<?php
}
if($em!="")
{
$ema="ingsisal@gmail.com";
$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: www.italyasesores.com";

$subject = "Solicitud de Recuperacion ".$em;
$txt="<img src=\"http://italyasesores.com/archivos/logo-inicial.png\">";
$txt .= "<br><br>Se realizo la solicitud de Recuperacion de Contraseña<br><br>";
$txt .= "Correo Electronico: <b>".$em."</b><br>";
$txt .="<br>Fecha de Registro: <b>".date('d-m-Y')."</b>";

mail($ema,$subject,$txt,$cabeceras);
?>
	<div class="modal-body">
		<div class="form-group row ">
		<div>Se envio la colicitud para Recuperar su Contraseña se le enviara la informacion al siguiente correo <?php echo $em?></div>
	  	</div>
	</div>
	<div class="modal-footer" id="respuesta_datos">
		  <button type="button" class="btn btn-danger" onClick="hide('popDiv');">Cerrar Ventana</button>
	</div>	
<?php
}
?>
  </div>
</div>