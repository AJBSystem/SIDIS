<?php

  session_start();
  if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
    exit;
        }
  
  /* Connect To Database*/
  require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
  require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
  
  $active_reporte="active";
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
 
    <div class="container"  class="row">
  <div class="panel panel-primary">
    <div style="background:#0079a3" class="panel-heading">
      <h4><i class='glyphicon glyphicon-search'></i> Buscar Reportes</h4>
        </div>

    <div class="panel-body">
     <div class="form-group">
      <label style="background:#00b3b3" for="mod_serial" class="btn btn-info btn-lg" data-toggle="modal" data-target=""><i class='glyphicon glyphicon-filter'></i>Reporte por Serial</label> 
      <div class="col-sm-3"><a href="/SIDIS/pdf/reporteserial.php">
         <input type="text" class="form-control" id="mod_serial" name="mod_serial" placeholder="Ingrese el serial del producto" right=required>
          <input type="hidden" name="mod_id" id="mod_id">
        </div>
        </div>

       <p><div class="btn-group pull-justify"> <a href="/SIDIS/pdf/reportegeneral.php">
        <button  style="background:#00b3b3" type='button' class="btn btn-info btn-lg" data-toggle="modal" data-target=""><i class=' glyphicon glyphicon-paste'></i>Reporte General</button>
      </div></p>

        <p><div class="btn-group pull-justify"><a href="/SIDIS/pdf/reportearea.php">
        <button style="background:#00b3b3" href="#" type='button' class="btn btn-info btn-lg" data-toggle="modal" data-target=""><i class='glyphicon glyphicon-open-file'></i>Reporte de Área</button>
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
