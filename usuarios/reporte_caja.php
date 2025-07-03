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
                                Reporte de Caja
                                <small>Datos de Caja</small>
                            </h2>
                        </div>
                        <div class="body">
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('botones_diarios.php','frmgeneral','respuesta-botones')">Reporte Diario</button>
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('botones_mensuales.php','frmgeneral','respuesta-botones')">Reporte Mensual</button>
							<a class="btn btn-success waves-effect" type="button" onclick="tableToExcel('ReporteExcel', 'W3C Example Table')">Descargar en Excel</a>
							<br><br>
							<div id="respuesta-botones"></div>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>
<script type="text/javascript">

$("#agregarsaldo").on("click", function(){
	//alert("hola");
	$("#principal").load('registro_saldo.php');
});
	
</script>