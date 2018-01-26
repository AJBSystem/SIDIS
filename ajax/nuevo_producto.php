<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['serial'])){
			$errors[] = "Serial del producto vacío";          
        } else if (empty($_POST['nombre'])){
			$errors[] = "Nombre del producto vacío";
        } else if (empty($_POST['marca'])){
			$errors[] = "Marca del producto vacío";	
		} else if (empty($_POST['modelo'])){
			$errors[] = "Modelo del producto vacío";
        } else if (empty($_POST['numero'])){
			$errors[] = "Número de bien del producto vacío";								
        } else if (empty($_POST['condicion'])){
			$errors[] = "Condición del producto vacío";							
        } else if (empty($_POST['responsable'])){
			$errors[] = "Responsable del producto vacío";
        } else if (empty($_POST['asignacion'])){
			$errors[] = "Asignación del producto vacío";
		} else if (empty($_POST['concepto'])){
			$errors[] = "Concepto del inventario vacío";						
		} else if (empty($_POST['precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['serial']) &&
			!empty($_POST['nombre']) &&
			!empty($_POST['marca']) &&
			!empty($_POST['modelo']) &&
			!empty($_POST['numero']) &&
			!empty($_POST['condicion']) &&
			!empty($_POST['responsable']) &&
			!empty($_POST['asignacion']) &&
			!empty($_POST['concepto']) &&
			!empty($_POST['precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$serial=mysqli_real_escape_string($con,(strip_tags($_POST["serial"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
		$modelo=mysqli_real_escape_string($con,(strip_tags($_POST["modelo"],ENT_QUOTES)));
		$numero=mysqli_real_escape_string($con,(strip_tags($_POST["numero"],ENT_QUOTES)));
		$stock=intval($_POST['stock']);
		$id_categoria=intval($_POST['categoria']);
		$id_area=intval($_POST['area']);
		$condicion=mysqli_real_escape_string($con,(strip_tags($_POST["condicion"],ENT_QUOTES)));
		$motivo=intval($_POST['motivo']);
		$responsable=mysqli_real_escape_string($con,(strip_tags($_POST["responsable"],ENT_QUOTES)));
		$asignacion=mysqli_real_escape_string($con,(strip_tags($_POST["asignacion"],ENT_QUOTES)));
		$concepto=mysqli_real_escape_string($con,(strip_tags($_POST["concepto"],ENT_QUOTES)));
		$rango=intval($_POST['rango']);
		$cargo=intval($_POST['cargo']);
		$precio_venta=floatval($_POST['precio']);
		$fecha=date("Y-m-d H:i:s");
		
		$sql="INSERT INTO products (codigo_producto, serial, nombre_producto, marca_producto, modelo_producto, numero_bien, fecha, precio_producto, id_categoria, id_area, condicion_producto, id_motivo, responsable_entrega, asignacion_producto, concepto_inventario, id_rango, id_cargo) VALUES ('$codigo','$serial','$nombre','$marca','$modelo','$numero','$fecha','$precio_venta', '$id_categoria','$id_area','$condicion','$motivo','$responsable','$asignacion','$concepto','$rango','$cargo')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Producto ha sido ingresado satisfactoriamente.";
				$id_producto=get_row('products','id_producto', 'codigo_producto', $codigo);
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