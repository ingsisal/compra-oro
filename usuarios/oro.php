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
                                Datos de Compra de Oro
                                <small>Reporte</small>
                            </h2>
                        </div>
                        <div class="body">
<div class="row">
<?php
$fecha_h=date('Y-m-d', time());
$fecha_m=date('Y-m', time());
$fecha_a=date('Y', time());
$gd=0;$gm=0;$ga=0;
$dia=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compra_com='0' and estado='0' and registro_com like '".$fecha_h."%'");
while($d=mysqli_fetch_assoc($dia))
{
	$gd=$gd+$d['cantidad_com'];
}
$mes=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compra_com='0' and estado='0' and registro_com like '".$fecha_m."%'");
while($m=mysqli_fetch_assoc($mes))
{
	$gm=$gm+$m['cantidad_com'];
}
$anio=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compra_com='0' and estado='0' and registro_com like '".$fecha_a."%'");
while($a=mysqli_fetch_assoc($anio))
{
	$ga=$ga+$a['cantidad_com'];
}
?>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box-4 hover-zoom-effect">
			<div class="icon">
				<i class="material-icons col-red">devices</i>
			</div>
			<div class="content">
				<div class="text">HOY</div>
				<div class="number count-to" data-from="0" data-to="125" data-speed="1000" data-fresh-interval="20"><?php echo $gd?> gr.</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box-4 hover-zoom-effect">
			<div class="icon">
				<i class="material-icons col-green">devices</i>
			</div>
			<div class="content">
				<div class="text">EN EL MES</div>
				<div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $gm?> gr.</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="info-box-4 hover-zoom-effect">
			<div class="icon">
				<i class="material-icons col-purple">devices</i>
			</div>
			<div class="content">
				<div class="text">ANUAL</div>
				<div class="number count-to" data-from="0" data-to="117" data-speed="1000" data-fresh-interval="20"><?php echo $ga?> gr.</div>
			</div>
		</div>
	</div>
</div>
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
<script src="<?php echo $url?>/js/pages/widgets/infobox/infobox-5.js"></script>