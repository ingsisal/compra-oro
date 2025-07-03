<?php
//$url="http://192.168.43.234/italy-sistema/";
$url="https://mcword-trading.com/";
$titulo="VENTA DE ORO";
$sistema="MC WORD TRADING";
$direccion="Jr. Moquegua";
$version="v2.0";
$nom_sis="PARS v2.0";
$PUNTERO="onMouseOver=this.style.background='rgba(255,0,0,0.5)' onMouseOut=this.style.background='rgba(255,255,255,0.1)'";
$cancelar="onClick=\"enviarFormulario('".$url."includes/centro.php','frmgeneral','base_principal')\"";
$cer_pop='value="Cerrar Ventana (ESC)" onClick="hide(\'popDiv\')"';
$can_pop='value="Cancelar (ESC)" onClick="hide(\'popDiv\')"';
define("USER", "mcworlh9_rdb");
define("SERVER", "localhost");
define("BD", "mcworlh9_db");
define("PASS", "H2a2b2ha.2024");
function conectarse()
{
	if(!($link=mysqli_connect(SERVER,USER,PASS)))
	{
		echo "Error en coneccion con la base de datos...";
		exit();
	}
	if(!mysqli_select_db($link,BD))
	{
		echo "Error en la seleccion de la base de datos";
		exit();
	}
	return $link;
}
/* Clase para ejecutar las consultas a la Base de Datos*/
class ejecutarSQL {
    public static function conectar(){
        if(!$con=  mysqli_connect(SERVER,USER,PASS)){
            die("Error en el servidor, verifique sus datos");
        }
        if (!mysqli_select_db($con,BD)) {
            die("Error al conectar con la base de datos, verifique el nombre de la base de datos");
        }
        /* Codificar la información de la base de datos a UTF8*/
        //mysql_set_charset('utf8',$con);
        return $con;  
    }
    public static function consultar($query) {
		//echo ejecutarSQL::conectar();
        if (!$consul = mysqli_query(ejecutarSQL::conectar(),$query)) {
            die(mysqli_error().'Error en la consulta SQL ejecutada');
        }
        return $consul;
    }  
}
/* Clase para hacer las consultas Insertar, Eliminar y Actualizar */
class consultasSQL{
    public static function InsertSQL($tabla, $campos, $valores) {
        if (!$consul = ejecutarSQL::consultar("insert into $tabla ($campos) VALUES($valores)")) {
            die("Ha ocurrido un error al insertar los datos en la tabla $tabla");
        }
        return $consul;
    }
    public static function DeleteSQL($tabla, $condicion) {
        if (!$consul = ejecutarSQL::consultar("delete from $tabla where $condicion")) {
            die("Ha ocurrido un error al eliminar los registros en la tabla $tabla");
        }
        return $consul;
    }
    public static function UpdateSQL($tabla, $campos, $condicion) {
        if (!$consul = ejecutarSQL::consultar("update $tabla set $campos where $condicion")) {
            die("Ha ocurrido un error al actualizar los datos en la tabla $tabla");
        }
        return $consul;
    }
}
?>
