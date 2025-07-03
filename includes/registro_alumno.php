<?php include("../includes/configuracion.php")?>
<?php include("../includes/conector.php");?>
<?php
session_cache_limiter();
session_start();
$link=conectarse();
//$vaciar=mysqli_query($link,"truncate tmp_imagen");
?>
<form id="frmregistro" name="frmregistro">
<div id="registro">
<div class="modal-dialog modal-lg">
  <div class="modal-content">

	<div class="modal-header">
	  <h4 class="modal-title" id="myModalLabel">Registro de Estudiante</h4>
	  <button type="button" class="close" data-dismiss="modal" onClick="hide('popDivR');"><span aria-hidden="true">×</span>
	  </button>
	</div>
	
	<div class="modal-body" style="height: 500px; overflow-y: scroll;">
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Nombre de Institucion</label>
		<div class="col-md-9 col-sm-9 ">
<?php
echo '<select name="institucion" id="institucion" class="form-control">';
echo '<option value="">Seleccionar...</option>';
$ie=mysqli_query($link,"select * from instituciones where estado_ins=1");
while($Die=mysqli_fetch_assoc($ie))
{
	echo '<option value="'.$Die['codigo_ins'].'">'.$Die['nombre_ins'].'</option>';
}
echo '</select>';
?>
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">DNI</label>
		<div class="col-md-4 col-sm-9 ">
		  <input type="number" name="dni" id="dni" class="form-control">
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Nombres</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" name="nombres" id="nombres" class="form-control">
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Apellidos</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" name="apellidos" id="apellidos" class="form-control">
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Region</label>
		<div class="col-md-9 col-sm-9 ">
		  <select name="region" id="region" class="form-control" onChange="enviarFormulario('<?php echo $url?>includes/datos_ubicacion.php?opcion=provincia','frmregistro','provincia')">
            <option value="">Seleccionar...</option>
            <?php
$sql_pais=mysqli_query($link,"select * from regiones");
while($pais=mysqli_fetch_assoc($sql_pais))
{
?>
            <option value="<?php echo $pais['codigo_reg']?>"><?php echo $pais['nombre_reg']?></option>
            <?php
}
?>
          </select>
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Provincia</label>
		<div class="col-md-9 col-sm-9 ">
		  <div id="provincia">
            <select name="provincia" class="form-control" id="provincia">
              <option value="">Seleccionar...</option>
            </select>
          </div>
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Distrito</label>
		<div class="col-md-9 col-sm-9 ">
		  <div id="distrito">
            <select name="distrito" class="form-control" id="distrito">
              <option value="">Seleccionar...</option>
            </select>
          </div>
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Direccion</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" name="direccion" id="direccion" class="form-control">
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Telefono/Celular</label>
		<div class="col-md-4 col-sm-9 ">
		  <input type="text" name="telefono" id="telefono" class="form-control">
		</div>
	  </div>
	  <div class="form-group row ">
		<label class="control-label col-md-3 col-sm-3 ">Correo Electronico</label>
		<div class="col-md-9 col-sm-9 ">
		  <input type="text" name="correo" id="correo" class="form-control">
		</div>
	  </div>
	</div>
	<div class="modal-footer" id="cambio_botonA">
		  <button type="button" class="btn btn-primary" onClick="enviarFormulario('includes/guardar_alumno.php','frmregistro','respuesta_datosALM');enviarFormulario2('includes/cambio_boton_alumno.php','frmregistro','cambio_botonA')">Registrarse</button>
		  <button type="reset" class="btn btn-info">Borrar</button>
		  <button type="button" class="btn btn-danger" onClick="hide('popDivR');">Cancelar</button>
	</div>	<div id="respuesta_datosALM"></div>
  </div>
	
</div>
</div>
</form>
