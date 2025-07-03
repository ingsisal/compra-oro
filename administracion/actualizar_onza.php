<?php
include("../includes/configuracion.php");
session_start();
date_default_timezone_set('America/Lima');
$registro=date('Y-m-d H:i:s', time());
    function curl($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $info = curl_exec($ch);
        curl_close($ch);
        return $info;
    }

    $sitioweb = curl("https://m.netdania.com/commodities/xauusdoz/idc");
    $archivo = fopen("datos.txt","w+");
    fwrite($archivo,$sitioweb);
$pagina = file_get_contents('datos.txt');
$findme = "recid-1-f6";
$pos = strpos($pagina, $findme);
$cadena="Ejemplo de Prueba";
$kitco=substr($pagina, $pos+12,7);
$kitco = str_replace ( ",", '', $kitco);
echo '<input type="hidden" value="'.$kitco.'">';
$ejecutar=ejecutarSQL::consultar("update precios set estado_pre='0'");
$c=10000001;
$sql=ejecutarSQL::consultar("select * from precios");
while($s=mysqli_fetch_assoc($sql))
{
	$onza=$s['onza_pre'];
	$c++;
}

// Nótese el uso de ===. Puesto que == simple no funcionará como se esperatext.replace(" ","")
if ($pos === false) {
    //echo "<br>La cadena '$findme' no fue encontrada en la cadena dada";
	if(consultasSQL::InsertSQL("precios" ,"onza_pre,registro_pre,usuario_pre,estado_pre","'$onza','$registro','".$_SESSION['codigo']."','1'"))
	{
		echo ' Valor de Onza <b>'.$onza.'</b><br><code style="font-size:10px;">Extraido de Sistema '."</code>";
	}
} else {
    /*echo "<br>La cadena '$findme' fue encontrada en la cadena dada";
    echo " y existe en la posición $pos";*/
	if(consultasSQL::InsertSQL("precios" ,"onza_pre,registro_pre,usuario_pre,estado_pre","'$kitco','$registro','".$_SESSION['codigo']."','1'"))
	{
		echo ' Valor de Onza <b>'.$kitco.'</b><br><code style="font-size:10px;">Actualizada: '.$registro."</code>";
	}
}
?>