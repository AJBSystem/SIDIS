<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("funciones.php");
	
	$active_productos="active";
	$active_clientes="";
	$active_usuarios="";	
	$title="Productos | SIDIS";
	
	if (isset($_POST['reference']) and isset($_POST['quantity'])){
		$quantity=intval($_POST['quantity']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference"],ENT_QUOTES)));
		$id_producto=intval($_GET['id']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname agregó $quantity producto(s) al inventario";
		$fecha=date("Y-m-d H:i:s");
		guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update=agregar_stock($id_producto,$quantity);
		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	}
	
	if (isset($_POST['reference_remove']) and isset($_POST['quantity_remove'])){
		$quantity=intval($_POST['quantity_remove']);
		$reference=mysqli_real_escape_string($con,(strip_tags($_POST["reference_remove"],ENT_QUOTES)));
		$id_producto=intval($_GET['id']);
		$user_id=$_SESSION['user_id'];
		$firstname=$_SESSION['firstname'];
		$nota="$firstname eliminó $quantity producto(s) del inventario";
		$fecha=date("Y-m-d H:i:s");
		guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);
		$update=eliminar_stock($id_producto,$quantity);
		if ($update==1){
			$message=1;
		} else {
			$error=1;
		}
	}
	
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		$query=mysqli_query($con,"select * from products where id_producto='$id_producto'");
		$row=mysqli_fetch_array($query);
		
	} else {
		die("Producto no existe");
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	include("modal/agregar_stock.php");
	include("modal/eliminar_stock.php");
	include("modal/editar_productos.php");
	
	?>
	
	<div class="container">

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">

              <div class="col-sm-4 col-sm-offset-2 text-center">
				 <img class="item-img img-responsive" src="img/stock.png" alt=""> 
				  <br>
                    <a href="#" class="btn btn-danger" onclick="eliminar('<?php echo $row['id_producto'];?>')" title="Eliminar"> <i class="glyphicon glyphicon-trash"></i> Eliminar </a> 

					<a href="#myModal2" data-toggle="modal" data-codigo='<?php echo $row['codigo_producto'];?>' data-nombre='<?php echo $row['nombre_producto'];?>' data-categoria='<?php echo $row['id_categoria']?>' data-precio='<?php echo $row['precio_producto']?>' data-stock='<?php echo $row['stock'];?>' data-serial='<?php echo $row['serial'];?>' data-numero='<?php echo $row['numero_bien'];?>' data-marca='<?php echo $row['marca_producto'];?>' data-modelo='<?php echo $row['modelo_producto'];?>' data-cond='<?php echo $row["condicion_producto"];?>' data-resp='<?php echo $row["responsable_entrega"];?>' data-asig='<?php echo $row["asignacion_producto"];?>'  data-id='<?php echo $row['id_producto'];?>' class="btn btn-info" title="Editar"> <i class="glyphicon glyphicon-pencil"></i> Editar </a>	
              </div>
			  
              <div class="col-sm-4 col-md-5 col-xs-6 text-left">
                <div class="row margin-btm-20">


<table class='table table-bordered'>
						<tr><th class='text-center' colspan=10 >DATOS DEL PRODUCTO</th></tr>

					<tr><td><span class="current-stock">Fecha de Registro</td><td><?php echo $row['fecha_products'];?></span></td></tr>

					<tr><td><span class="current-stock">Código</td><td><?php echo $row['codigo_producto'];?></span> </td></tr>

					<tr><td><span class="current-stock">Serial</td><td><?php echo $row['serial'];?></span> </td></tr>

					<tr><td><span class="current-stock">Descripción</td><td><?php echo $row['nombre_producto'];?></span></td></tr>

					<tr><td><span class="current-stock">Marca</td><td><?php echo $row['marca_producto'];?></span></td></tr>

					<tr><td><span class="current-stock">Modelo</td><td><?php echo $row['modelo_producto'];?></span></td></tr>

					<tr><td><span class="current-stock">Categoría</td><td><?php echo $row['id_categoria'];?></span></td></tr>

					<!-- <tr><td><span class="current-stock">Área</td><td><?php echo $row['id_area'];?></span></td></tr> -->

					<tr><td><span class="current-stock">N° de Bien</td><td><?php echo $row['numero_bien'];?></span> </td></tr>

					<tr><td><span class="current-stock">Condición</td><td><?php echo $row['condicion_producto'];?></span> </td></tr>

					<tr><td><span class="current-stock">Recibido por</td><td><?php echo $row['responsable_entrega'];?></span> </td></tr>
                    
                    <tr><td><span class="current-stock">Asignado a</td><td><?php echo $row['asignacion_producto'];?></span> </td></tr>

                    <tr><td><span class="current-stock">Cod. Inventario</td><td><?php echo $row['codigo_inventario'];?></span> </td></tr>
					
					<tr><td><span class="current-stock">Concepto</td><td><?php echo $row['concepto_inventario'];?></span> </td></tr>
					
             		<tr><td><span class="current-stock"> Precio venta</span></td><td>BsF.<?php echo number_format($row['precio_producto']);?></span></td></tr>

             		<tr><td><span class="current-stock"> Disponible</span></td><td><?php echo number_format($row['stock']);?></span> disponibles </td></tr>



</table>
</div>
</div>
                    <div class="col-sm-12 margin-btm-10"></div>

                    <div class="col-sm-6 col-xs-6 col-md-2 col-sm-offset-6" style="margin-bottom: 20px;">
                      <a href="" data-toggle="modal" data-target="#add-stock"><img width="100px"  src="img/stock-in.png"></a>
                    </div>


                    <div class="col-sm-6 col-xs-6 col-md-2">
                      <a href="" data-toggle="modal" data-target="#remove-stock" style="margin-bottom: 20px;"><img width="100px"  src="img/stock-out.png"></a>
                    </div>






                    <div class="col-sm-12 margin-btm-10"></div>
                    

<div class="col-sm-8 col-sm-offset-2 text-left">
                  <div class="row">
                    <?php
						if (isset($message)){
							?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Aviso!</strong> Datos procesados exitosamente.
						</div>	
							<?php
						}
						if (isset($error)){
							?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Error!</strong> No se pudo procesar los datos.
						</div>	
							<?php
						}
					?>	
					 <table class='table table-bordered'>
						<tr>
							<th class='text-center' colspan=5 >HISTORIAL DE INVENTARIO</th>
						</tr>
						<tr>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Acción de Usuario</td>
							<td>Código Afectado</td>
							<td class='text-center'>Total</td>
						</tr>
						<?php
							$query=mysqli_query($con,"select * from historial where id_producto='$id_producto'");
							while ($row=mysqli_fetch_array($query)){
								?>
						<tr>
							<td><?php echo date('d/m/Y', strtotime($row['fecha']));?></td>
							<td><?php echo date('H:i:s', strtotime($row['fecha']));?></td>
							<td><?php echo $row['nota'];?></td>
							<td><?php echo $row['referencia'];?></td>
							<td class='text-center'><?php echo number_format($row['cantidad']);?></td>
						</tr>		
								<?php
							}
						?>
					 </table>
                  </div>
                                    
				</div>

                </div>
              </div>
            </div>
            <br>
            <div class="row">


            <!-- <div class="col-sm-8 col-sm-offset-2 text-left">
                  <div class="row">
                    <?php
						if (isset($message)){
							?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Aviso!</strong> Datos procesados exitosamente.
						</div>	
							<?php
						}
						if (isset($error)){
							?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Error!</strong> No se pudo procesar los datos.
						</div>	
							<?php
						}
					?>	
					 <table class='table table-bordered'>
						<tr>
							<th class='text-center' colspan=5 >HISTORIAL DE INVENTARIO</th>
						</tr>
						<tr>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Acción de Usuario</td>
							<td>Código Afectado</td>
							<td class='text-center'>Total</td>
						</tr>
						<?php
							$query=mysqli_query($con,"select * from historial where id_producto='$id_producto'");
							while ($row=mysqli_fetch_array($query)){
								?>
						<tr>
							<td><?php echo date('d/m/Y', strtotime($row['fecha']));?></td>
							<td><?php echo date('H:i:s', strtotime($row['fecha']));?></td>
							<td><?php echo $row['nota'];?></td>
							<td><?php echo $row['referencia'];?></td>
							<td class='text-center'><?php echo number_format($row['cantidad']);?></td>
						</tr>		
								<?php
							}
						?>
					 </table>
                  </div>
                                    
                                    
				</div> -->
            </div>
          </div>
        </div>
    </div>
</div>



</div>

	
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
<script>
$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});
				location.replace('stock.php');
			}, 4000);
		  }
	});
  event.preventDefault();
})

	$('#myModal2').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var codigo = button.data('codigo') // Extract info from data-* attributes
		var nombre = button.data('nombre')
		var categoria = button.data('categoria')
		var precio = button.data('precio')
		var serial = button.data('serial')
		var stock = button.data('stock')
		var numero = button.data('numero')
		var marca = button.data('marca')
		var modelo = button.data('modelo')
		var cond = button.data('cond')
		var resp = button.data('resp')
		var asig = button.data('asig')
		var id = button.data('id')

		var modal = $(this)
		modal.find('.modal-body #mod_codigo').val(codigo)
		modal.find('.modal-body #mod_nombre').val(nombre)
		modal.find('.modal-body #mod_categoria').val(categoria)
		modal.find('.modal-body #mod_precio').val(precio)
		modal.find('.modal-body #mod_serial').val(serial)
		modal.find('.modal-body #mod_stock').val(stock)
		modal.find('.modal-body #mod_numero').val(numero)
		modal.find('.modal-body #mod_marca').val(marca)
		modal.find('.modal-body #mod_modelo').val(modelo)
		modal.find('.modal-body #mod_condicion' ).val(cond)
		modal.find('.modal-body #mod_responsable' ).val(resp)
		modal.find('.modal-body #mod_asignacion' ).val(asig)


		modal.find('.modal-body #mod_id').val(id)
	})
	
	function eliminar (id){
		var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el producto")){	
			location.replace('stock.php?delete='+id);
		}
	}
</script>