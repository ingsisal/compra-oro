<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
$cod=$_GET['codigo'];
echo "<h3>".$sistema."</h3>";
echo "Numero de Comprobante: <b>".$cod."</b><br>";
?>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td>Nº</td>
      <td>PESO</td>
		<td>LEY</td>
      <td>P. UNIT.</td>
      <td>SUBTOTAL</td>
    </tr>
<?php
$cv=1;
$total=0;
	 //echo "select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compras.comprobante_com='$cod'";
$venta=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compras.comprobante_com='$cod'");
while($v=mysqli_fetch_assoc($venta))
{
	$cliente=$v['cliente_com'];
	$fecha=$v['registro_com'];
$c_onza=$v['onza_com']/31.1035;
$c_ley=$c_onza*$v['ley_com'];
$c_procentaje=bcdiv($c_ley-(($v['porcentaje_com']*$c_ley)/100),'1',2);
$c_dolar=$c_procentaje*1;
	$total=$total+bcdiv($v['total_com'],'1',2);
?>
    <tr>
      <td><?php echo $cv;?></td>
      <td><?php echo $v['cantidad_com']?></td>
	  <td><?php echo $v['ley_com']?></td>
      <td><?php if($v['tipo_com']=="dolares"){echo "$. ".bcdiv($c_dolar,'1',2);}if($v['tipo_com']=="soles"){echo "S/. ".bcdiv($c_dolar*$v['cambio_com'],'1',2);}?></td>
      <td align="right"><?php echo bcdiv($v['total_com'],'1',2)?></td>
    </tr>	  
<?php
}
?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>TOTAL</td>
      <td align="right"><b><?php echo bcdiv($total,'1',2);?></b></td>
    </tr>
  </tbody>
</table>
<p>Cliente: <?php echo $cliente?></p>
<p>Registro: <?php echo $fecha?></p>
