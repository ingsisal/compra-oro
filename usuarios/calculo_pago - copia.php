<?php
include("../includes/configuracion.php");
include("../includes/numeros_a_letras.php");
include("../includes/numeros_a_letras_dolares.php");
$link=conectarse();
$ley=$_POST['ley'];
$por=$_POST['porcentaje'];
$opc=$_GET['opcion'];
$onz=$_POST['onza'];
$can=$_POST['cantidad'];
$c_onza=bcdiv($onz/31.1035, '1', 2);
$c_ley=bcdiv($c_onza*$ley, '1', 2);
$c_procentaje=bcdiv($c_ley-(($por*$c_ley)/100), '1', 2);
$c_dolar=bcdiv($c_procentaje*$can, '1', 2);
if($opc=="soles")
{
?>
<input type="hidden" value="<?php echo $opc?>" name="opcion" id="opcion">
	<div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
		<label for="email_address_2">Ingresar Tipo de Cambio</label>
	</div>
	<div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
			<input name="pdolares" class="form-control" type="text" id="pdolares" placeholder="Ejemplo: 3.1416" onKeyUp="enviarFormulario('calculo_pago.php?opcion=csoles','frmgeneral','calculo_soles')">
	</div>
	<div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
		<label for="email_address_2">Total a Pagar</label>
	</div>
	<div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
			<div id="calculo_soles">...</div>
	</div>

<?php
}
if($opc=="dolares")
{
?>
<input type="hidden" value="<?php echo $opc?>" name="opcion" id="opcion">
	<div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
		<label for="email_address_2">Total a Pagar</label>
	</div>
	<div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
		<div class="form-group">
			<div id="respuesta_calculo"><h2 style="margin-top:0px;"><b>$. <?php echo $c_dolar?></b></h2><h5 style="margin-top:0px;"><b><?php echo numtoletras_dolar($c_dolar)?></b></h5></div>
		</div>
	</div>
<?php
}
if($opc=="csoles")
{
if($_POST['pdolares']=="")
{
	$pdol=0;
}
else
{
	$pdol=$_POST['pdolares'];
}
$total=$pdol*$c_dolar;
	echo '<h2 style="margin-top:0px;"><b>S/. '.bcdiv($total,'1',2)."</b></h2>";
	echo '<h5 style="margin-top:0px;"><b>SON: '.numtoletras(bcdiv($total,'1',2))."</b></h5>";
}
?>