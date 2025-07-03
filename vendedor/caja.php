<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$fecha=date('Y-m-d', time());
$onzas=mysqli_query($link,"select * from precios where estado_pre='1'");
if($onza=mysqli_fetch_assoc($onzas))
{
	$onz=$onza['onza_pre'];
}
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Caja
                                <small>Datos de Caja Reporte en el Dia</small>
                            </h2>
                        </div>
                        <div class="body">
<?php
							
$verificar=ejecutarSQL::consultar("select * from caja");
if($ver=mysqli_fetch_assoc($verificar))
{
?>
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="pe-7s-cash"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-success"><h1>$. <span class="count"><?php echo bcdiv($ver['dolares_caj'],'1',2)?></span></h1></div>
							<div class="stat-heading"><b>SALDO EN DOLARES</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-2">
						<i class="pe-7s-cart"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-primary"><h1>S/. <span class="count"><?php echo bcdiv($ver['soles_caj'],'1',2)?></span></h1></div>
							<div class="stat-heading"><b>SALDO EN SOLES</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
else
{
	//echo "caja sin nada";
	if($ver['soles_caj']==0)
	{
		echo '<h1 class="text-danger">Saldo en Soles 0</h1>';
	}
	if($ver['dolares_caj']==0)
	{
		echo '<h1 class="text-danger">Saldo en Dolares 0</h1>';
	}
	if($ver['soles_caj']==0 && $ver['dolares_caj']==0)
	{
?>

<?php
	}
	//echo '<h1 class="text-danger">Caja sin Saldo</h1>';
}
$d_compras=0;
$compras_d=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where estado='0' and tipo_com='dolares' and registro_com like '".$fecha."%'");
while($com_d=mysqli_fetch_assoc($compras_d))
{
	$d_compras=$d_compras+$com_d['total_com'];
}
$s_compras=0;
$compras_s=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where estado='0' and tipo_com='soles' and registro_com like '".$fecha."%'");
while($com_s=mysqli_fetch_assoc($compras_s))
{
	$s_compras=$s_compras+$com_s['total_com'];
}
?>
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="pe-7s-cash"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-success"><h1>$. <span class="count"><?php echo bcdiv($d_compras,'1',2);?></span></h1></div>
							<div class="stat-heading"><b>COMPRA en Dolares</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-2">
						<i class="pe-7s-cart"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-primary"><h1>S/. <span class="count"><?php echo bcdiv($s_compras,'1',2)?></span></h1></div>
							<div class="stat-heading"><b>COMPRA en Soles</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
<?php
$d_ingresos=0;
$s_ingresos=0;
$reporte_d=ejecutarSQL::consultar("select * from detalle_ingreso where tipo_det='dolares' and registro_det like '".$fecha."%'");
while($rep_d=mysqli_fetch_assoc($reporte_d))
{
	$d_ingresos=$d_ingresos+$rep_d['ingreso_det'];
}
$reporte_s=ejecutarSQL::consultar("select * from detalle_ingreso where tipo_det='soles' and registro_det like '".$fecha."%'");
while($rep_s=mysqli_fetch_assoc($reporte_s))
{
	$s_ingresos=$s_ingresos+$rep_s['ingreso_det'];
}
$d_salidas=0;
$s_salidas=0;
$salidas_d=ejecutarSQL::consultar("select * from gastos where tipo_gas='dolares' and registro_gas like '".$fecha."%'");
while($sal_d=mysqli_fetch_assoc($salidas_d))
{
	$d_salidas=$d_salidas+$sal_d['monto_gas'];
}
$salidas_s=ejecutarSQL::consultar("select * from gastos where tipo_gas='soles' and registro_gas like '".$fecha."%'");
while($sal_s=mysqli_fetch_assoc($salidas_s))
{
	$s_salidas=$s_salidas+$sal_s['monto_gas'];
}
?>
	<div class="col-lg-3 col-sm-3 col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="pe-7s-cash"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-success"><h3>$. <span class="count"><?php echo $d_ingresos?></span></h3></div>
							<div class="stat-heading"><b>INGRESOS</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-2">
						<i class="pe-7s-cart"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-success"><h3>$. <span class="count"><?php echo $d_salidas?></span></h3></div>
							<div class="stat-heading"><b>SALIDAS</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-1">
						<i class="pe-7s-cash"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-primary"><h3>S/. <span class="count"><?php echo $s_ingresos?></span></h3></div>
							<div class="stat-heading"><b>INGRESOS</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-sm-3 col-md-3">
		<div class="card">
			<div class="card-body">
				<div class="stat-widget-five">
					<div class="stat-icon dib flat-color-2">
						<i class="pe-7s-cart"></i>
					</div>
					<div class="stat-content">
						<div class="text-left dib">
							<div class="stat-text text-primary"><h3>S/. <span class="count"><?php echo $s_salidas?></span></h3></div>
							<div class="stat-heading"><b>SALIDAS</b></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
							<button class="btn btn-success waves-effect" type="button" id="agregarsaldo">Agregar Saldo</button>
							<button class="btn btn-danger waves-effect" type="button" onClick="enviarFormulario('registro_gasto.php','frmgeneral','principal')">Registro de Gastos</button>
							<button class="btn btn-primary waves-effect" type="button" id="agregaritem">Ver Movimientos</button>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>
<script>
$("#agregarsaldo").on("click", function(){
	//alert("hola");
	$("#principal").load('registro_saldo.php');
});
</script>