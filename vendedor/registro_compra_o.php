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
$sql_pendiente=ejecutarSQL::consultar("select * from reservas inner join detalle_reservas on reservas.codigo_com=detalle_reservas.codigo_com where reservas.codigo_com='$cod'");
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
                                Registro de Compra Reservada por Onza
                                <small>Confirmar Registro</small>
                            </h2>
                        </div>
                        <div class="body">
                                <div class="col-lg-3 col-xs-12">
                                    <h2 class="card-inside-title">Codigo de Venta</h2>
                                    <div class="form-group">
                                        <div class="form-line" id="bs_datepicker_container">
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
                                    </tr>
                                </thead>
                                <tbody>
<?php
$c=1;
$entrega=0;$sald=0;
$sql_datos=ejecutarSQL::consultar("select * from detalle_reservas where codigo_com='$cod'");
while($pd=mysqli_fetch_assoc($sql_datos))
{
	//echo $pd['id_com'];
?>
                                    <tr>
                                        <th><?php echo $c?></th>
                                        <td><input name="onza-<?php echo $c?>" type="number" class="form-control Onza" id="onza-<?php echo $c?>" placeholder="Ingresar ONZA" value="<?php echo $onz?>"></td>
                                        <td><input name="ley-<?php echo $c?>" type="number" class="form-control" id="ley-<?php echo $c?>" placeholder="Ingresar Ley" value="<?php echo $pd['ley_com']?>"></td>
                                        <td><input name="porcentaje-<?php echo $c?>" class="form-control" type="text" id="porcentaje-<?php echo $c?>" placeholder="Ejemplo: 5,2,4" value="<?php echo $pd['porcentaje_com']?>"></td>
										<td><input name="cantidad-<?php echo $c?>" class="form-control" type="text" id="cantidad-<?php echo $c?>" placeholder="Ejemplo: 5,2,4" value="<?php echo $pd['cantidad_com']?>"></td>
										<td style="text-transform: capitalize;" class="text-primary">
<input type="hidden" value="<?php echo $pd['tipo_com']?>" id="tipo-<?php echo $c?>" name="tipo-<?php echo $c?>">											
											
<?php
if($pd['tipo_com']=="soles")
{
	//echo $pd['tipo_com'];
	?>
<div class="col-lg-6 col-xs-6">
<h4 style="margin: 0px;"><?php echo $pd['tipo_com']?></h4>
</div>
<div class="col-lg-6 col-xs-6">
<input name="cambio-<?php echo $c?>" class="form-control" type="text" id="cambio-<?php echo $c?>" placeholder="Ejemplo: 5,2,4" value="<?php echo $pd['cambio_com']?>">
</div>
	<?php
}
if($pd['tipo_com']=="dolares")
{
	?>
<div class="col-lg-12 col-xs-12">
<h4 style="margin: 0px;"><?php echo $pd['tipo_com']?></h4>
</div>
</div>
	<?php
}
?>
											</td>
										<td id="datos_compra-<?php echo $c?>"></td>
                                    </tr>
<?php
	$entrega=$entrega+bcdiv($pd['descuento_com'],'1',2);
 	$sald=$sald+bcdiv($pd['total_com'],'1',2);
	$c++;
}
$saldo=$sald-$entrega;
?>
                                    <tr>
                                        <th colspan="2" rowspan="3" align="center" valign="middle">
								<button type="button" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float CalcularOnza">
                                    <i class="material-icons">refresh</i>
                                </button></th>
                                        <th>Monto Entregado</th>
										<td align="right" class="text-danger"><input type="hidden" value="<?php echo bcdiv($entrega,'1',2)?>" id="entregado" name="entregado"><h4 style="margin: 0px;"><?php echo bcdiv($entrega,'1',2)?></h4>
										<th>Precio unitario</th>
										<td align="right" class="text-danger"><h4 style="margin: 0px;" id="Unitario">-</h4></td>
                                    </tr>
									<tr>
                                        <th>Saldo</th>
										<td align="right" class="text-success"><h4 style="margin: 0px;"><?php echo bcdiv($saldo,'1',2)?></h4>
										<th>Nuevo Total</th>
										<td align="right" class="text-success"><h4 style="margin: 0px;" id="Nuevo">-</h4></td>
                                    </tr>
									<tr>
                                        <th>TOTAL</th>
										<td align="right" class="text-primary"><input type="hidden" value="<?php echo bcdiv($sald,'1',2)?>" id="total"><h4 style="margin: 0px;"><?php echo bcdiv($sald,'1',2)?></h4>
										<th>A Pagar</th>
										<td align="right" class="text-success"><input type="hidden" value="" name="SaldoaPagar" id="SaldoaPagar"><h4 style="margin: 0px;" id="Saldo">-</h4></td>
                                    </tr>
                                </tbody>
                            </table>
							<input type="hidden" name="cantidadC" id="cantidadC" value="<?php echo $c-1?>">
							<div id="botones">
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_compra_r_final.php?codigo=<?php echo $cod?>','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_compra_r_final.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Completar Compra Reservada</button>
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
$("#RegistroComp").on("keyup click", ".Onza", function(){
	var id = $(this).attr('name');
	//alert(variable);
	var fin=$("#"+id).val();
for(var i=1;i<=fin;i++)
	{
		//alert(i);
	var onz=$("#onza-"+i).val();
	var ley=$("#ley-"+i).val();
	var por=$("#porcentaje-"+i).val();
	var gra=$("#cantidad-"+i).val();
	var cam=$("#cambio-"+i).val();
	var tip=$("#tipo-"+i).val();
	var tot=$("#total").val();
	var ent=$("#entregado").val();
var c_onza=onz/31.1035;
var c_ley=c_onza*ley;
var c_procentaje=c_ley-((por*c_ley)/100);
var c_dolar=c_procentaje.toFixed(2)*gra;
if(tip=="soles")
	{
		var uni=(c_procentaje.toFixed(1)*1)*cam;
		var tota=c_dolar*cam;
		var sal=tota-ent;
		$("#Unitario").text(uni.toFixed(2));
		$("#Nuevo").text(tota.toFixed(2));
		$("#Saldo").text(sal.toFixed(2));
		$("#SaldoaPagar").val(sal.toFixed(2));
	}
if(tip=="dolares")
	{
		var uni=c_procentaje.toFixed(2)*1;
		var tota=c_dolar;
		var sal=tota-ent;
		$("#Unitario").text(uni.toFixed(2));
		$("#Nuevo").text(tota.toFixed(2));
		$("#Saldo").text(sal.toFixed(2));
		$("#SaldoaPagar").val(sal.toFixed(2));
	}
}
	/*
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=$c_ley-(($por*$c_ley)/100);
$c_dolar=$c_procentaje*$can;
	*/


	
});
$("#RegistroComp").on("click", ".CalcularOnza", function(){
	var variable = $(this).attr('name');
//alert(variable);
	var onz=$("#onza").val();
	var ley=$("#ley").val();
	var por=$("#porcentaje").val();
	var gra=$("#cantidad").val();
	var cam=$("#cambio").val();
	var tip=$("#tipo").val();
	var tot=$("#total").val();
	var ent=$("#entregado").val();
	/*
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=$c_ley-(($por*$c_ley)/100);
$c_dolar=$c_procentaje*$can;
	*/
var c_onza=onz/31.1035;
var c_ley=c_onza*ley;
var c_procentaje=c_ley-((por*c_ley)/100);
var c_dolar=c_procentaje.toFixed(2)*gra;
if(tip=="soles")
	{
		var uni=(c_procentaje.toFixed(1)*1)*cam;
		var tota=c_dolar*cam;
		var sal=tota-ent;
		$("#Unitario").text(uni.toFixed(2));
		$("#Nuevo").text(tota.toFixed(2));
		$("#Saldo").text(sal.toFixed(2));
		$("#SaldoaPagar").val(sal.toFixed(2));
	}
if(tip=="dolares")
	{
		var uni=c_procentaje.toFixed(2)*1;
		var tota=c_dolar;
		var sal=tota-ent;
		$("#Unitario").text(uni.toFixed(2));
		$("#Nuevo").text(tota.toFixed(2));
		$("#Saldo").text(sal.toFixed(2));
		$("#SaldoaPagar").val(sal.toFixed(2));
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