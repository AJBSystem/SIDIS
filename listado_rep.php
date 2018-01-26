<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$query = "SELECT * FROM products";
	$resultado = $con->query($query);


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
			<h4><i class='glyphicon glyphicon-search'></i> Imprimir Reporte</h4>
		</div>
		<div class="panel-body">
		
			<table class="table">
				<tr>
					<th>Cantidad</th>
					<th>Código</th>
					<th>N° de Bien</th>
					<th>Descripción</th>
					<th>Código</th>
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
							<td>'.$row['codigo_producto'].'</td>
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
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
