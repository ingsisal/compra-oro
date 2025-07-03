<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
$codigo=$_GET['codigo'];
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="defaultModalLabel"><?php echo $sistema?></h4>
		</div>
		<div class="modal-body">
<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>ONZA</th>
			<th>Ley</th>
			<th>%</th>
			<th>PESO g.</th>
			<th>PAGO</th>
			<th>UNIT.</th>
			<th>TOTAL</th>
		</tr>
	</thead>
	<tbody>
<?php
	$cd=1;
$datos=ejecutarSQL::consultar("select * from detalle_compras where codigo_com='$codigo'");
while($dat=mysqli_fetch_assoc($datos))
{
$tipo=$dat['tipo_com'];
$onza=$dat['onza_com'];
$ley=$dat['ley_com'];
$porc=$dat['porcentaje_com'];
$cant=$dat['cantidad_com'];
$tota=$dat['total_com'];

//echo $_SESSION['nivel'];
?>
		<tr>
			<th scope="row"><?php echo $cd;?></th>
			<td><?php echo $onza?></td>
			<td><?php echo $ley?></td>
			<td><?php echo $porc?> %</td>
			<td><?php echo $cant?></td>
			<td style="text-transform: capitalize;font-weight: bold;"><?php echo $tipo?></td>
			<td><?php echo $tota/$cant;?></td>
			<td align="right"><b class="text-danger"><?php if($tipo=="soles"){echo "S/. ".bcdiv($tota,'1',2);}if($tipo=="dolares"){echo "$. ".bcdiv($tota,'1',2);}?></b></td>
		</tr>
<?php
	$cd++;
}
?>
	</tbody>
</table>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>