<?php
include("../includes/conector.php");
$link=conectarse();
$cal=$_POST['calidad'];
date_default_timezone_set('America/Lima');
$reg=date('Y-m-d', time());
$calidad=mysqli_query($link,"select * from quilates where id_qui='$cal'");
if($c=mysqli_fetch_assoc($calidad))
{
	$qui=substr($c['nombre_qui'],0,-1);
}
$campo="gramo".$qui."_det";
//echo "select * from precios inner join detalle_precio on precios.codigo_pre=detalle_precio.precio_det where registro_pre like '".$reg."%'";
$precio=mysqli_query($link,"select * from precios inner join detalle_precio on precios.codigo_pre=detalle_precio.precio_det where registro_pre like '".$reg."%'");
if($pre=mysqli_fetch_assoc($precio))
{
	$Pfinal=$pre[$campo];
}
?>
<input name="precio" type="hidden" id="precio" value="<?php echo $Pfinal?>">
<h2><?php echo $Pfinal?></h2>