<form class="form-horizontal"  method="post">
<!-- Modal -->
<div id="remove-stock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Eliminar Stock</h4>
      </div>
      <div class="modal-body">
        
                <div class="form-group">
        <label for="mod_serial" class="col-sm-3 control-label">Serial</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="mod_serial" name="mod_serial" placeholder="Serial del producto" required>
          <input type="hidden" name="mod_id" id="mod_id">
        </div>
        </div>

         <div class="form-group">
        <label for="mod_codigo" class="col-sm-3 control-label">Código</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required></textarea>
        </div>
        </div>

         <div class="form-group">
        <label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required></textarea>
        </div>
        </div>

         <div class="form-group">
        <label for="mod_marca" class="col-sm-3 control-label">Marca</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_marca" name="mod_marca" placeholder="Marca del producto" required></textarea>
        </div>
        </div>

         <div class="form-group">
        <label for="mod_modelo" class="col-sm-3 control-label">Modelo</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_modelo" name="mod_modelo" placeholder="Modelo del producto" required></textarea>
        </div>
        </div>        
        
        <div class="form-group">
        <label for="mod_categoria" class="col-sm-3 control-label">Categoria</label>
        <div class="col-sm-8">
          <select class='form-control' name='mod_categoria' id='mod_categoria' required>
            <option value="">Seleccione una Categoria</option>
              <?php 
              $query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
              while($rw=mysqli_fetch_array($query_categoria)) {
                ?>
              <option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>      
                <?php
              }
              ?>
          </select>       
        </div>
        </div>

        <div class="form-group">
        <label for="mod_area" class="col-sm-3 control-label">Área</label>
        <div class="col-sm-8">
          <select class='form-control' name='mod_area' id='mod_area' required>
            <option value="">Seleccione un área</option>
              <?php 
              $query_area=mysqli_query($con,"select * from area order by nombre_area");
              while($rw=mysqli_fetch_array($query_area))  {
                ?>
              <option value="<?php echo $rw['id_area'];?>"><?php echo $rw['nombre_area'];?></option>      
                <?php
              }
              ?>
          </select>       
        </div>
        </div>

         <div class="form-group">
        <label for="mod_numero" class="col-sm-3 control-label">Número de Bien</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_numero" name="mod_numero" placeholder="Número de bien del producto" required></textarea>
        </div>
        </div>

        <div class="form-group">
        <label for="mod_motivo" class="col-sm-3 control-label">Motivo</label>
        <div class="col-sm-8">
          <select class='form-control' name='mod_motivo' id='mod_motivo' required>
            <option value="">Motivo del Inventario</option>
              <?php 
              $query_motivo=mysqli_query($con,"select * from motivo order by nombre_motivo");
              while($rw=mysqli_fetch_array($query_motivo))  {
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
          <textarea class="form-control" id="mod_condicion" name="mod_condicion" placeholder="Condición del producto" required></textarea>
        </div>
        </div>  

         <div class="form-group">
        <label for="mod_responsable" class="col-sm-3 control-label">Responsable</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_responsable" name="mod_responsable" placeholder="Responsable de la entrega de producto" required></textarea>
        </div>
        </div>              
        
         <div class="form-group">
        <label for="mod_asignacion" class="col-sm-3 control-label">Asignación</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_asignacion" name="mod_asignacion" placeholder="Asignación del producto" required></textarea>
        </div>
        </div>

        <div class="form-group">
        <label for="mod_rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-8">
          <select class='form-control' name='mod_rango' id='mod_rango' required>
            <option value="">Seleccione un Rango</option>
              <?php 
              $query_rango=mysqli_query($con,"select * from rango order by nombre_rango");
              while($rw=mysqli_fetch_array($query_rango)) {
                ?>
              <option value="<?php echo $rw['id_rango'];?>"><?php echo $rw['nombre_rango'];?></option>      
                <?php
              }
              ?>
          </select>       
        </div>
        </div>    

        <div class="form-group">
        <label for="mod_cargo" class="col-sm-3 control-label">Cargo</label>
        <div class="col-sm-8">
          <select class='form-control' name='mod_cargo' id='mod_cargo' required>
            <option value="">Seleccione un Cargo</option>
              <?php 
              $query_cargo=mysqli_query($con,"select * from cargo order by nombre_cargo");
              while($rw=mysqli_fetch_array($query_cargo)) {
                ?>
              <option value="<?php echo $rw['id_cargo'];?>"><?php echo $rw['nombre_cargo'];?></option>      
                <?php
              }
              ?>
          </select>       
        </div>
        </div>  

        <div class="form-group">
        <label for="mod_concepto" class="col-sm-3 control-label">Concepto</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="mod_concepto" name="mod_concepto" placeholder="Concepto del Inventario" required></textarea>
        </div>
        </div>   

       <div class="form-group">
        <label for="mod_stock" class="col-sm-3 control-label">Stock</label>
        <div class="col-sm-8">
          <input type="number" min="0" class="form-control" id="mod_stock" name="mod_stock" placeholder="Inventario inicial" required  maxlength="8" readonly>
        </div>
      </div>

        <div class="form-group">
        <label for="mod_precio" class="col-sm-3 control-label">Precio</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
        </div>
        </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">Guardar datos</button>
      </div>
    </div>

  </div>
</div>
</form>