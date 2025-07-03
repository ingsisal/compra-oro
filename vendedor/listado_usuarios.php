<?php
include("../includes/configuracion.php");
$link=conectarse();
date_default_timezone_set('America/Lima');
?>
<div class="container-fluid">
	<!-- Vertical Layout | With Floating Label -->
	<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DETALLE DE USUARIOS
                                <small>Listado</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Telefono</th>
                                        <th>Nivel</th>
										<th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$n=1;
$usuarios=mysqli_query($link,"select * from usuarios");
while($usu=mysqli_fetch_assoc($usuarios))
{
?>
                                    <tr>
                                        <th scope="row"><?php echo $n;?></th>
                                        <td><?php echo $usu['nombre_usu']." ".$usu['apellido_usu']?></td>
                                        <td><?php echo $usu['telefono_usu']?></td>
                                        <td><?php if($usu['nivel_usu']=="admin"){ echo "Administracion";} if($usu['nivel_usu']=="vendedor"){ echo "Vendedor de Tienda";}?></td>
										<td><button type="button" class="btn btn-primary" onClick="enviarFormulario('modificar_usuario.php?codigo=<?php echo $usu['id_usu']?>','frmgeneral','principal')">Modificar</button> <button class="btn btn-danger">Eliminar</button></td>
                                    </tr>
<?php
	$n++;
}
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
	<!-- Vertical Layout | With Floating Label -->
</div>