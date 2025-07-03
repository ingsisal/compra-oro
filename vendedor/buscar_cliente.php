<?php
include("../includes/conector.php");
$link=conectarse();
$dni=$_POST['dni'];
$cliente=mysqli_query($link,"select * from clientes where identificacion_cli='$dni'");
if($cli=mysqli_fetch_assoc($cliente))
{
	?>
<input name="cliente" type="hidden" id="cliente" value="<?php echo $cli['codigo_cli']?>">
<h3><?php echo $cli['nombres_cli'].", ".$cli['apellidos_cli'];?></h3>
<?php
}
else
{
	?>
<input name="cliente" type="hidden" id="cliente" value="NUEVO">
<div class="col-lg-6 col-xs-12">
	<div class="form-group">
		<div class="form-line">
			<input name="nombres" type="text" class="form-control" id="nombres" placeholder="Ingrese Nombres">
		</div>
	</div>
</div>
<div class="col-lg-6 col-xs-12">
	<div class="form-group">
		<div class="form-line">
			<input name="apellidos" type="text" class="form-control" id="apellidos" placeholder="Ingrese Apellidos">
		</div>
	</div>
</div>
<?php
}
?>