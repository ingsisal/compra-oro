<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$fecha=date('Y-m-d', time());

?>
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
	<select class="form-control" name="treporte" id="treporte">
		<option value="">Seleccionar...</option>
		<option value="r_compras">Reporte de Compras</option>
		<option value="r_ingreso">Reporte de Ingreso de Saldo</option>
		<option value="r_gastos">Reporte de Gastos Adicionales</option>
	</select>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	<select class="form-control" name="tmoneda" id="tmoneda">
		<option value="todos">Todos</option>
		<option value="soles">Soles</option>
		<option value="dolares">Dolares</option>
	</select>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	<input type="date" class="form-control" name="dia" id="dia">
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
	<button class="btn btn-success btn-block" type="button" onClick="enviarFormulario('reporte_diario.php','frmgeneral','respuesta-reportes')">Ver</button>
	</div>
</div>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="respuesta-reportes">
	</div>
</div>
