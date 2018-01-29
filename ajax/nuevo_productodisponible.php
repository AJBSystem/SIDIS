<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
        } else if (empty($_POST['numero'])){
			$errors[] = "Numereo de bien del producto vacío";			
		} else if ($_POST['stock']==""){
			$errors[] = "Stock del producto vacío";
        } else if (empty($_POST['responsable'])){
			$errors[] = "Responsable del producto vacío";
		} else if (empty($_POST['concepto'])){
			$errors[] = "Concepto del inventario vacío";	
		} else if (empty($_POST['condicion'])){
			$errors[] = "Condición del inventario vacío";					
		} else if (empty($_POST['precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['numero']) &&
			!empty($_POST['responsable']) &&
			!empty($_POST['concepto']) &&
			!empty($_POST['condicion']) &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));	
		$numero=mysqli_real_escape_string($con,(strip_tags($_POST["numero"],ENT_QUOTES)));	
		$responsable=mysqli_real_escape_string($con,(strip_tags($_POST["responsable"],ENT_QUOTES)));
		$concepto=mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
		$condicion=mysqli_real_escape_string($con,(strip_tags($_POST["condicion"],ENT_QUOTES)));
		$stock=intval($_POST['stock']);
		$id_categoria=intval($_POST['categoria']);
		$precio_venta=floatval($_POST['precio']);
		$fecha=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO disponible (codigo_producto, nombre_producto, numero_bien, responsable_entrega,  fecha, precio_producto, stock, id_categoria, concepto_inventario, condicion_producto ) VALUES ('$codigo','$nombre','$numero','$responsable','$fecha','$precio_venta', '$stock','$id_categoria','$concepto','$condicion')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
				$id_producto=get_row('disponible','id_producto', 'codigo_producto', $codigo);
				$user_id=$_SESSION['user_id'];
				$firstname=$_SESSION['firstname'];
				$nota="$firstname agregó $stock producto(s) al inventario";
				echo guardar_historial($id_producto,$user_id,$fecha,$nota,$codigo,$stock);
				
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>s
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>