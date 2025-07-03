<?php
include("../includes/configuracion.php");
session_start();
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
class Encrypter {
    private static $Key = "dublin";
    public static function encrypt ($input) {
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))));
        return $output;
    }
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
$cod=$_POST['codigo'];
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
    if(consultasSQL::UpdateSQL("usuarios", "nombre_usu='$nombre',apellido_usu='$apellido',correo_usu='$correo',telefono_usu='$telefono',direccion_usu='$direccion',nivel_usu='$nivel'","id_usu='$cod'")){
            echo '<p class="col-green">Usuario Registrado Correctamente</p>';
        }else{
           echo '<p class="col-red">Por favor intente nuevamente</p>'; 
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