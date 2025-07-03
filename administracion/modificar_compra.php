<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$onzas=mysqli_query($link,"select * from precios where estado_pre='1'");
if($onza=mysqli_fetch_assoc($onzas))
{
	$onz=$onza['onza_pre'];
}
$cod=$_GET['codigo_p'];
$sql_pendiente=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compras.codigo_com='$cod'");
if($dat=mysqli_fetch_assoc($sql_pendiente))
{
	$ven=$dat['comprobante_com'];
	$cli=$dat['cliente_com'];
}
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Modificar Compra
                                <small>Modificar Registro</small>
                            </h2>
                        </div>
                        <div class="body">
                                <div class="col-lg-3 col-xs-12">
                                    <h2 class="card-inside-title">Codigo de Venta</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
											<input type="hidden" name="codigo-v" id="codigo-v" value="<?php echo $cod?>">
                                            <input name="venta" type="text" class="form-control" id="venta" value="<?php echo $ven;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-xs-12">
                                    <h2 class="card-inside-title">Datos de Cliente</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input name="datos_c" type="text" class="form-control" id="datos_c" placeholder="Nombres y Apellidos, Razon Social" value="<?php echo $cli?>">
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
										<th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$c=1;
$sql_datos=ejecutarSQL::consultar("select * from detalle_compras where codigo_com='$cod'");
while($pd=mysqli_fetch_assoc($sql_datos))
{
?>
                                    <tr>
                                        <th><input type="hidden" name="id-<?php echo $c?>" id="id-<?php echo $c?>" value="<?php echo $pd['id_com']?>"><input type="hidden" name="monto-<?php echo $c?>" id="monto-<?php echo $c?>" value="<?php echo bcdiv($pd['total_com'],'1',2)?>"><?php echo $c?></th>
                                        <td><input name="onza-<?php echo $c?>" type="number" class="TipoCambioOnza form-control" id="onza-<?php echo $c?>" placeholder="Ingresar ONZA" value="<?php echo $onz?>"></td>
                                        <td><input name="ley-<?php echo $c?>" type="number" class="TipoCambioLey form-control" id="ley-<?php echo $c?>" placeholder="Ingresar Ley" value="<?php echo $pd['ley_com']?>"></td>
                                        <td><input name="porcentaje-<?php echo $c?>" class="TipoCambioPorcentaje form-control" type="text" id="porcentaje-<?php echo $c?>" placeholder="Ejemplo: 5,2,4" value="<?php echo $pd['porcentaje_com']?>"></td>
										<td><input name="cantidad-<?php echo $c?>" class="TipoCambioGramos form-control" type="text" id="cantidad-<?php echo $c?>" placeholder="Ejemplo: 5,2,4" value="<?php echo $pd['cantidad_com']?>"></td>
										<td><select name="tipo-<?php echo $c?>" id="tipo-<?php echo $c?>" class="TipoCamb form-control"><option value="<?php echo $pd['tipo_com']?>"><?php echo $pd['tipo_com']?></option><option value="soles">Soles</option><option value="dolares">Dolares</option></select></td>
										<td id="datos_compra-<?php echo $c?>">
<?php
if($pd['tipo_com']=="dolares")
{
?>
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<h6><?php echo bcdiv(($pd['total_com']/$pd['cantidad_com']),'1',2);?></h6>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h4><b>$. <?php echo bcdiv($pd['total_com'],'1',2);?></b></h4>
	</div>
</div>
<?php
}
if($pd['tipo_com']=="soles")
{
?>
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<input type="text" class="form-control TipoCambio" name="cambio-<?php echo $c?>" id="cambio-<?php echo $c?>" placeholder="4.05" value="<?php echo $pd['cambio_com']?>">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h4 id="datos_cambio<?php echo $c?>"><b>S/. <?php echo bcdiv($pd['total_com'],'1',2)?></b></h4>
	</div>
</div>
<?php
}
?>
										</td>
                                    </tr>
<?php
	$c++;
}
?>
                                </tbody>
                            </table>
							<input type="hidden" name="cantidadC" id="cantidadC" value="<?php echo $c-1;?>">
							<div id="botones">
							<!--button class="btn btn-warning waves-effect" type="button" id="agregaritem">Agregar Item de Compra</button!-->
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_m_compra.php?codigo=<?php echo $cod?>','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_m_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Modificar Compra</button>
							<!--button class="btn btn-danger waves-effect" type="button" onClick="enviarFormulario('guardar_compra_pendiente.php','frmgeneral','defaultModal');enviarFormulario2('cambio_boton_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Reservar Compra</button!-->
							</div>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>
<script>
var iCnt = <?php echo $c?>;
$("#agregaritem").click(function(event) {
iCnt = iCnt + 1;
$('#RegistroComp').append('<tr><th><button type="button" class="eliminar btn btn-danger waves-effect"><i class="material-icons">delete</i></button></th><td><input name="onza-'+iCnt+'" type="number" class="form-control" id="onza-'+iCnt+'" placeholder="Ingresar ONZA" value="<?php echo $onz?>"></td><td><input name="ley-'+iCnt+'" type="number" class="form-control" id="ley-'+iCnt+'" placeholder="Ingresar Ley"></td><td><input name="porcentaje-'+iCnt+'" class="form-control" type="text" id="porcentaje-'+iCnt+'" placeholder="Ejemplo: 5,2,4"></td><td><input name="cantidad-'+iCnt+'" class="form-control" type="text" id="cantidad-'+iCnt+'" placeholder="Ejemplo: 5,2,4"></td><td><select name="tipo-'+iCnt+'" id="tipo-'+iCnt+'" class="TipoCamb form-control"><option value="">Seleccionar</option><option value="soles">Soles</option><option value="dolares">Dolares</option></select></td><td id="datos_compra-'+iCnt+'"></td></tr>');
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