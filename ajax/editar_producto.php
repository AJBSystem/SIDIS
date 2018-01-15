<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";
        }else if (empty($_POST['mod_serial'])) {
           $errors[] = "Serial vacío";          
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
        } else if (empty($_POST['mod_marca'])){
			$errors[] = "Marca del producto vacío";
        } else if (empty($_POST['mod_modelo'])){
			$errors[] = "Modelo del producto vacío";
        } else if (empty($_POST['mod_numero'])){
			$errors[] = "Número de bien del producto vacío";														
		} else if ($_POST['mod_categoria']==""){
			$errors[] = "Selecciona la categoría del producto";
		} else if ($_POST['mod_area']==""){
			$errors[] = "Seleccione el area del producto";						
		} else if (empty($_POST['mod_condicion'])){
			$errors[] = "Condicion del producto vacío";
		} else if (empty($_POST['mod_motivo'])){
			$errors[] = "Motivo del inventario";
		} else if (empty($_POST['mod_responsable'])){
			$errors[] = "Responsable del producto vacío";
		} else if (empty($_POST['mod_asignacion'])){
			$errors[] = "Asignación del producto vacío";
		} else if (empty($_POST['mod_concepto'])){
			$errors[] = "Asignación del producto vacío";				
		} else if ($_POST['mod_rango']==""){
			$errors[] = "Seleccione el rango";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_serial']) &&
			!empty($_POST['mod_nombre']) &&
			!empty($_POST['mod_marca']) &&
			!empty($_POST['mod_modelo']) &&
			!empty($_POST['mod_numero']) &&
			$_POST['mod_categoria']!="" &&
			$_POST['mod_area']!="" &&
			!empty($_POST['mod_condicion']) &&
			$_POST['mod_motivo']!="" &&
			!empty($_POST['mod_responsable']) &&
			!empty($_POST['mod_asignacion']) &&
			!empty($_POST['mod_concepto']) &&
			$_POST['mod_rango']!="" &&
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$serial=mysqli_real_escape_string($con,(strip_tags($_POST["mod_serial"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["mod_marca"],ENT_QUOTES)));
		$modelo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_modelo"],ENT_QUOTES)));
		$numero=mysqli_real_escape_string($con,(strip_tags($_POST["mod_numero"],ENT_QUOTES)));
		$categoria=intval($_POST['mod_categoria']);
		$area=intval($_POST['mod_area']);
		$condicion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_condicion"],ENT_QUOTES)));
		$motivo=intval($_POST['mod_motivo']);
		$responsable=mysqli_real_escape_string($con,(strip_tags($_POST["mod_responsable"],ENT_QUOTES)));
		$asignacion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_asignacion"],ENT_QUOTES)));
		$concepto=mysqli_real_escape_string($con,(strip_tags($_POST["mod_concepto"],ENT_QUOTES)));
		$rango=intval($_POST['mod_rango']);				
		$stock=intval($_POST['mod_stock']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];
		$sql="UPDATE products SET codigo_producto='".$codigo."', id_serial='".$serial."', nombre_producto='".$nombre."',marca_producto='".$marca."', modelo_producto='".$modelo."',id_area='".$area."', numero_bien='".$numero."', condicion_producto='".$condicion."', motivo_inventario='".$motivo."', responsable_entrega='".$responsable."', asignacion_producto='".$asignacion."', id_rango='".$rango."', id_categoria='".$categoria."', precio_producto='".$precio_venta."', concepto_inventario='".$concepto."', stock='".$stock."' WHERE id_producto='".$id_producto."'";
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