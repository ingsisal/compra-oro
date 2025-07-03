<?php include("configuracion.php");?>
<?php include("conexion.php");?>
<?php
$link=conectarse();
?>
    <link href="<?php echo $url?>css/ext-all.css" media="screen" rel="stylesheet" type="text/css">
    <!--link href="<?php echo $url?>css/app_critical.css" media="screen" rel="stylesheet" type="text/css"-->
    <link href="<?php echo $url?>css/style.css" media="screen" rel="stylesheet" type="text/css">

    <!--link rel="stylesheet" type="text/css" href="/sistema-virtual/js/chat2/jScrollPane/jScrollPane.css" />
    <link rel="stylesheet" type="text/css" href="/sistema-virtual/css/chat2/page.css" />
    <link rel="stylesheet" type="text/css" href="/sistema-virtual/css/chat2/chat.css" /-->

    <meta content="index" name="robots">

<script type="text/javascript" src="<?php echo $url?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo $url?>js/ajax.js"></script>
    <script type="text/javascript" src="<?php echo $url?>js/menu.js"></script>
    <script src="<?php echo $url?>js/moocheck.js"></script>
        <script src="<?php echo $url?>js/mootools.js"></script>

        <link href="<?php echo $url?>resources/css/example.css" rel="stylesheet" type="text/css">
<script src="<?php echo $url?>js/combined_experiments.js.descarga" type="text/javascript"></script>

<!-- color 355782-->
<div id="navega">
<div id="menu">
<div id="fijo">
            <table width="100%" height="50" border="0" cellspacing="0" cellpadding="0" style="background: #355782;">
              <tbody>
                <tr>
                  <td width="10%"><div style="position:absolute; top:0px;"><img src="<?php echo $url?>img/logo-active.png" alt="Logo Sistema"/></div></td>
                  <td width="60%"><div class="nombre-sistema"><?php echo $titulo?></div></td>
                  <td width="30%">
                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                      <tbody>
                        <tr>
							<td width="70%">
                 <div class="dato-sesion">Bienvenido (a)</div>
                 <div class="usuario-sesion"><?php echo($_SESSION['nombres'].", ".$_SESSION['apellidos'])?>
                 </div><a href="<?php echo $url?>includes/cerrar.php" class="void_fancybox void_redirect_link" id="login">Cerrar sesión
                  </a></td>
                          <td width="30%"><div style="position:absolute;right: 0px; top: 0px; padding: 5%; background-image: url(../img/usuarios/default.png);background-repeat: no-repeat;background-size:50px;background-position: right top;margin-right: 5px;"></div></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td colspan="3">
<?php
if($_SESSION!=NULL){
if($_SESSION['nivel_P']=="1")
{
	?>

<?php
}
if($_SESSION['nivel_P']=="2")
{
	?>
        <div class="x-panel-header-default visible-for-medium-up">
            <div class="row">
              <div>
              <ul class="sub-nav-cats">
    <nav>
    <ul class="menu borde-menu">
   <li><a href="<?php echo $url?>"><i class="icono-inicio"></i>INICIO</a>
   </li>
  <li><a><i class="icono-curso"></i>CURSOS</a>
     <ul class="sub-menu">
   <li><a onClick="enviarFormulario('registro_curso.php','frmgeneral','base_principal')">Nuevo Curso</a></li>
   <li><a>Opcion Cursos ►</a>
     <ul>
       <li><a onClick="enviarFormulario('asignar_horario.php','frmgeneral','base_principal')">Asignar Horarios</a></li>
	<li><a onClick="enviarFormulario('listado_horarios.php','frmgeneral','base_principal')">Listado Horarios</a></li>
    <li><a onClick="enviarFormulario('reporte_horarios.php','frmgeneral','base_principal')">Reporte Horarios</a></li>
  </ul>
   </li>
   <li><a onClick="enviarFormulario('listado_cursos.php','frmgeneral','base_principal')">Listado de Cursos</a></li>
   <li><a onClick="enviarFormulario('reporte_cursos.php','frmgeneral','base_principal')">Reporte Cursos</a></li>
   </ul>
  </li>
  <li><a><i class="icono-docente"></i>DOCENTES</a>
     <ul class="sub-menu">
   <li><a onClick="enviarFormulario('registro_docente.php','frmgeneral','base_principal')">Nuevo Docente</a></li>
   <li><a>Opcion Docente ►</a>
    <ul>
    <li><a onClick="enviarFormulario('asignar_docente.php','frmgeneral','base_principal')">Asignar Curso</a></li>
    <li><a onClick="enviarFormulario('registro_examenes.php','frmgeneral','base_principal')">Crear Examen</a></li>
    <li><a onClick="enviarFormulario('reporte_cursos_d.php','frmgeneral','base_principal')">Reportes</a></li>
    </ul>
   </li>
   <li><a onClick="enviarFormulario('listado_docentes.php','frmgeneral','base_principal')">Listado Docentes</a></li>
   <li><a onClick="enviarFormulario('reporte_docentes.php','frmgeneral','base_principal')">Reporte Docentes</a></li>
   </ul>
   </li>
  </li>
  <li><a><i class="icono-alumno"></i>ALUMNOS</a>
<ul class="sub-menu">
   <li><a onClick="enviarFormulario('registro_alumno.php','frmgeneral','base_principal')">Nuevo Alumno</a></li>
   <li><a onClick="enviarFormulario('reporte_alumnos.php','frmgeneral','base_principal')">Reporte de Alumnos</a></li>
   <li><a onClick="enviarFormulario('listado_codigos.php','frmgeneral','base_principal')">Reporte Operaciones</a></li>
   <li><a onClick="enviarFormulario('registro_codigo.php','frmgeneral','base_principal')">Registro de Codigos</a></li>
   </ul>
  </li>
  </nav>
  </div>
            </div>
          </div>
<?php
}
/////////////////////////////////////////menu docente

if($_SESSION['nivel_P']=="3")
{
	?>
          <div class="x-panel-header-default visible-for-medium-up sub-navbar">
            <div class="row">
              <div class="container">
              <ul class="sub-nav-cats">
    <nav>
    <ul class="menu borde-menu">
   <li><a href="<?php echo $url?>"><i class="icono-inicio"></i>INICIO</a>
   </li>
  <li><a><i class="icono-curso"></i>CURSOS</a>
     <ul class="sub-menu">
   <li><a onClick="enviarFormulario('ver_horarios.php','frmgeneral','base_principal')">Horarios</a></li>
   <li><a>Operaciones ►</a>
     <ul>
       <li><li><a onClick="enviarFormulario('preparar_clase.php','frmgeneral','base_principal')">Preparar Clase</a></li></li>
       <li><li><a onClick="enviarFormulario('subir_archivos.php','frmgeneral','base_principal')">Subir Archivos</a></li></li>
	<li><li><a onClick="enviarFormulario('examenes.php','frmgeneral','base_principal')">Crear Examen</a></li></li>
	<li><li><a onClick="enviarFormulario('listado_archivos.php','frmgeneral','base_principal')">Ver Archivos</a></li></li>
	<li><li><a onClick="enviarFormulario('listado_cursos.php','frmgeneral','base_principal')">Ver Examenes</a></li></li>
  </ul>
   </li>
   <!--li><a onClick="enviarFormulario('listado_cursos_d.php','frmgeneral','base_principal')">Listado de Cursos</a></li-->
   <li><a onClick="enviarFormulario('reporte_cursos.php','frmgeneral','base_principal')">Reporte Cursos</a></li>
   </ul>
  </li>
  <li><a><i class="icono-alumno"></i>ALUMNOS</a>
<ul class="sub-menu">
   <li><a onClick="enviarFormulario('ver_asistencias.php','frmgeneral','base_principal')">Asistencias</a></li>
   <li><a onClick="enviarFormulario('ver_notas.php','frmgeneral','base_principal')">Notas de Alumnos</a></li>
   <li><a onClick="enviarFormulario('ver_alumnos.php','frmgeneral','base_principal')">Reporte Alumnos</a></li>
   </ul>
  </li>
  </nav>
  </div>
            </div>
          </div>
<?php
}

////////////////////////////////////////////fin menu docente

/////////////////////////////////////////menu alumno

if($_SESSION['nivel_P']=="4")
{
	?>
          <div class="x-panel-header-default visible-for-medium-up sub-navbar">
            <div class="row">
              <div class="container">
              <ul class="sub-nav-cats">
    <nav>
    <ul class="menu borde-menu">
   <li><a href="<?php echo $url?>"><i class="icono-inicio"></i>INICIO</a>
   </li>
  <li><a><i class="icono-curso"></i>CURSOS</a>
     <ul class="sub-menu">
   <li><a onClick="enviarFormulario('ver_horarios.php','frmgeneral','base_principal')">Horarios</a></li>
   <!--li><a onClick="enviarFormulario('x.php','frmgeneral','base_principal')">Listado de Cursos</a></li-->
   <li><a onClick="enviarFormulario('reporte_cursos.php','frmgeneral','base_principal')">Reporte Cursos</a></li>
   <!--li><a onClick="enviarFormulario('aula.php','frmgeneral','base_principal')">Aula</a></li-->
   </ul>
  </li>
  <li><a><i class="icono-alumno"></i>OPCIONES</a>
<ul class="sub-menu">
   <li><a onClick="enviarFormulario('ver_asistencias.php','frmgeneral','base_principal')">Asistencias</a></li>
   <li><a onClick="enviarFormulario('ver_notas.php','frmgeneral','base_principal')">Notas</a></li>
   <li><a onClick="enviarFormulario('ver_datos.php','frmgeneral','base_principal')">Datos Personales</a></li>
   </ul>
  </li>
  </nav>
  </div>
            </div>
          </div>
<?php
}

////////////////////////////////////////////fin menu alumno
}
?>
               </td>
                </tr>
              </tbody>
            </table>
    <script src="<?php echo $url?>js/combined_foundation_base.js.descarga" type="text/javascript"></script>
</div>
</div>
</div>
<div style="top: 300px;padding: 1%;"></div>
<script type="text/javascript">
function Imprimir(muestra)
{
	var ficha=document.getElementById(muestra);
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	var css = ventimp.document.createElement("link");
	css.setAttribute("href", "<?php echo $url?>css/ext-all.css");
	css.setAttribute("rel", "stylesheet");
	css.setAttribute("type", "text/css");
	ventimp.document.head.appendChild(css);
	ventimp.print();
	ventimp.close();
}
</script>
