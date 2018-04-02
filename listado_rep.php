<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_reporte="active";
	$title="Reportes | División de Sistemas";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-primary">
		<div style="background:#0079a3" class="panel-heading">
		    <div class="btn-group pull-right"><a href="pdf/reportegeneral.php">
				<button type='button' style="background:#00b3b3" class="btn btn-primary" data-toggle="modal" data-target="#nuevoProducto">
					<span class="glyphicon glyphicon-print" ></span> Imprimir</button></a>
			</div>
<<<<<<< HEAD
<<<<<<< HEAD
			<h4><i class='glyphicon glyphicon-search'></i> Imprimir Reporte</h4>
=======
=======

>>>>>>> Iskander
			<h4><i class='glyphicon glyphicon-search'></i> Reporte General</h4>
>>>>>>> origin/Iskander
		</div>

		<div class="panel-body">
		
<<<<<<< HEAD
			<table class="table">
				<tr>
					<th>Cantidad</th>
<<<<<<< HEAD
					<th>Código</th>
					<th>N° de Bien</th>
					<th>Descripción</th>
					<th>Código</th>
=======
					<th>Cod Producto</th>
					<th>N° de Bien</th>
					<th>Descripción</th>
					<th>Cod Inventario</th>
>>>>>>> origin/Iskander
					<th>Concepto</th>
					<th>Valor</th>
					<th>Condición</th>
				</tr>

				<?php
				while ($row = $resultado->fetch_array(MYSQL_BOTH))
				{
					echo '<tr>
							<td>'.$row['stock'].'</td>
							<td>'.$row['codigo_producto'].'</td>
							<td>'.$row['numero_bien'].'</td>
							<td>'.$row['nombre_producto'].'</td>
<<<<<<< HEAD
							<td>'.$row['codigo_producto'].'</td>
=======
							<td>'.$row['codigo_inventario'].'</td>
>>>>>>> origin/Iskander
							<td>'.$row['concepto_inventario'].'</td>
							<td>'.$row['precio_producto'].'</td>
							<td>'.$row['condicion_producto'].'</td>
					</tr>';
				}
				?>
			</table>
  </div>
</div>
		 
	</div>
<<<<<<< HEAD
=======

<td colspan="4"><span class="pull-right">
					<ul class="pagination pagination-large"><li class="disabled"><span><a>‹ Prev</a></span></li><li class="active"><a>1</a></li><li><a href="javascript:void(0);" onclick="load(2)">2</a></li><li><a href="javascript:void(0);" onclick="load(3)">3</a></li><li><a href="javascript:void(0);" onclick="load(4)">4</a></li><li><span><a href="javascript:void(0);" onclick="load(2)">Next ›</a></span></li></ul></span></td>


<!-- <div class='col-md-12 text-center'>
=======
			<?php
			include("modal/registro_productos.php");
			include("modal/editar_productos.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
					 <div class='col-md-4'>
						<label>Filtrar por serial o nombre</label>
						<input type="text" class="form-control" id="q" placeholder="Serial o nombre del producto" onkeyup='load(1);'>
					</div>
					
					<!-- <div class='col-md-4'>
						<label>Filtrar por categoría</label>
						<select class='form-control' name='id_categoria' id='id_categoria' onchange="load(1);">
							<option value="">Selecciona una categoría</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
							while($rw=mysqli_fetch_array($query_categoria))	{
							?>
							<option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>			
								<?php
							}
							?>
						</select>
					</div> -->
					<div class='col-md-12 text-center'>
>>>>>>> Iskander
						<span id="loader"></span>
					</div>

				</div>
				<hr>

				<div class='row-fluid'>
					<div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	

<<<<<<< HEAD
>>>>>>> origin/Iskander
=======
				<div class='row'>
					<div class='outer_div'></div><!-- Carga los datos ajax -->
				</div>
			</form>
			
  </div>
</div>
		 
	</div>
>>>>>>> Iskander
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/reportes.js"></script>
  </body>
</html>
<script>
// function eliminar (id){
// 		var q= $("#q").val();
// 		var id_categoria= $("#id_categoria").val();
// 		$.ajax({
// 			type: "GET",
// 			url: "./ajax/buscar_productos.php",
// 			data: "id="+id,"q":q+"id_categoria="+id_categoria,
// 			 beforeSend: function(objeto){
// 				$("#resultados").html("Mensaje: Cargando...");
// 			  },
// 			success: function(datos){
// 			$("#resultados").html(datos);
// 			load(1);
// 			}
// 		});
// 	}
		
	// $(document).ready(function(){
			
	// 	<?php 
	// 		if (isset($_GET['delete'])){
	// 	?>
	// 		eliminar(<?php echo intval($_GET['delete'])?>);	
	// 	<?php
	// 		}
		
	// 	?>	
	// });
		
// $( "#guardar_producto" ).submit(function( event ) {
//   $('#guardar_datos').attr("disabled", true);
  
//  var parametros = $(this).serialize();
// 	 $.ajax({
// 			type: "POST",
// 			url: "ajax/nuevo_producto.php",
// 			data: parametros,
// 			 beforeSend: function(objeto){
// 				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
// 			  },
// 			success: function(datos){
// 			$("#resultados_ajax_productos").html(datos);
// 			$('#guardar_datos').attr("disabled", false);
// 			load(1);
// 		  }
// 	});
//   event.preventDefault();
// })

</script>