<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
$cod=$_GET['codigo'];
$sql_pendiente=ejecutarSQL::consultar("select * from compras where codigo_com='$cod'");
if($dat=mysqli_fetch_assoc($sql_pendiente))
{
	/*$cantidad=0;
	$total=0;*/
	$sql=ejecutarSQL::consultar("select * from detalle_compras where codigo_com='$cod'");
	while($s=mysqli_fetch_assoc($sql))
	{
		//$cantidad=$cantidad+$s['cantidad_com'];
		//$total=$total+$s['total_com'];
		if($s['tipo_com']=="soles")
		{
			//echo "aumentar soles en caja";
			$total=$s['total_com'];
			mysqli_query($link,"update caja set soles_caj=soles_caj+$total where id_caj='1'");
		}
		if($s['tipo_com']=="dolares")
		{
			//echo "aumentar dolares en caja";
			$total=$s['total_com'];
			mysqli_query($link,"update caja set dolares_caj=dolares_caj+$total where id_caj='1'");
		}
	}
}
mysqli_query($link,"update compras set estado='1' where codigo_com='$cod'");
//mysqli_query($link,"update caja set soles_caj=soles_caj-$total where id_caj='1'");
?>
Eliminado....