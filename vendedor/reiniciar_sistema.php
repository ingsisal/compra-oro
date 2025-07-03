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
                                Reinicio de Sistema
                                <small>Reestablecer Datos</small>
                            </h2>
                        </div>
                        <div class="body">
<div class="demo-button">
	<button class="btn btn-block btn-lg btn-danger waves-effect" type="button" onClick="enviarFormulario('ejecutar_reinicio.php','frmgeneral','defaultModal');" data-toggle="modal" data-target="#defaultModal">REINICIAR TODOS LOS DATOS DEL SISTEMA</button>
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