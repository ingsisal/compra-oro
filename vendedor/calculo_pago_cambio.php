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
$cam=$_POST['cambio'];
$c_onza=$onz/31.1035;
$c_ley=$c_onza*$ley;
$c_porcentaje=$c_ley-(($por*$c_ley)/100);
$c_dolar=$c_porcentaje*$can;
$soles=bcdiv($c_porcentaje*$cam,'1',1);
/*echo $c_onza."<br>";
echo $c_ley."<br>";
echo $c_porcentaje."<br>";
echo $c_dolar."<br>";
echo $soles."<br>";*/
//echo "<b>".$c_dolar."</b>";
//echo "<h6>".bcdiv(bcdiv($c_dolar*$cam,'1',2)/$can,'1',2)."</h6>";
//echo " - S/. ".bcdiv($c_dolar*$cam,'1',2);
if($cam=="")
{
	echo '<code class="font-bold col-pink">Error..!</code>';
}
else
{
?>
<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h6><?php echo bcdiv($c_porcentaje*$cam,'1',1);?></h6>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
		<h4><b>S/. <?php echo bcdiv($soles*$can,'1',2);?></b></h4>
	</div>
</div>
<?php
}
?>