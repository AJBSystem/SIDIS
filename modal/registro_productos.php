<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo producto</h4>
		  </div>
		  <div class="modal-body">

		<form class="form-horizontal" method="POST" id="guardar_producto" name="guardar_producto" enctype="multipart/form-data" onsubmit="setTimeout('document.forms[0].reset()', 200)" action="../ajax/nuevo_producto.php">
			<div id="resultados_ajax_productos"></div>
		<!-- action="<?php echo $_SERVER['PHP_SELF'];?>" -->


			  <div class="form-group">
				<label for="serial" class="col-sm-3 control-label">Serial</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial del producto" required>
				</div>
			  </div>


			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Cod producto</label>
				<div class="col-sm-8">
					<input class="form-control" id="codigo" name="codigo" placeholder="Código del producto" required maxlength="255" ></input>				  
				</div>
			  </div>


			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
					<input class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required maxlength="255" ></input>				  
				</div>
			  </div>			


			  <div class="form-group">
				<label for="marca" class="col-sm-3 control-label">Marca</label>
				<div class="col-sm-8">
					<input class="form-control" id="marca" name="marca" placeholder="Marca del producto" required maxlength="255" ></input>				  
				</div>
			  </div>


			  <div class="form-group">
				<label for="modelo" class="col-sm-3 control-label">Modelo</label>
				<div class="col-sm-8">
					<input class="form-control" id="modelo" name="modelo" placeholder="Modelo del producto" required maxlength="255" ></input>				  
				</div>
			  </div>


			 <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Categoría</label>
				<div class="col-sm-8">
					<select class='form-control' name='categoria' id='categoria' required>
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
				</div>
			  </div>
			

			 <div class="form-group">
				<label for="numero" class="col-sm-3 control-label">N° Bien</label>
				<div class="col-sm-8">
					<input class="form-control" id="numero" name="numero" placeholder="Número de bien del producto" required maxlength="100" ></input>				  
				</div>
			  </div> 

			<div class="form-group">
				<label for="motivo" class="col-sm-3 control-label">Motivo</label>
				<div class="col-sm-8">
					<select class='form-control' name='motivo' id='motivo' required>
						<option value="">Motivo del Inventario</option>
							<?php 
							$query_motivo=mysqli_query($con,"select * from motivo order by nombre_motivo");
							while($rw=mysqli_fetch_array($query_motivo))	{
								?>
							<option value="<?php echo $rw['id_motivo'];?>"><?php echo $rw['nombre_motivo'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>

			 <div class="form-group">
				<label for="condicion" class="col-sm-3 control-label">Condición</label>
				<div class="col-sm-8">
					<input class="form-control" id="condicion" name="condicion" placeholder="Condición del producto" required maxlength="100" ></input>				  
				</div>
			  </div> 

			 <div class="form-group">
				<label for="responsable" class="col-sm-3 control-label">Recibido por</label>
				<div class="col-sm-8">
					<input class="form-control" id="responsable" name="responsable" placeholder="Responsable de la entrega del producto" required maxlength="100" ></input>		  
				</div>
			  </div>

			 <div class="form-group">
				<label for="asignacion" class="col-sm-3 control-label">Asignado a</label>
				<div class="col-sm-8">
					<input class="form-control" id="asignacion" name="asignacion" placeholder="Asignación del producto" required maxlength="100" ></input>		  
				</div>
			  </div> 	

				<div class="form-group">
				<label for="codigoi" class="col-sm-3 control-label">Cod inventario</label>
				<div class="col-sm-8">
					<input class="form-control" id="codigoi" name="codigoi" placeholder="Código del inventario" required maxlength="255" ></input>	  
				</div>
			  	</div>


			  <div class="form-group">
				<label for="concepto" class="col-sm-3 control-label">Concepto</label>
				<div class="col-sm-8">
					<input class="form-control" id="concepto" name="concepto" placeholder="Concepto del Inventario" required maxlength="255" ></input>				  
				</div>
			  </div>

			<div class="form-group">
				<label for="stock" class="col-sm-3 control-label">Stock</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad de productos" required  maxlength="8">
				</div>
			</div>			 			  		   			   

			<div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			</div>
			<!-- Imagen del producto -->
<div class="form-group">
<label for="stock" class="col-sm-3 control-label">Imagen</label>
<div class="col-sm-8">
<div class="fileinput fileinput-new input-group" data-provides="fileinput">
<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
<span class="input-group-addon btn btn-default btn-file" style="padding-bottom: 2px;"><span class="fileinput-new"></span><span class="fileinput-exists"></span><input name="imagefile" id="imagefile" type="file"></span>
		</div>
	</div>
</div>
			<!-- fin de imagen del producto  -->
		  </div>
		  <div class="modal-footer">
		  <!-- <button type="submit" class="btn btn-primary"  id="guardar_datos" onclick = "location='stock.php'">Guardar Datos</button> -->
		  	<button type="submit" class="btn btn-primary"  id="guardar_datos">Guardar Datos</button>
		  	<!--  <input type="submit" class="btn btn-primary" id="guardar_datos" value="Guardar Datos"></input>	 -->
		  <!-- 	<button type="reset" class="btn btn-primary">Limpiar</button> -->
			<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
<script src="../jquery-1.11.1.min.js"></script>
	<?php
		}
	?>