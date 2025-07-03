<?php include("configuracion.php")?>
<?php include("conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
?>
<form id="frmrecuperar" name="frmrecuperar">
<div id="recuperar">
<div class="modal-dialog modal-lg">
  <div class="modal-content">

	<div class="modal-header">
	  <h4 class="modal-title" id="myModalLabel">Recuperar Contraseña</h4>
	  <button type="button" class="close" data-dismiss="modal" onClick="hide('popDiv');"><span aria-hidden="true">×</span>
	  </button>
	</div>
	
	<div class="modal-body">
		<div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Correo Electronico</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" class="form-control" id="email" name="email" placeholder="ejemplo@italyasesores.com">
		</div>
	  	</div>
	</div>
	<div class="modal-footer" id="respuesta_datos">
		  <button type="button" class="btn btn-primary" onClick="enviarFormulario('includes/procesar_recuperacion.php','frmrecuperar','recuperar');">Enviar Solicitud</button>
		  <button type="button" class="btn btn-danger" onClick="hide('popDiv');">Cancelar</button>
	</div>	
	
  </div>
</div>
</div>
</form>