<?php
include("../includes/configuracion.php");
session_start();
date_default_timezone_set('America/Lima');
$fecha=date('Y-m-d', time());
if($_SESSION!=NULL){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $titulo." | ".$sistema?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo $url;?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo $url;?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo $url;?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo $url;?>plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo $url;?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo $url;?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
<form id="frmgeneral" name="frmgeneral" method="post">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Espere Porfavor...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="INICIAR BUSQUEDA...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"><?php echo $titulo." | ".$sistema?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu Principal</li>
                    <li class="active">
                        <a href="<?php echo $url?>">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="icon-asset material-icons ng-star-inserted">account_circle</i>
                            <span>Usuarios</span>
                        </a>
						<ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('nuevo_usuario.php','frmgeneral','principal')">
                                    <span>Nuevo Usuario</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('listado_usuarios.php','frmgeneral','principal')">
                                    <span>Lista de Usuarios</span>
                                </a>
                            </li>
                            <!--li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('estadistica_usuarios.php','frmgeneral','principal')">
                                    <span>Estadistica de Usuarios</span>
                                </a>
                            </li!-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assessment</i>
                            <span>Onza</span>
                        </a>
						<ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('actualizar_precios.php','frmgeneral','principal')">
                                    <span>Actualizar Datos Onza</span>
                                </a>
                            </li>
                            <!--li>
                                <a href="javascript:void(0);">
                                    <span>Estadistica de Precios</span>
                                </a>
                            </li-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance_wallet</i>
                            <span>Caja</span>
                        </a>
						<ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" id="caja">
                                    <span>Caja</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('registro_gasto.php','frmgeneral','principal')">
                                    <span>Registro de Gastos</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('lista_ingresos.php','frmgeneral','principal')">
                                    <span>Lista de Ingresos de Saldo</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);" onClick="enviarFormulario('reporte_caja.php','frmgeneral','principal')">
                                    <span>Reporte de Caja</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="oro">
                                    <span>Reporte de Oro</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="reiniciar">
                                    <span>Reiniciar Sistema</span>
                                </a>
                            </li>
                            <!--li>
                                <a href="javascript:void(0);">
                                    <span>Estadistica de Precios</span>
                                </a>
                            </li-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">monetization_on</i>
                            <span>Compras</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" id="registrocompra">Nueva Compra</a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="compraoro">Registro Material</a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="registrocompraonza">Compra Temporal de Onza</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" id="listacompras">Lista de Compras</a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="listacompra" >Lista de Compras Pendientes</a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="listacomprareserva" >Lista de Compras Reservadas</a>
                            </li>
							<li>
                                <a href="javascript:void(0);" id="listamaterial" >Lista de Material Guardado</a>
                            </li>
                            <!--li>
                                <a href="pages/ui/badges.html">Reporte de Compras</a>
                            </li-->
                        </ul>
                    </li>
					<!--li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Nuevo Registro</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Lista de Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </li-->
					<li>
                        <a href="<?php echo $url."includes/cerrar.php"?>">
                            <i class="material-icons">launch</i>
                            <span>Salir del Sistema</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> - <a href="javascript:void(0);"><?php echo $sistema?></a>.
                </div>
                <div class="version">
                    <b>Desarrollado: </b> Italy & Asesores
                </div>
<div id="ActualizarOnza">
<?php
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

    $sitioweb = curl("https://www.kitco.com");
    $archivo = fopen("datos.txt","w+");
    fwrite($archivo,$sitioweb);
$pagina = file_get_contents('datos.txt');
$findme = "font-bold text-sm desktop:text-[11.5px] ml-auto";
$pos = strpos($pagina, $findme);
$cadena="Ejemplo de Prueba";
$kitco=substr($pagina, $pos+49,7);
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
</div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
<?php
							
$verificar=ejecutarSQL::consultar("select * from caja");
if($ver=mysqli_fetch_assoc($verificar))
{
	$soles=$ver['soles_caj'];
	$dolares=$ver['dolares_caj'];
}
$d_ingresos=0;
$s_ingresos=0;
$reporte_d=ejecutarSQL::consultar("select * from detalle_ingreso where tipo_det='dolares' and registro_det like '".$fecha."%'");
while($rep_d=mysqli_fetch_assoc($reporte_d))
{
	$d_ingresos=$d_ingresos+$rep_d['ingreso_det'];
}
$reporte_s=ejecutarSQL::consultar("select * from detalle_ingreso where tipo_det='soles' and registro_det like '".$fecha."%'");
while($rep_s=mysqli_fetch_assoc($reporte_s))
{
	$s_ingresos=$s_ingresos+$rep_s['ingreso_det'];
}
$d_salidas=0;
$s_salidas=0;
$salidas_d=ejecutarSQL::consultar("select * from gastos where tipo_gas='dolares' and registro_gas like '".$fecha."%'");
while($sal_d=mysqli_fetch_assoc($salidas_d))
{
	$d_salidas=$d_salidas+$sal_d['monto_gas'];
}
$salidas_s=ejecutarSQL::consultar("select * from gastos where tipo_gas='soles' and registro_gas like '".$fecha."%'");
while($sal_s=mysqli_fetch_assoc($salidas_s))
{
	$s_salidas=$s_salidas+$sal_s['monto_gas'];
}
?>
?>
    <section class="content">
        <div class="row" id="principal">
		<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">COMPRAS SOLES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $soles?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">COMPRAS DOLARES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $dolares?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">INGRESOS SOLES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $s_ingresos?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">INGRESOS DOLARES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $d_ingresos?>" data-speed="2000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
			</div>
                <!-- Line Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Estadistica de Compras SOLES/DOLARES <?php echo date('Y')?></h2>
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">equalizer</i>
                        </div>
                        <div class="content">
                            <div class="text">BOUNCE RATE</div>
                            <div class="number">62%</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">flight_takeoff</i>
                        </div>
                        <div class="content">
                            <div class="text">FLIGHT</div>
                            <div class="number">02:59 PM</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">battery_charging_full</i>
                        </div>
                        <div class="content">
                            <div class="text">BATTERY</div>
                            <div class="number">Charging</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-lime hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">brightness_low</i>
                        </div>
                        <div class="content">
                            <div class="text">BRIGHTNESS RATE</div>
                            <div class="number">40%</div>
                        </div>
                    </div>
                </div-->
            </div>
    </section>
<style>
	.calculo-oro{
		/*border: 1px solid rgba(205,20,23,1.00);
		border-radius: 5px;*/
		position: absolute;
		display: none;
		bottom: 10px;
		right: 10px;
	}
</style>
<?php
$mes_S[0]=0;
$mes_D[0]=0;
$mms=1;
$mmd=1;
$anio=date('Y');
for($ms=1;$ms<=12;$ms++)
{
	if($ms<=9)
	{
		$ms="0".$ms;
	}
	$t_m_s=0;
	$sql=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where tipo_com='soles' and registro_com like '".$anio."-".$ms."%'");
	if($sm=mysqli_fetch_assoc($sql))
	{
	do
	{
		$t_m_s=$t_m_s+$sm['total_com'];
	}while($sm=mysqli_fetch_assoc($sql));
		$mes_S[$mms]=$t_m_s;
	}
	else
	{
		$mes_S[$mms]=0;
	}
	//echo $mes_S[$mms];
	$mms++;
}
for($md=1;$md<=12;$md++)
{
	if($md<=9)
	{
		$md="0".$md;
	}
	$t_m_d=0;
	//echo "select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where tipo_com='dolares' and registro_com like '".$anio."-".$md."%'<br>";
	$sql_d=ejecutarSQL::consultar("select * from compras inner join detalle_compras on compras.codigo_com=detalle_compras.codigo_com where tipo_com='dolares' and registro_com like '".$anio."-".$md."%'");
	if($dm=mysqli_fetch_assoc($sql_d))
	{
	do
	{
		$t_m_d=$t_m_d+$dm['total_com'];
	}while($sm=mysqli_fetch_assoc($sql_d));
		$mes_D[$mmd]=$t_m_d;
	}
	else
	{
		$mes_D[$mmd]=0;
	}
	//echo $mes_D[$mmd];
	$mmd++;
}
?>
<div class="calculo-oro"><button type="button" class="btn btn-primary btn-lg">Precio del Oro</button></div>
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            </div>
</form>
    <!-- Jquery Core Js -->
    <script src="<?php echo $url;?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo $url;?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo $url;?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo $url;?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo $url;?>plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo $url;?>plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo $url;?>plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo $url;?>plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo $url;?>plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo $url;?>plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo $url;?>plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo $url;?>plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo $url;?>plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo $url;?>plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo $url;?>plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo $url;?>js/admin.js"></script>
	<script src="<?php echo $url;?>js/demo.js"></script>
    <script>
function sendRequest(){
  $.ajax({
    url: "actualizar_onza.php",
    success:
      function(result){ 
/* si es success mostramos resultados */
       $('#ActualizarOnza').html(result);
    },
    complete: function() { 
/* solo una vez que la petición se completa (success o no success) 
   pedimos una nueva petición en 3 segundos */
       setTimeout(function(){
         sendRequest();
       }, 60000);
      }
    });
  };

/* primera petición que echa a andar la maquinaria */

$(function () {
	sendRequest();
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    //Widgets count
    $('.count-to').countTo();

    //Sales count to
    $('.sales-count-to').countTo({
        formatter: function (value, options) {
            return '$' + value.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, ' ').replace('.', ',');
        }
    });

    initRealTimeChart();
    initDonutChart();
    initSparkline();
});

var realtime = 'on';
function initRealTimeChart() {
    //Real time ==========================================================================================
    var plot = $.plot('#real_time_chart', [getRandomData()], {
        series: {
            shadowSize: 0,
            color: 'rgb(0, 188, 212)'
        },
        grid: {
            borderColor: '#f3f3f3',
            borderWidth: 1,
            tickColor: '#f3f3f3'
        },
        lines: {
            fill: true
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            min: 0,
            max: 100
        }
    });

    function updateRealTime() {
        plot.setData([getRandomData()]);
        plot.draw();

        var timeout;
        if (realtime === 'on') {
            timeout = setTimeout(updateRealTime, 320);
        } else {
            clearTimeout(timeout);
        }
    }

    updateRealTime();

    $('#realtime').on('change', function () {
        realtime = this.checked ? 'on' : 'off';
        updateRealTime();
    });
    //====================================================================================================
}

function initSparkline() {
    $(".sparkline").each(function () {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });
}

function initDonutChart() {
    Morris.Donut({
        element: 'donut_chart',
        data: [{
            label: 'Chrome',
            value: 37
        }, {
            label: 'Firefox',
            value: 30
        }, {
            label: 'Safari',
            value: 18
        }, {
            label: 'Opera',
            value: 12
        },
        {
            label: 'Other',
            value: 3
        }],
        colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)', 'rgb(0, 150, 136)', 'rgb(96, 125, 139)'],
        formatter: function (y) {
            return y + '%'
        }
    });
}

var data = [], totalPoints = 110;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50, y = prev + Math.random() * 10 - 5;
        if (y < 0) { y = 0; } else if (y > 100) { y = 100; }

        data.push(y);
    }

    var res = [];
    for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]]);
    }

    return res;
}

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"],
                datasets: [{
                    label: "COMPRAS SOLES",
                    data: [
<?php
for($dms=1;$dms<=12;$dms++)
{
	if($dms<=12)
	{
		echo $mes_S[$dms].",";
	}
	else
	{
		echo $mes_S[$dms];
	}
}
?>
					],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                },{
                    label: "COMPRAS DOLARES",
                    data: [
<?php
for($dmd=1;$dmd<=12;$dmd++)
{
	if($dmd<=12)
	{
		echo $mes_D[$dmd].",";
	}
	else
	{
		echo $mes_D[$dmd];
	}
}
?>
					],
					borderColor: 'rgba(233, 30, 99, 0.65)',
					backgroundColor: 'rgba(233, 30, 99, 0.3)',
					pointBorderColor: 'rgba(233, 30, 99, 0)',
					pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}
	</script>
    <!-- Custom Js -->
    <!--script src="<?php echo $url;?>js/pages/charts/chartjs.js"></script!-->

    <!-- Demo Js -->
    <script src="<?php echo $url;?>js/demo.js"></script>
	<script src="<?php echo $url;?>js/ajax.js"></script>
	<script src="<?php echo $url;?>js/Impresion.js"></script>
<script type="text/javascript">
function Imprimir(el){
$("#"+el).printThis();
}
function ReImprimir(el){
	//var url = options.url + ( ( options.url.indexOf('?') < 0 && options.data != "" ) ? '?' : '&' ) + options.data;
    var thePopup = window.open( "imprimir_comprobante.php?codigo="+el, "Member Listing", "menubar=0,location=0,height=700,width=700" );
    thePopup.print();
	//thePopup.onfocus=function(){ thePopup.close();}
	//thePopup.onload = function() { thePopup.print(); thePopup.close(); }
}
function ImprimirComprobante(el){
	//var url = options.url + ( ( options.url.indexOf('?') < 0 && options.data != "" ) ? '?' : '&' ) + options.data;
    var thePopup = window.open( "imprimir_comprobante_ok.php?codigo="+el, "Member Listing", "menubar=0,location=0,height=700,width=700" );
    thePopup.print();
	//thePopup.onfocus=function(){ thePopup.close();}
	//thePopup.onload = function() { thePopup.print(); thePopup.close(); }
}
/*function Imprimir(muestra)
{
	var ficha=document.getElementById(muestra);
	var ventimp=window.open('','');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.document.getElementById(muestra).style.display='block';
	ventimp.print();
	ventimp.close();
}*/
  $("#listacompra").click(function(event) {
   $("#principal").load('lista_compras_pendientes.php');
  });
$("#listacomprareserva").click(function(event) {
   $("#principal").load('lista_compras_reservas.php');
  });//listamaterial
$("#listacompras").click(function(event) {
   $("#principal").load('lista_compras.php');
  });
$("#listamaterial").click(function(event) {
   $("#principal").load('lista_material.php');
  });
  $("#registrocompra").click(function(event) {
   $("#principal").load('registro_compra.php');
  });
  $("#registrocompraonza").click(function(event) {
   $("#principal").load('registro_compra_onza.php');
  });
  $("#registrocompranueva").click(function(event) {
   $("#principal").load('registro_compra.php');
  });
  $("#caja").click(function(event) {
   $("#principal").load('caja.php');
  });
  $("#oro").click(function(event) {
   $("#principal").load('oro.php');
  });
$("#compraoro").click(function(event) {
   $("#principal").load('registro_material.php');
  });
$("#reiniciar").click(function(event) {
   $("#principal").load('reiniciar_sistema.php');
  });
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})();
</script>
</body>

</html>
<?php
}
if($_SESSION==NULL)
{
	header("location:".$url);
}
?>
