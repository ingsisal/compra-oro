<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$t_reporte=$_POST['treporte'];
$t_moneda=$_POST['tmoneda'];
$anio=$_POST['anio'];
$mes=$_POST['mes'];
//$dia=$_POST['dia'];
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
<?php
if($t_reporte=="r_compras")
{
	//echo "entra";
?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table id="ReporteExcel" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>CLIENTE</th>
										<th>TIPO</th>
										<th>PESO</th>
										<th>CAMBIO</th>
										<th>MONTO</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$c=1;
$total=0;
if($t_moneda=="todos")
{
	$sql=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where estado='0' and registro_com like '".$anio."-".$mes."%'");
}
if($t_moneda=="soles")
{
	$sql=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where estado='0' and tipo_com='soles' and registro_com like '".$anio."-".$mes."%'");
}
if($t_moneda=="dolares")
{
	$sql=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where estado='0' and tipo_com='dolares' and registro_com like '".$anio."-".$mes."%'");
}

	while($dat=mysqli_fetch_assoc($sql))
	{
?>
                                    <tr>
                                        <th scope="row"><?php echo $c;?></th>
                                        <td><?php echo $dat['registro_com']?></td>
                                        <td><?php echo $dat['cliente_com']?></td>
                                        <td style="text-transform: capitalize;"><?php echo $dat['tipo_com']?></td>
										<td><?php echo $dat['cantidad_com']?></td>
										<td><?php echo $dat['cambio_com']?></td>
										<td class="text-primary"><b><?php echo bcdiv($dat['total_com'],'1',2)?></b></td>
                                    </tr>
<?php
		$total=$total+$dat['total_com'];
		$c++;
	}
?>
									<tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
										<th>TOTAL</th>
										<th><h3 style="margin-top: 0px;"><?php echo bcdiv($total,'1',2);?></h3></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
}
if($t_reporte=="r_ingreso")
{
?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table id="ReporteExcel" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>USUARIO</th>
										<th>TIPO</th>
										<th>MONTO</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$total=0;
$c=1;
if($t_moneda=="todos")
{
	$sql=ejecutarSQL::consultar("select * from detalle_ingreso inner join usuarios on detalle_ingreso.usuario_det=usuarios.id_usu where registro_det like '".$anio."-".$mes."%'");
}
if($t_moneda=="soles")
{
	$sql=ejecutarSQL::consultar("select * from detalle_ingreso inner join usuarios on detalle_ingreso.usuario_det=usuarios.id_usu where tipo_det='soles' and registro_det like '".$anio."-".$mes."%'");
}
if($t_moneda=="dolares")
{
	$sql=ejecutarSQL::consultar("select * from detalle_ingreso inner join usuarios on detalle_ingreso.usuario_det=usuarios.id_usu where tipo_det='dolares' and registro_det like '".$anio."-".$mes."%'");
}

	while($dat=mysqli_fetch_assoc($sql))
	{
?>
                                    <tr>
                                        <th scope="row"><?php echo $c;?></th>
                                        <td><?php echo $dat['registro_det']?></td>
                                        <td><?php echo $dat['nombre_usu']." ".$dat['apellido_usu']?></td>
                                        <td style="text-transform: capitalize;"><?php echo $dat['tipo_det']?></td>
										<td class="text-primary"><b><?php echo bcdiv($dat['ingreso_det'],'1',2)?></b></td>
                                    </tr>
<?php
		$total=$total+$dat['ingreso_det'];
		$c++;
	}
?>
									<tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
										<th>TOTAL</th>
										<th><h3 style="margin-top: 0px;"><?php echo bcdiv($total,'1',2);?></h3></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
}
if($t_reporte=="r_gastos")
{
?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table id="ReporteExcel" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>USUARIO</th>
										<th>DETALLE</th>
										<th>TIPO</th>
										<th>MONTO</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
	$total=0;
$c=1;
if($t_moneda=="todos")
{
	$sql=ejecutarSQL::consultar("select * from gastos inner join usuarios on gastos.usuario_gas=usuarios.id_usu where registro_gas like '".$anio."-".$mes."%'");
}
if($t_moneda=="soles")
{
	$sql=ejecutarSQL::consultar("select * from gastos inner join usuarios on gastos.usuario_gas=usuarios.id_usu where tipo_gas='soles' and registro_gas like '".$anio."-".$mes."%'");
}
if($t_moneda=="dolares")
{
	$sql=ejecutarSQL::consultar("select * from gastos inner join usuarios on gastos.usuario_gas=usuarios.id_usu where tipo_gas='dolares' and registro_gas like '".$anio."-".$mes."%'");
}

	while($dat=mysqli_fetch_assoc($sql))
	{
?>
                                    <tr>
                                        <th scope="row"><?php echo $c;?></th>
                                        <td><?php echo $dat['nombre_usu']." ".$dat['apellido_usu']?></td>
										<td><?php echo $dat['detalle_gas']?></td>
                                        <td style="text-transform: capitalize;"><?php echo $dat['tipo_gas']?></td>
										<td class="text-primary"><b><?php echo bcdiv($dat['monto_gas'],'1',2)?></b></td>
                                    </tr>
<?php
		$total=$total+$dat['monto_gas'];
		$c++;
	}
?>
									<tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
										<th>TOTAL</th>
										<th><h3 style="margin-top: 0px;"><?php echo bcdiv($total,'1',2);?></h3></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
}
?>


    </div>
	<!-- Vertical Layout | With Floating Label -->
</div>