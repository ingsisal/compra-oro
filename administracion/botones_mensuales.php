<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$fecha=date('Y-m-d', time());
$meses=array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Setiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre")
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
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
	<select class="form-control" name="tmoneda" id="tmoneda">
		<option value="todos">Todos</option>
		<option value="soles">Soles</option>
		<option value="dolares">Dolares</option>
	</select>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
<select name="anio" id="anio" class="form-control">
<?php
for($a=date('Y');$a>=2020;$a--)
{
?>	
	<option value="<?php echo $a?>"><?php echo $a?></option>
<?php
}
?>
</select>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
<select name="mes" id="mes" class="form-control">
<?php
for($m=1;$m<=12;$m++)
{
	if($m<=9)
	{
		$m="0".$m;
	}
?>	
	<option value="<?php echo $m?>"><?php echo $meses[$m]?></option>
<?php
}
?>
</select>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
	<button class="btn btn-success btn-block" type="button" onClick="enviarFormulario('reporte_mensual.php','frmgeneral','respuesta-reportes')">Ver</button>
	</div>
</div>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="respuesta-reportes">
	</div>
</div>
