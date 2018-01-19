<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_categoria="active";
	$title="Reportes | ";
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
		<div class="panel-heading">

			<h4><i class='glyphicon glyphicon-search'></i> Buscar Reporte</h4>
		</div>
		<div class="panel-body">
		
		 <div class="form-group">
			<label for="mod_serial" class="btn btn-success btn-lg" data-toggle="modal" data-target="">Reporte por Serial</label>
			<div class="col-sm-3">
				 <input type="text" class="form-control" id="mod_serial" name="mod_serial" placeholder="Ingrese el serial del producto" required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>



		   <p><div class="btn-group pull-justify">
				<button href="" type='button' class="btn btn-success btn-lg" data-toggle="modal" data-target="">Reporte General</button>
			</div></p>
		    <p><div class="btn-group pull-justify">
				<button href="#" type='button' class="btn btn-success btn-lg" data-toggle="modal" data-target="">Reporte de Área</button>
			</div></p>



			</div>
				  
				</div>
			  </div>


				</div>
			  </div>
		  </div>
			
		  </div>
		  </form>
		</div>
	  </div>
	</div>
