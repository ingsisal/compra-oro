<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETALLE DE COMPRAS RESERVADAS
                                <small>Datos Generales</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>CLIENTE</th>
										<th>ONZA</th>
										<th>%</th>
										<th>PESO g.</th>
                                        <th>ADELANTO</th>
										<th>SALDO</th>
										<th>ACC.</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
//echo "select * from pendientes inner join detalle_pendientes on pendientes.codigo_com=detalle_pendientes.codigo_com where estado_com='1' order by registro_com desc";
$compras=mysqli_query($link,"select * from reservas where reservas.estado_com='1' order by registro_com desc");
while($com=mysqli_fetch_assoc($compras))
{
	$tota=0;
	$cant=0;
	$sald=0;
$datos=ejecutarSQL::consultar("select * from detalle_reservas where codigo_com='".$com['codigo_com']."'");
while($dat=mysqli_fetch_assoc($datos))
{
	$tipo=$dat['tipo_com'];
	$onza=$dat['onza_com'];
	$porc=$dat['porcentaje_com'];
	$cant=$cant+$dat['cantidad_com'];
	$tota=bcdiv($tota+$dat['total_com'],'1',2);
	$sald=bcdiv($sald+$dat['descuento_com'],'1',2);
}
	$saldo=$tota-$sald;
?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo date("d/m/Y", strtotime($com['registro_com']));;?></td>
                                        <td><?php echo $com['cliente_com']?></td>
                                        <td><?php echo $onza?></td>
										<td><?php echo $porc?> %</td>
										<td><?php echo $cant?></td>
										<td><?php echo $sald?></td>
										<td><b class="text-danger"><?php echo $saldo?></b></td>
										<td><button type="button" name="<?php echo $com['codigo_com']?>" class="btn btn-success botoncomprareserva">Efectuar</button></td>
                                    </tr>
<?php
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>
<script>
    $(document).on("click",".botoncomprareserva",function () {
        var variable = $(this).attr('name');
        //$("#codigo").val(variable);
        //alert(variable);
		$("#principal").load('registro_compra_o.php?codigo_p='+variable);
    });
</script>