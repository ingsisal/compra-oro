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
                                DETALLE DE MATERIAL GUARDADO
                                <small>Registros</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>FECHA</th>
                                        <th>CLIENTE</th>
										<th>ONZA</th>
										<th>%</th>
										<th>PESO g.</th>
										<th>ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$compras=mysqli_query($link,"select * from guardaje where estado_com='1' order by registro_com desc");
while($com=mysqli_fetch_assoc($compras))
{
?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?php echo $com['registro_com']?></td>
                                        <td><?php echo $com['cliente_com']?></td>
                                        <td><?php echo $com['onza_com']?></td>
										<td><?php echo $com['porcentaje_com']?> %</td>
										<td><?php echo $com['cantidad_com']?></td>
										<td>
										<button type="button" name="<?php echo $com['id_com']?>" class="btn btn-success waves-effect botoncompramaterial">
                                    <i class="material-icons">trending_up</i>
                                    <span>Procesar</span>
                                </button>
										</td>
                                    </tr>
<?php
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
<script>
    $(document).on("click",".botoncompramaterial",function () {
        var variable = $(this).attr('name');
        //$("#codigo").val(variable);
        //alert(variable);
		$("#principal").load('registro_compra_material.php?codigo_p='+variable);
    });
</script>