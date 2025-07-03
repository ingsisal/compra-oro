<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
function desencriptar($mensaje, $clave)
{
    $textoPlano = "";
    settype($mensaje, "string");
    $mensaje = base64_decode(base64_decode($mensaje));
    $i = strlen($mensaje) - 1;
    $j = strlen($clave);
    if (strlen($mensaje) <= 0) {
        return "";
    }
    do {
        $textoPlano .= ($mensaje{$i} ^ $clave{$i % $j});
    } while ($i--);
    $textoPlano = strrev($textoPlano);
    return $textoPlano;
}
$cod=$_GET['codigo'];
$usuario=ejecutarSQL::consultar("select * from usuarios where id_usu='$cod'");
if($usu=mysqli_fetch_assoc($usuario))
{
	$dni=$usu['dni_usu'];
	$nom=$usu['nombre_usu'];
	$ape=$usu['apellido_usu'];
	$ema=$usu['correo_usu'];
	$dir=$usu['direccion_usu'];
	$tel=$usu['telefono_usu'];
	$niv=$usu['nivel_usu'];
	$pas=$usu['clave_usu'];
}
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Modificar Usuario
                                <small>Modificar Datos</small>
                            </h2>
                        </div>
                        <div class="body">
                                        <form id="frmRegistroUsuario">
								<div class="col-lg-3 col-xs-12">
                                    <h2 class="card-inside-title">DNI de Usuario</h2>
                                            <div class="form-group">
												<div class="form-line">
                                                <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?php echo $cod?>">
												<input type="text" class="form-control" id="Udni" name="Udni" required placeholder="Ejemplo: 44556677" value="<?php echo $dni?>">
												</div>
                                            </div>
								</div>
								<div class="col-lg-9 col-xs-12">
                                    <h2 class="card-inside-title">Correo Electronico</h2>
											<div class="form-group">
												<div class="form-line">
                                                <input type="email" class="form-control" id="Ucorreo" name="Ucorreo" required placeholder="Ejemplo: usuario@gmail.com" value="<?php echo $ema?>">
												</div>
                                            </div>
								</div>
											<div class="row">
								<div class="col-lg-6 col-xs-12">
                                    <h2 class="card-inside-title">Nombre de Usuario</h2>
											<div class="form-group">
												<div class="form-line">
                                                <input type="text" class="form-control" id="Unombre" name="Unombre" required placeholder="Ejemplo: Juan Angel" value="<?php echo $nom?>">
												</div>
                                            </div>
								</div>
								<div class="col-lg-6 col-xs-12">
                                    <h2 class="card-inside-title">Apellido de Usuario</h2>
											<div class="form-group">
												<div class="form-line">
                                                <input type="text" class="form-control" id="Uapellido" name="Uapellido" required placeholder="Ejemplo: Peres Peres" value="<?php echo $ape?>">
												</div>
                                            </div>
								</div>
											</div>
								<div class="col-lg-12 col-xs-12">
                                    <h2 class="card-inside-title">Direccion</h2>
                                            <div class="form-group">
												<div class="form-line">
                                                <input type="text" class="form-control" id="Udireccion" name="Udireccion" required placeholder="Ejemplo: Jr. Ejemplo 123" value="<?php echo $dir?>">
												</div>
                                            </div>
								</div>
											<div class="row">
								<div class="col-lg-6 col-xs-12">
                                    <h2 class="card-inside-title">Telefono</h2>
											<div class="form-group">
												<div class="form-line">
                                                <input type="text" class="form-control" id="Utelefono" name="Utelefono" required placeholder="Ejemplo: 951425386" value="<?php echo $tel?>">
												</div>
                                            </div>
								</div>
								<div class="col-lg-6 col-xs-12">
                                    <h2 class="card-inside-title">Nivel de Usuario</h2>
											<div class="form-group">
                                                <select class="form-control" required name="Univel" id="Univel" onChange="enviarFormulario('tiendas_seleccion.php','frmRegistroUsuario','tiendas')">
												<option value="<?php echo $niv?>"><?php if($niv=="admin"){echo "Administrador";}if($niv=="vendedor"){echo "Vendedor de Tienda";}?></option>
												<option value="admin">Administrador</option>
												<option value="vendedor">Vendedor de Tienda</option>
												</select>
												<div class="help-block with-errors text-danger"></div>
                                            </div>
								</div>
											</div>
											<div class="row">
								<div class="col-lg-6 col-xs-12">
                                    <h2 class="card-inside-title">Contraseña de Usuario</h2>
											<div class="form-line">
                                                <input type="text" class="form-control" name="Clave" id="Clave" value="<?php echo desencriptar($pas,"dublin");?>">
												<div class="help-block with-errors text-danger"></div>
                                            </div>
								</div>
											</div>
							<div id="botones">
							<button class="btn btn-primary waves-effect" type="button" onClick="enviarFormulario('guardar_m_usuario.php','frmgeneral','defaultModal');enviarFormulario2('cambio_boton_compra.php','frmgeneral','botonese')" data-toggle="modal" data-target="#defaultModal">Guardar Modificacion de Usuario</button>
							<button class="btn btn-danger waves-effect" type="button" onClick="enviarFormulario('listado_usuarios.php','frmgeneral','principal')">Cancelar</button>
							</div>
                                        </form>
                                    </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>