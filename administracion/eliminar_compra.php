<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$cod=$_GET['codigo'];
$sql_pendiente=ejecutarSQL::consultar("select * from compras where codigo_com='$cod'");
if($dat=mysqli_fetch_assoc($sql_pendiente))
{
	$cantidad=0;
	$total=0;
	$sql=ejecutarSQL::consultar("select * from detalle_compras where codigo_com='$cod'");
	while($s=mysqli_fetch_assoc($sql))
	{
		$cantidad=$cantidad+$s['cantidad_com'];
		$total=$total+$s['total_com'];
	}
}
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="defaultModalLabel"><?php echo $sistema?></h4>
		</div>
		<div class="modal-body">
			Esta Seguro que desea Eliminar la Compra de Codigo <span class="font-bold col-pink"><?php echo $cod?></span> con monto de Compra de <span class="font-bold col-pink"><?php echo $cantidad?>gr.</span> de oro por un Monto Total de <span class="font-bold col-pink"><?php echo $total?></span>
				
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-primary waves-effect actualizarlista" onClick="cargarContenido('eliminar_compra_ok.php?codigo=<?php echo $cod?>','respuesta_del')" data-dismiss="modal">SI</button>
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">NO</button>
		</div>
		<div id="respuesta_del"></div>
	</div>
</div>