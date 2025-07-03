<?php session_start();?>
<?php include("configuracion.php");?>
<link href="<?php echo $url?>css/ext-all.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
<?php
$link=conectarse();
if(!isset($_SESSION)){
header("location:$URL");
} else {
session_unset();
session_destroy();
?>
<table width="100%" height="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td>
<?php
echo "<center><font size=5 face=arial><b>".$sistema." esta Cerrando Sesion...</b></font>";
//echo "<br><img src=\"".$url."img/loading.gif\" /><br>";
echo "<span class=texto>Si desea Ingresar Rapidamente al Sistema<br> haga click </span><span class=link_a> <a href=\"".$url."\">aqui para loguearte</a></center>";
echo "<meta http-equiv=\"refresh\" content=\"2;URL=".$url."\" />";
}
?>
</td>
  </tr>
</table>