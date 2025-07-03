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
                                Registro de Compra por Onza
                                <small>Nuevo Registro</small>
                            </h2>
                        </div>
                        <div class="body">
                                <div class="col-lg-3 col-xs-12">
                                    <h2 class="card-inside-title">Codigo de Venta</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="venta" type="text" class="form-control" id="venta" value="<?php echo date('YmdHis')?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-xs-12">
                                    <h2 class="card-inside-title">Datos de Cliente</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="datos_c" type="text" class="form-control" id="datos_c" placeholder="Nombres y Apellidos, Razon Social">
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-3 col-xs-9" style="margin-bottom: 0px;">
                                    <label class="card-inside-title">Tiempo en Dias de Espera</label>
								</div>
								<div class="col-lg-3 col-xs-9" style="margin-bottom: 0px;">
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="tiempo" type="number" class="form-control" id="tiempo" placeholder="Ejemplo: 5, 6" value="5">
                                        </div>
                                    </div>
                                </div>
								<div class="col-lg-3 col-xs-9" style="margin-bottom: 0px;">
                                    <label class="card-inside-title">% de Entrega</label>
								</div>
								<div class="col-lg-3 col-xs-9" style="margin-bottom: 0px;">
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="porcent" type="number" class="form-control" id="porcent" placeholder="Ejemplo: 10, 25, 50" value="90">
                                        </div>
                                    </div>
                                </div>
                            <table class="table table-hover" id="RegistroComp">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Onza</th>
                                        <th>Ley</th>
                                        <th>Porcentaje</th>
										<th>Gramos</th>
										<th>T. compra</th>
										<th>P. Unit./Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td><input name="onza-1" type="number" class="TipoCambioOnza form-control" id="onza-1" placeholder="Ingresar ONZA" value="<?php echo $onz?>"></td>
                                        <td><input name="ley-1" type="number" class="TipoCambioLey form-control" id="ley-1" placeholder="Ingresar Ley"></td>
                                        <td><input name="porcentaje-1" class="TipoCambioPorcentaje form-control" type="text" id="porcentaje-1" placeholder="Ejemplo: 5,2,4"></td>
										<td><input name="cantidad-1" class="TipoCambioGramos form-control" type="text" id="cantidad-1" placeholder="Ejemplo: 5,2,4"></td>
										<td><select name="tipo-1" id="tipo-1" class="TipoCamb form-control"><option value="">Seleccionar</option><option value="soles">Soles</option><option value="dolares">Dolares</option></select></td>
										<td id="datos_compra-1"></td>
                                    </tr>
                                </tbody>
                            </table>
							<input type="hidden" name="cantidadC" id="cantidadC">
							<div id="botones">
							<button class="btn btn-warning waves-effect" type="button" id="agregaritem">Agregar Item de Compra</button>
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_compra_reserva.php','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_compra_reserva.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Guardar Compra</button>
							</div>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>
<script>
var iCnt = 1;
$("#agregaritem").click(function(event) {
iCnt = iCnt + 1;
$('#RegistroComp').append('<tr><th><button type="button" class="eliminar btn btn-danger waves-effect"><i class="material-icons">delete</i></button></th><td><input name="onza-'+iCnt+'" type="number" class="TipoCambioOnza form-control" id="onza-'+iCnt+'" placeholder="Ingresar ONZA" value="<?php echo $onz?>"></td><td><input name="ley-'+iCnt+'" type="number" class="TipoCambioLey form-control" id="ley-'+iCnt+'" placeholder="Ingresar Ley"></td><td><input name="porcentaje-'+iCnt+'" class="TipoCambioPorcentaje form-control" type="text" id="porcentaje-'+iCnt+'" placeholder="Ejemplo: 5,2,4"></td><td><input name="cantidad-'+iCnt+'" class="TipoCambioGramos form-control" type="text" id="cantidad-'+iCnt+'" placeholder="Ejemplo: 5,2,4"></td><td><select name="tipo-'+iCnt+'" id="tipo-'+iCnt+'" class="TipoCamb form-control"><option value="">Seleccionar</option><option value="soles">Soles</option><option value="dolares">Dolares</option></select></td><td id="datos_compra-'+iCnt+'"></td></tr>');
	$("#cantidadC").val(iCnt);
});
$("#RegistroComp").on("click", ".eliminar", function(){
	$(this).parents("tr").remove();
});
$("#RegistroComp").on("keyup", ".TipoCambio", function(){
	var variable = $(this).attr('name');
	let id = variable.substring(variable.indexOf("-"));
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
	var cam=$("#cambio"+id).val();
    $.ajax({
        type: "POST",
        url: "calculo_pago_cambio.php",
        data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id + "&cambio=" + cam,
        success : function(text){
            if (text == "success"){
				$("#datos_cambio"+id).html(text);
            } else {
                $("#datos_cambio"+id).html(text);
            }
        }
    });
});
$("#RegistroComp").on("keyup", ".TipoCambioOnza", function(){
	var variable = $(this).attr('name');
	let id = variable.substring(variable.indexOf("-"));
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
	var cam=$("#cambio"+id).val();
	//alert(tip);
	if(tip=="soles")
		{
			var cam=$("#cambio"+id).val();
			$.ajax({
				type: "POST",
				url: "calculo_pago_cambio.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id + "&cambio=" + cam,
				success : function(text){
					if (text == "success"){
						$("#datos_cambio"+id).html(text);
					} else {
						$("#datos_cambio"+id).html(text);
					}
				}
			});
		}
	if(tip=="dolares")
		{
			$.ajax({
				type: "POST",
				url: "calculo_pago.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id,
				success : function(text){
					if (text == "success"){
						$("#datos_compra"+id).html(text);
					} else {
						$("#datos_compra"+id).html(text);
					}
				}
			});
		}
});
$("#RegistroComp").on("keyup", ".TipoCambioLey", function(){
	var variable = $(this).attr('name');
	let id = variable.substring(variable.indexOf("-"));
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
	var cam=$("#cambio"+id).val();
	//alert(tip);
	if(tip=="soles")
		{
			var cam=$("#cambio"+id).val();
			$.ajax({
				type: "POST",
				url: "calculo_pago_cambio.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id + "&cambio=" + cam,
				success : function(text){
					if (text == "success"){
						$("#datos_cambio"+id).html(text);
					} else {
						$("#datos_cambio"+id).html(text);
					}
				}
			});
		}
	if(tip=="dolares")
		{
			$.ajax({
				type: "POST",
				url: "calculo_pago.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id,
				success : function(text){
					if (text == "success"){
						$("#datos_compra"+id).html(text);
					} else {
						$("#datos_compra"+id).html(text);
					}
				}
			});
		}
});
$("#RegistroComp").on("keyup", ".TipoCambioPorcentaje", function(){
	var variable = $(this).attr('name');
	let id = variable.substring(variable.indexOf("-"));
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
	var cam=$("#cambio"+id).val();
	//alert(tip);
	if(tip=="soles")
		{
			var cam=$("#cambio"+id).val();
			$.ajax({
				type: "POST",
				url: "calculo_pago_cambio.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id + "&cambio=" + cam,
				success : function(text){
					if (text == "success"){
						$("#datos_cambio"+id).html(text);
					} else {
						$("#datos_cambio"+id).html(text);
					}
				}
			});
		}
	if(tip=="dolares")
		{
			$.ajax({
				type: "POST",
				url: "calculo_pago.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id,
				success : function(text){
					if (text == "success"){
						$("#datos_compra"+id).html(text);
					} else {
						$("#datos_compra"+id).html(text);
					}
				}
			});
		}
});
$("#RegistroComp").on("keyup", ".TipoCambioGramos", function(){
	var variable = $(this).attr('name');
	let id = variable.substring(variable.indexOf("-"));
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
	var cam=$("#cambio"+id).val();
	//alert(tip);
	if(tip=="soles")
		{
			var cam=$("#cambio"+id).val();
			$.ajax({
				type: "POST",
				url: "calculo_pago_cambio.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id + "&cambio=" + cam,
				success : function(text){
					if (text == "success"){
						$("#datos_cambio"+id).html(text);
					} else {
						$("#datos_cambio"+id).html(text);
					}
				}
			});
		}
	if(tip=="dolares")
		{
			$.ajax({
				type: "POST",
				url: "calculo_pago.php",
				data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id,
				success : function(text){
					if (text == "success"){
						$("#datos_compra"+id).html(text);
					} else {
						$("#datos_compra"+id).html(text);
					}
				}
			});
		}
});
$("#RegistroComp").on("change",".TipoCamb",function () {
	var variable = $(this).attr('name');
	//$("#codigo").val(variable);
	let id = variable.substring(variable.indexOf("-"));
	//alert("#datos_compra"+id);
	var onz=$("#onza"+id).val();
	var ley=$("#ley"+id).val();
	var por=$("#porcentaje"+id).val();
	var gra=$("#cantidad"+id).val();
	var tip=$("#tipo"+id).val();
    $.ajax({
        type: "POST",
        url: "calculo_pago.php",
        data: "onza=" + onz + "&ley=" + ley + "&porcentaje=" + por + "&cantidad=" + gra + "&tipo=" + tip + "&id=" + id,
        success : function(text){
            if (text == "success"){
				$("#datos_compra"+id).html(text);
            } else {
                $("#datos_compra"+id).html(text);
            }
        }
    });
	//alert($("#"+variable).val());
});
</script>