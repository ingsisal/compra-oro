<?php
include("configuracion.php");
function encriptar($mensage, $clave)
{
    $textoEncriptado = "";
    settype($mensage, "string");
    $i = strlen($mensage) - 1;
    $j = strlen($clave);
    if (strlen($mensage) <= 0) {
        return "";
    }
    do {
        $textoEncriptado .= ($mensage[$i] ^ $clave[$i % $j]);
    } while ($i--);
    $textoEncriptado = base64_encode(base64_encode(strrev($textoEncriptado)));
    return $textoEncriptado;
}
$link=conectarse();

$usu=$_POST['usuario'];
$pas=encriptar($_POST['clave'],"dublin");
//$opc=$_POST['opcion'];

$ip=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
//echo $usu.encriptar($_POST['clave'],'dublin');
if($usu=="")
{
	//echo "<div class=mensaje-invalido>Debe Ingresar dato en Usuario</div>";
	header("location:$url");
}
if($pas=="")
{
	//echo "<div class=mensaje-invalido>Debe Ingresar dato en Contraseña</div>";
	header("location:$url");
}
if($usu!="" && $pas!="")
{
		$admin=ejecutarSQL::consultar("SELECT * FROM operadores WHERE usuario_ope='$usu' and clave_ope='$pas'");
		$user=ejecutarSQL::consultar("SELECT * FROM usuarios WHERE dni_usu='$usu' and clave_usu='$pas'");
		if($row=mysqli_fetch_assoc($admin))
		{
			//echo "adminsitrador";
			session_start();
			$_SESSION['nivel']="USUARIO";
			$_SESSION['codigo']=$row['codigo_ope'];
			$_SESSION['nombre']=$row['nombres_ope'];
			$_SESSION['apellido']=$row['apellidos_ope'];
			//$_SESSION['tienda']=CURL_HTTP_VERSION_2_0;
			$ruta=$url."administracion/";
			header("location:$ruta");
		}
		else if($row=mysqli_fetch_assoc($user))
		{
			//echo "usuarios";
			session_start();
			$_SESSION['nivel']=$row['nivel_usu'];
			$_SESSION['codigo']=$row['id_usu'];
			$_SESSION['nombre']=$row['nombre_usu'];
			$_SESSION['apellido']=$row['apellido_usu'];
			$_SESSION['tienda']=$row['tienda_usu'];
			if($row['nivel_usu']=="admin")
			{
				//echo "admin";
				$ruta=$url."usuarios/";
				header("location:$ruta");
			}
			if($row['nivel_usu']=="vendedor")
			{
				//echo "vendedor";
				$ruta=$url."vendedor/";
				header("location:$ruta");
			}
		}
		else{
			//echo "no existe";
				$ruta=$url."?mensaje=Usuario no Existe";
				header("location:$ruta");
			}
		mysqli_close($link);
}
//header("location:$url");
?>
<!--meta http-equiv=refresh content=1;URL=pruebad.php-->