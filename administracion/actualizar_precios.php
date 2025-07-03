<?php
include("../includes/configuracion.php");
$link=conectarse();
$precios=mysqli_query($link,"select * from precios inner join detalle_precio on precios.codigo_pre=detalle_precio.precio_det where estado_pre='1'");
if($pre=mysqli_fetch_assoc($precios))
{
$fecha=$pre['registro_pre'];
$onza=$pre['onza_det'];
$fijo=$pre['fijo_det'];
}
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>
						Precios de Onza
						<small>Ultima Actualizacion : <span class="font-bold col-red"><?php echo $fecha;?></span></small>
					</h2>
				</div>
				<div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <b>Valor Onza / KITCO</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">gavel</i>
                                            </span>
                                            <div class="form-line">
                                                <input name="onza" type="text" class="form-control" id="onza" placeholder="<?php echo $onza;?>">
                                            </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
					<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_precios.php','frmgeneral','defaultModal')" data-toggle="modal" data-target="#defaultModal">Actualizar Datos</button>
                        </div>
			</div>
		</div>
	</div>
	<!-- Vertical Layout | With Floating Label -->
</div>