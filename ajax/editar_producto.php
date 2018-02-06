<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";

        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Campo nombre del producto vacío";

		} else if ($_POST['mod_categoria']==""){
			$errors[] = "Selecciona la categoría del producto";

		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Campo precio de venta vacío";
		
		} else if(empty($_POST['mod_serial'])){
			$errors[] = "Campo serial vacío";

		} else if(empty($_POST['mod_marca'])){
			$errors[] = "Campo marca vacío";

		} else if(empty($_POST['mod_modelo'])){
		$errors[] = "Campo modelo vacío"; 

		} else if(empty($_POST['mod_condicion'])){
			$errors[] = "Campo condición vacío";

		} else if(empty($_POST['mod_responsable'])){
			$errors[] = "Campo Recibido por vacío";

		} else if(empty($_POST['mod_asignacion'])){
			$errors[] = "Campo Asignada A vacío";

		} else if (empty($_POST['mod_concepto'])) {
			$errors[] = "Campo concepto vacío";

		} else if (
			!empty($_POST['mod_id']) &&
				!empty($_POST['mod_codigo']) &&
					!empty($_POST['mod_nombre']) &&
						$_POST['mod_categoria']!="" &&
							!empty($_POST['mod_precio']) &&
								!empty($_POST['mod_serial']) &&
									!empty($_POST['mod_numero']) &&
										!empty($_POST['mod_marca']) &&
											!empty($_POST['mod_modelo']) &&
												!empty($_POST['mod_condicion']) &&
													!empty($_POST['mod_responsable']) &&
														!empty($_POST['mod_asignacion']) &&
															!empty($_POST['mod_concepto'])

		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$categoria=intval($_POST['mod_categoria']);
		$precio_venta=floatval($_POST['mod_precio']);
		$serial=mysqli_real_escape_string($con,(strip_tags($_POST["mod_serial"],ENT_QUOTES)));
		$numero=mysqli_real_escape_string($con,(strip_tags($_POST["mod_numero"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST['mod_marca'],ENT_QUOTES)));
		$modelo=mysqli_real_escape_string($con,(strip_tags($_POST['mod_modelo'],ENT_QUOTES)));
		$cond=mysqli_real_escape_string($con,(strip_tags($_POST['mod_condicion'], ENT_QUOTES)));
		$resp=mysqli_real_escape_string($con,(strip_tags($_POST['mod_responsable'], ENT_QUOTES)));
		$asig=mysqli_real_escape_string($con,(strip_tags($_POST['mod_asignacion'], ENT_QUOTES)));
		$conc=mysqli_real_escape_string($con,(strip_tags($_POST['mod_concepto'], ENT_QUOTES)));
		$id_producto=$_POST['mod_id'];

		//Query de actualizacion de datos
		$sql="UPDATE products SET codigo_producto='".$codigo."', nombre_producto='".$nombre."', id_categoria='".$categoria."', precio_producto='".$precio_venta."', serial='".$serial."', numero_bien='".$numero."', marca_producto='".$marca."', modelo_producto='".$modelo."', condicion_producto='".$cond."', responsable_entrega='".$resp."', asignacion_producto='".$asig."', concepto_inventario='".$conc."' WHERE id_producto='".$id_producto."'";
		


		$query_update = mysqli_query($con,$sql);


			if ($query_update){
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
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
			</div>
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