<?php
include("../includes/configuracion.php");
session_start();
$link=conectarse();
//echo $ven="COM-10000001";
$cli=$_POST['datos_c'];
$ven=$_POST['venta'];
$ley=$_POST['ley-1'];
$por=$_POST['porcentaje-1'];
$onz=$_POST['onza-1'];
$can=$_POST['cantidad-1'];
$nitem=$_POST['cantidadC'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
$usuario=$_SESSION['codigo'];
//echo $g24k;
$errorMSG="";
if($ley=="" || $por=="" || $onz=="" || $can=="" || $cli=="" || $_POST['tipo-1']=="")
{
?>
<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_m_compra.php?codigo=<?php echo $cod?>','frmgeneral','defaultModal');enviarFormulario2('cambio_botones_m_compra.php','frmgeneral','botones')" data-toggle="modal" data-target="#defaultModal">Modificar Compra</button>
<?php
}
if($ley!="" && $por!="" && $onz!="" && $can!="" && $cli!="" && $_POST['tipo-1']!="")
{
?>
<button class="btn btn-success waves-effect" type="button" onClick="ImprimirComprobante('<?php echo $ven?>')">Imprimir Venta</button>
<?php
}
?>
<div id="imprimir-venta" style="display: none;">
<?php
echo $sistema;
echo "<br>Numero de Comprobante: ".$ven;
?>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td>Nº</td>
      <td>PESO</td>
      <td>P. UNIT.</td>
      <td>SUBTOTAL</td>
    </tr>
<?php
$cv=1;
$total=0;
$venta=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where compras.comprobante_com='$ven'");
while($v=mysqli_fetch_assoc($venta))
{
$c_onza=$v['onza_com']/31.1035;
$c_ley=$c_onza*$v['ley_com'];
$c_procentaje=$c_ley-(($v['porcentaje_com']*$c_ley)/100);
$c_dolar=$c_procentaje*1;
	$total=$total+$v['total_com'];
?>
    <tr>
      <td><?php echo $cv;?></td>
      <td><?php echo $v['cantidad_com']?></td>
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
</div>
