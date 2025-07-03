<?php
include("../includes/configuracion.php");
include("../includes/numeros_a_letras.php");
include("../includes/numeros_a_letras_dolares.php");
$link=conectarse();
$id=$_POST['id'];
$ley=$_POST['ley'];
$por=$_POST['porcentaje'];
$opc=$_POST['tipo'];
$onz=$_POST['onza'];
$can=$_POST['cantidad'];
//echo "<b>".$c_dolar."</b>";
if($ley=="" || $por=="" || $opc=="" || $onz=="" || $can=="")
{
	echo '<code class="font-bold col-pink">Error..!</code>';
}
else
{
	//echo "opcion".$opc;
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_procentaje=bcdiv($c_ley-(($por*$c_ley)/100),'1',2);
$c_dolar=$c_procentaje*$can;
if($opc=="dolares")
{
?>
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<h6><?php echo $c_procentaje;?></h6>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h4><b>$. <?php echo bcdiv($c_dolar,'1',2);?></b></h4>
	</div>
</div>
<?php
}
if($opc=="soles")
{
?>
<div class="row clearfix">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
		<input type="text" class="form-control TipoCambio" name="cambio<?php echo $id?>" id="cambio<?php echo $id?>" placeholder="4.05">
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
		<h4 id="datos_cambio<?php echo $id?>"><b>S/. 0.0</b></h4>
	</div>
</div>
<?php
}	
}

?>
