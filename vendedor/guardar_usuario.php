<?php
include("../includes/configuracion.php");
session_start();
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
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
        $textoEncriptado .= ($mensage{$i} ^ $clave{$i % $j});
    } while ($i--);
    $textoEncriptado = base64_encode(base64_encode(strrev($textoEncriptado)));
    return $textoEncriptado;
}
$errorMSG = "";
?>
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="defaultModalLabel"><?php echo $sistema?></h4>
		</div>
		<div class="modal-body">
<?php
if ($_POST["Udni"]=="") {
    $errorMSG .= "Campo DNI Requerido<br>";
} else {
    $dni = $_POST["Udni"];
}
if (empty($_POST["Ucorreo"])) {
    $errorMSG .= "Campo Correo Requerido<br>";
} else {
    $correo = $_POST["Ucorreo"];
}
if (empty($_POST["Unombre"])) {
    $errorMSG .= "Campo Nombre Requerido<br>";
} else {
    $nombre = $_POST["Unombre"];
}
if (empty($_POST["Uapellido"])) {
    $errorMSG .= "Campo Apellido Requerido<br>";
} else {
    $apellido = $_POST["Uapellido"];
}
if (empty($_POST["Udireccion"])) {
    $errorMSG .= "Campo Direccion Requerido<br>";
} else {
    $direccion = $_POST["Udireccion"];
}
if (empty($_POST["Utelefono"])) {
    $errorMSG .= "Campo Telefono Requerido<br>";
} else {
    $telefono = $_POST["Utelefono"];
}
if (empty($_POST["Univel"])) {
    $errorMSG .= "Campo Nivel Requerido<br>";
} else {
    $nivel = $_POST["Univel"];
}

//echo "'$mesa','$usuario','$pedro','$keiko','$nulo','$blanco'";
if ($errorMSG == ""){
	//echo "insert into votos (Mesa, Usuario, Catillo, Keiko, Nulo, Blanco)valus ('$mesa','$usuario','$pedro','$keiko','$nulo','$blanco')";
	$verificar=  ejecutarSQL::consultar("select * from usuarios where dni_usu='".$correo."'");
	$verificaltotal = mysqli_num_rows($verificar);
	if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("usuarios", "dni_usu,nombre_usu,apellido_usu,correo_usu,clave_usu,telefono_usu,direccion_usu,nivel_usu,tienda_usu,registro_usu,estado_usu", "'$dni','$nombre','$apellido','$correo','".encriptar($dni,"dublin")."','$telefono','$direccion','$nivel','0','$registro','1'")){
            echo '<p class="col-green">Usuario Registrado Correctamente</p>';
        }else{
           echo '<p class="col-red">Por favor intente nuevamente</p>'; 
        }
	}
	else
	{
         echo 'El nombre "'.$nombre.'" ya fue Registrado '; 
	}

}else{
    if($errorMSG == ""){
        echo "Algo salió mal :(";
    } else {
        echo $errorMSG;
    }
}
?>
		</div>
		<div class="modal-footer">
			<!--button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button-->
			<button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cerrar Ventana</button>
		</div>
	</div>
</div>