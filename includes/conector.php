<?php
function conectarse()
{
	if(!($link=mysqli_connect("localhost","mcworlh9_rdb","H2a2b2ha.2024")))
//	if(!($link=mysqli_connect("localhost","emteltsc_sistema","h2a2b2ha")))
	{
		echo "Error en coneccion con la base de datos...";
		exit();
	}
//	if(!mysqli_select_db($link,"emteltsc_sistema"))
	if(!mysqli_select_db($link,"mcworlh9_db"))
	{
		echo "Error en la seleccion de la base de datos";
		exit();
	}
	return $link;
}
?>
