<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="defaultModalLabel"><?php echo $sistema?></h4>
		</div>
		<div class="modal-body">
<?php
if(ejecutarSQL::consultar("TRUNCATE `compras`;"))
{
	echo "<code>Datos de Compras Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `detalle_compras`;"))
{
	echo "<br><code>Datos de Detalle Compras Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `detalle_ingreso`;"))
{
	echo "<br><code>Datos de Detalle Ingresos Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `detalle_pendientes`;"))
{
	echo "<br><code>Datos de Pendientes Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `detalle_precio`;"))
{
	echo "<br><code>Datos de Detalle Precio Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `detalle_reservas`;"))
{
	echo "<br><code>Datos de Detalle Reservas Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `gastos`;"))
{
	echo "<br><code>Datos de Gastos Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `guardaje`;"))
{
	echo "<br><code>Datos de Reservas Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `pendientes`;"))
{
	echo "<br><code>Datos de Pendientes Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `precios`;"))
{
	echo "<br><code>Datos de Precios Onza Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `registro_caja`;"))
{
	echo "<br><code>Datos de Caja Vaciado...</code>";
}
if(ejecutarSQL::consultar("TRUNCATE `reservas`;"))
{
	echo "<br><code>Datos de Reservas Vaciado...</code>";
}
if(ejecutarSQL::consultar("UPDATE `caja` set soles_caj='0',dolares_caj='0';"))
{
	echo "<br><code>Datos de Caja Reestablecido...</code>";
}
?>
<p class="font-bold text-success">La base de Datos del Sistema se ah Reiniciado Completamente...</p>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>