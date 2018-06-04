<?php

	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");

	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 // $id_categoria =intval($_REQUEST['id_categoria']);
		 $aColumns = array('numero_bien', 'asignacion_producto');//Columnas de busqueda
		 $sTable = "products";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		
		$sWhere.=" order by id_producto desc";
		
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 8; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			  <div class="table-responsive">
			  	<!--  <a class="thumbnail" href="producto.php?id=<?php echo $id_producto;?>"> -->
			  <table class="table">
				<tr  class="success">
					<th>Cod. Bien</th>
					<th>Descripción</th>
					<th>Reasignado a</th>
					<th>Precio Unit.</th>
					<th>Acción</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$num=$row['numero_bien'];
						$nom=$row['nombre_producto'];
						$pro=$row['asignacion_producto'];
						$pre=$row['precio_producto'];
					?>
					<tr>
						<td><?php echo $num; ?></td>
						<td><?php echo $nom; ?></td>
						<td><?php echo $pro; ?></td>
						<td><?php echo $pre; ?></td>
						<td><a href="pdf/reporte_reasignacion.php?id_producto=<?php echo $row ['id_producto']?>"><button type='button' class='btn btn-default btn-primary' title="Reporte factura"><span class='fa fa-file-pdf-o' aria-hidden='true' value='repor'></span></button></a></td>
					</tr>
					<?php
				}
				?>
				
			  </table>
			</div>
				<?php
				$nums=1;
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$id_serial=$row['serial'];
						$nombre_producto=$row['nombre_producto'];
						$stock=$row['stock'];
					?>
					
			

					<?php
					if ($nums%6==0){
						echo "<div class='clearfix'></div>";
					}
					$nums++;
				}
				?>
				<div class="clearfix"></div>
				<div class='row text-center'>
					<div ><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></div>
				</div>
			
			<?php
		}
	}
?>
