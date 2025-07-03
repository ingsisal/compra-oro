<?php
include("conector.php");
session_start();
$link=conectarse();
mysqli_query($link,"update operadores set termino_ope='SI' where codigo_ope='".$_SESSION['codigo_S']."'");
?>
<div class="green"><h6>Terminos y Condiciones de Uso Fue Aceptado por : <?php echo $_SESSION['nombres'];?></h6><div>