	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto" enctype="multipart/form-data">
			<div id="resultados_ajax2"></div>


			  <div class="form-group">
				<label for="mod_serial" class="col-sm-3 control-label">Serial</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_serial" name="mod_serial" required></input>
				</div>
			</div>


			  <div class="form-group">
				<label for="mod_codigo" class="col-sm-3 control-label">Cod producto</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" required>
					<input type="hidden" name="mod_id" id="mod_id"> 
				</div>
			  </div>


			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_nombre" name="mod_nombre" required></input>
				</div>
			  </div>
			  

			<div class="form-group">
				<label for="mod_marca" class="col-sm-3 control-label">Marca</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_marca" name="mod_marca" required></input>
				</div>
			  </div>



			   <div class="form-group">
				<label for="mod_modelo" class="col-sm-3 control-label">Modelo</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_modelo" name="mod_modelo" required></input>
				</div>
			  </div>


			  <div class="form-group">
				<label for="mod_categoria" class="col-sm-3 control-label">Categoría</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_categoria' id='mod_categoria' required>
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
				<label for="mod_numero" class="col-sm-3 control-label">N° Bien</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_numero" name="mod_numero" required></input>
				</div>
			  </div>


			  <div class="form-group">
				<label for="mod_motivo" class="col-sm-3 control-label">Motivo</label>
				<div class="col-sm-8">
					<select class='form-control' name='mod_motivo' id='mod_motivo' required>
						<option value="">Selecciona una categoría</option>
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
				<label for="mod_condicion" class="col-sm-3 control-label">Condición</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_condicion" name="mod_condicion" required></input>
				</div>
			  </div>	



			   <div class="form-group">
				<label for="mod_responsable" class="col-sm-3 control-label">Recibido por</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_responsable" name="mod_responsable" required></input>
				</div>
			  </div>			  		  
			  


			   <div class="form-group">
				<label for="mod_asignacion" class="col-sm-3 control-label">Asignado A</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_asignacion" name="mod_asignacion" required></input>
				</div>
			  </div>

			  
			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_precio" name="mod_precio" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>
			 
				
				<div class="form-group">
				<label for="mod_codi" class="col-sm-3 control-label">Cod inventario</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_codi" name="mod_codi" required>
				</div>
			  </div>


			<div class="form-group">
				<label for="mod_concepto" class="col-sm-3 control-label">Concepto</label>
				<div class="col-sm-8">
				  <input class="form-control" id="mod_concepto" name="mod_concepto" placeholder="Concepto del Inventario" required>
				</div>
			  </div>
			

			<!-- Imagen del producto -->
			<div class="form-group">
			<label for="mod_imagen" class="col-sm-3 control-label">Imagen</label>
			<div class="col-sm-8">
			<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
			<span class="input-group-addon btn btn-default btn-file" style="padding-bottom: 2px;"><span class="fileinput-new"></span><span class="fileinput-exists"></span>
			<input name="mod_imagen" id="mod_imagen" type="file"></span>
			
					</div>
					<input class="form-control" id="mod_foto" name="mod_foto">
				</div>
			</div>


			


		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>