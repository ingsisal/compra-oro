<?php include("../includes/configuracion.php");?>
<?php include("../includes/conector.php");?>
<?php
session_cache_limiter();
session_start();
$opc=$_GET['opcion'];
$link=conectarse();
//echo $p_cod;

if($opc=="provincia")
{
	$cod_reg=$_POST['region'];
?>
<select name="provincia" id="provincia" class="form-control" onChange="enviarFormulario('<?php echo $url?>includes/datos_ubicacion.php?opcion=distrito','frmregistro','distrito')">
<option value="">Seleccionar...</option>
<?php
$sql_pais=mysqli_query($link,"select * from provincias where codigo_reg='$cod_reg'");
while($pais=mysqli_fetch_assoc($sql_pais))
{
?>
  <option value="<?php echo $pais['codigo_pro']?>"><?php echo $pais['nombre_pro']?></option>
<?php
}
}
?>
</select>
<?php
if($opc=="distrito")
{
	$cod_pro=$_POST['provincia'];
?>
<select name="distrito" id="distrito" class="form-control">
<option value="">Seleccionar...</option>
<?php
$sql_pais=mysqli_query($link,"select * from distritos where codigo_pro='$cod_pro'");
while($pais=mysqli_fetch_assoc($sql_pais))
{
?>
  <option value="<?php echo $pais['codigo_dis']?>"><?php echo $pais['nombre_dis']?></option>
<?php
}
}
?>
</select>