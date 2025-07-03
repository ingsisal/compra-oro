<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
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
                                Registro de Compra
                                <small>Nuevo Registro</small>
                            </h2>
                        </div>
                        <div class="body">
							<div class="row clearfix">
                                <div class="col-lg-3 col-xs-12">
                                    <h2 class="card-inside-title">Codigo de Venta</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="venta" type="text" class="form-control" id="venta" value="<?php echo date('YmdHis')?>">
                                        </div>
                                    </div>
                                </div>
                                <!--div class="col-lg-9 col-xs-12">
                                    <h2 class="card-inside-title">Datos de Cliente</h2>
                                    <div class="input-group date" id="bs_datepicker_component_container">
                                        <div id="datos_cliente">
											<input name="cliente" type="hidden" id="cliente" value="">
                                            Esperando DNI...
                                        </div>
                                    </div>
                                </div!-->
                            </div>
                            <div class="row clearfix">
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Valor de ONZA</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-line">
                                                <input name="onza" type="number" class="form-control" id="onza" placeholder="Ingresar ONZA" value="<?php echo $onz?>">
                                            </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Ingresar Ley</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-line">
                                                <input name="ley" type="number" class="form-control" id="email_address_2" placeholder="Ingresar Ley">
                                            </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Ingresar Porcentaje</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <input name="porcentaje" class="form-control" type="text" id="porcentaje" placeholder="Ejemplo: 5,2,4">
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Ingresar Cantidad en Gramos</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                            <input name="cantidad" class="form-control" type="text" id="cantidad" placeholder="Ejemplo: 5,2,4">
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-control-label">
                                        <button class="btn btn-primary btn-lg waves-effect" type="button" onClick="enviarFormulario('calculo_pago.php?opcion=soles','frmgeneral','respuesta_calculo')">Pago en Soles</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <button class="btn btn-success btn-lg waves-effect" type="button" onClick="enviarFormulario('calculo_pago.php?opcion=dolares','frmgeneral','respuesta_calculo');">Pago en Dolares</button>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix" id="respuesta_calculo">
                                </div>
							<div id="botonesss">
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_compra.php','frmgeneral','defaultModal');enviarFormulario2('cambio_boton_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Guardar Compra</button>
							</div>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>