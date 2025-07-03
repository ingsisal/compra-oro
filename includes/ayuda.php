<?php include("../includes/configuracion.php")?>
<?php include("../includes/conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
$niv=$_SESSION['nivel_P'];
if($niv==1 || $niv==2)
{
	$cod=$_SESSION['codigo_S'];
	$result=mysqli_query($link,"select * from operadores where operadores.codigo_ope='$cod'");
	while($row=mysqli_fetch_assoc($result))
	{
		$nom=$row['nombres_ope'];
		$ape=$row['apellidos_ope'];
		$perfil=$row['perfil_ope'];
	}
}
if($niv==3)
{
	$cod=$_SESSION['codigo_S'];
	$result=mysqli_query($link,"select * from docentes where docentes.codigo_doc='$cod'");
	while($row=mysqli_fetch_assoc($result))
	{
		$nom=$row['nombres_doc'];
		$ape=$row['apellidos_doc'];
		$perfil=$row['perfil_doc'];
	}
}
if($niv==4)
{
	$cod=$_SESSION['codigo_S'];
	$result=mysqli_query($link,"select * from alumnos where alumnos.codigo_alu='$cod'");
	while($row=mysqli_fetch_assoc($result))
	{
		$nom=$row['nombres_alu'];
		$ape=$row['apellidos_alu'];
		$perfil=$row['perfil_alu'];
	}
}

?>
<div class="x_panel">
  <div class="x_title">
	<h2>Ayuda</h2>
	<div class="clearfix"></div>
  </div>
  <div class="x_content">

	<div class="col-md-7 col-sm-7 ">
	  <div class="product-image">
		<img src="<?php echo $url?>build/images/soporte.png" alt="...">
	  </div>
	</div>

	<div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

	  <h3 class="prod_title">Soporte del Sistema</h3>

	  <p>Estimado <?php echo $nom.", ".$ape?> para solucionar alguna duda y apoyo en linea sobre el sistema lo atenderemos de manera inmediata. Escribanos a los Siguientes Correos</p>
	  <br>
		
	<div class="">
		<h2>ingsisal@gmail.com</h2>
		<ul class="list-inline prod_color display-layout">
		  <li>
			<p>Gerente de Desarrollo de Software</p>
		  </li>

		</ul>
	  </div>
	  <br>

	  <br>

	  <div class="">
		<div class="product_price">
		  <h1 class="price">943311780</h1>
		  <span class="price-tax">Soporte Tecnico</span>
		  <br>
		</div>
	  </div>

	  <div class="product_social">
		<ul class="list-inline display-layout">
		  <li><a href="#"><i class="fa fa-facebook-square"></i></a>
		  </li>
		  <li><a href="#"><i class="fa fa-twitter-square"></i></a>
		  </li>
		  <li><a href="#"><i class="fa fa-envelope-square"></i></a>
		  </li>
		  <li><a href="#"><i class="fa fa-rss-square"></i></a>
		  </li>
		</ul>
	  </div>

	</div>

  </div>
</div>