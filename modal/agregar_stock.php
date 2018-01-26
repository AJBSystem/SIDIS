<form class="form-horizontal"  method="post" name="add_stock">
<!-- Modal -->
<div id="add-stock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Agregar Stock</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Cantidad</label>
            <div class="col-sm-6">
              <input type="number" min="1" name="quantity" class="form-control" id="quantity" value="" placeholder="Cantidad" required="">
            </div>
          </div>
          
<label for="codigo" class="col-sm-3 control-label">Código</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo del producto" required>
        </div>
        </div>

        <div class="form-group">
        <label for="serial" class="col-sm-3 control-label">Serial</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="serial" name="serial" placeholder="Serial del producto" required maxlength="255" ></textarea>          
        </div>
        </div>

        <div class="form-group">
        <label for="nombre" class="col-sm-3 control-label">Nombre</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required maxlength="255" ></textarea>          
        </div>
        </div>      

        <div class="form-group">
        <label for="marca" class="col-sm-3 control-label">Marca</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="marca" name="marca" placeholder="Marca del producto" required maxlength="255" ></textarea>         
        </div>
        </div>

        <div class="form-group">
        <label for="modelo" class="col-sm-3 control-label">Modelo</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="modelo" name="modelo" placeholder="Modelo del producto" required maxlength="255" ></textarea>          
        </div>
        </div>

       <div class="form-group">
        <label for="categoria" class="col-sm-3 control-label">Categoría</label>
        <div class="col-sm-8">
          <select class='form-control' name='categoria' id='categoria' required>
            <option value="">Seleccione una categoría</option>
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
        <label for="area" class="col-sm-3 control-label">Área</label>
        <div class="col-sm-8">
          <select class='form-control' name='area' id='area' required>
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
        <label for="numero" class="col-sm-3 control-label">Número de Bien</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="numero" name="numero" placeholder="Número de bien del producto" required maxlength="100" ></textarea>          
        </div>
        </div> 

      <div class="form-group">
        <label for="motivo" class="col-sm-3 control-label">Motivo</label>
        <div class="col-sm-8">
          <select class='form-control' name='motivo' id='motivo' required>
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
        <label for="condicion" class="col-sm-3 control-label">Condición</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="condicion" name="condicion" placeholder="Condición del producto" required maxlength="100" ></textarea>         
        </div>
        </div> 

       <div class="form-group">
        <label for="responsable" class="col-sm-3 control-label">Responsable</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="responsable" name="responsable" placeholder="Responsable de la entrega del producto" required maxlength="100" ></textarea>     
        </div>
        </div>

       <div class="form-group">
        <label for="asignacion" class="col-sm-3 control-label">Asignación</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="asignacion" name="asignacion" placeholder="Asignación del producto" required maxlength="100" ></textarea>      
        </div>
        </div>  

      <div class="form-group">
        <label for="rango" class="col-sm-3 control-label">Rango</label>
        <div class="col-sm-8">
          <select class='form-control' name='rango' id='rango' required>
            <option value="">Seleccione un rango</option>
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
        <label for="cargo" class="col-sm-3 control-label">Cargo</label>
        <div class="col-sm-8">
          <select class='form-control' name='cargo' id='cargo' required>
            <option value="">Seleccione un cargo</option>
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
        <label for="concepto" class="col-sm-3 control-label">Concepto</label>
        <div class="col-sm-8">
          <textarea class="form-control" id="concepto" name="concepto" placeholder="Concepto del Inventario" required maxlength="255" ></textarea>          
        </div>
        </div>

          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>

  </div>
</div> 
 </form>