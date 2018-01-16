<?php
 include("navbar.php");

$ced = $_POST['txtced'];


//----------------1er query--------------------------------//
$query1 = "SELECT cedula,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,sexo,fecha_nacimiento::date,grupo.valor grupo_sanguineo,n.valor nivel_academico,email,telefono,direccion_residencia 
FROM persona p
inner join nomenclador n 
on p.nivel_academico=n.id 
inner join nomenclador as grupo 
on p.grupo_sanguineo=grupo.id
  WHERE p.cedula=$ced";
$res1 = pg_query($query1) or die('Fallo el query:'.pg_last_error());
$fila1 = pg_fetch_array($res1);

//-----------------2do query--------------------------------//
$query2 = "SELECT f.despacho ubicacion,f.cargo,f.ultimo_ascenso::date,f.credencial,f.fecha_ingreso::date,rango.valor rango, EXTRACT(YEAR FROM CURRENT_DATE)-EXTRACT(YEAR FROM F.FECHA_INGRESO) ANTIGUEDAD, EXTRACT(YEAR FROM CURRENT_DATE)-EXTRACT(YEAR FROM F.ultimo_ascenso) jerarquia 
FROM funcionario f 
INNER JOIN nomenclador rango 
  on f.rango = rango.id
INNER JOIN persona p
 on f.persona = p.id_persona
 where p.cedula=$ced";
$res2 = pg_query($query2) or die('Fallo el query:'.pg_last_error());
$fila2 = pg_fetch_array($res2); 
//-----------------3er query--------------------------------//
$query3 = "SELECT cargo, hc.descripcion as cargog, hc.desde::date, hc.hasta::date 
FROM historicocargos as hc
INNER JOIN funcionario as f
  on hc.id_funcionario = f.id_funcionario
INNER JOIN persona as p 
  on f.persona = p.id_persona 
WHERE p.cedula = $ced  order by hc.desde";
$res3 = pg_query($query3) or die('Fallo el query:'.pg_last_error());
$fila3 = pg_fetch_array($res3);

//para obtener todos los datos de los cargos gerenciales ocupados
$arreglo = array();
while ($fila = pg_fetch_array($res3)) {
	$arreglo[] = $fila;
}
//-----------------------------------------------------------//

if($fila1 == 0)
 {
  header('location:../View/login/panel.php?var=<strong>Error: </strong> El Funcionario no existe en la Base de Datos');
 }
 
?>

<!DOCTYPE 
<html>
<head>
	<title>Consulta de Datos de Funcionarios</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../lib/bootstrap-3.2.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/css.css">
<script src="../lib/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="../lib/jquery-1.9.1.js"></script>
<script src="../lib/bootstrap-3.2.0/js/bootstrap.js"></script>
<script src="../js/javascript.js"></script>
</head>

<body>
<form name="form1" action="" method="post">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ol class="breadcrumb">
        <li><a href="../View/login/panel.php" target="_parent">Inicio</a></li>      
      </ol>
    </div>
  </div>

		<div class="container">
	<div class="row">
		<div class="col-md-12">
				<div role="tabpanel">
			
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#paso1" aria-controls="home" role="tab" data-toggle="tab" onclick="mostrarFormA()"><strong>Datos Personales</strong></a></li>
						<li role="presentation"><a href="#parteA" aria-controls="profile" role="tab" data-toggle="tab" onclick="mostrarFormB()"><strong>Datos Laborales</strong></a></li>
						<li role="presentation"><a href="#parteC" aria-controls="messages" role="tab" data-toggle="tab" onclick="mostrarFormC()"><strong>Datos Gerenciales</strong></a></li>
					</ul>

				<!-- Tab panes -->
					<div class="tab-content">
						<div class="row">
							<div class="col-md-12">
								<div role="tabpanel" class="tab-pane active" id="parteA">
									<br />
									<br />
                          <div class="form2" id="">
                          
										
                    <div class="row">
											
                      <div class="col-md-3">
												<div class="form-group has-feedback">
													<?php 
														$query4 = pg_query("SELECT foto FROM persona WHERE cedula='$ced'");	
														while ($res= pg_fetch_array($query4)) {
															echo '<img src="'.$res['foto'].'" width="200" height="200">';
														}
										      ?>
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
				                                    <label class="laberl-control">Primer Nombre</label>
				                                   	<input type="text" name="primernombre" disabled class="form-control" Value="<?php echo $fila1['primer_nombre']; ?>"></input>
				                           
				                                    </div>
				                                </div>
											<div class="col-md-3">
												<div class="form-group">
													<label class="laberl-control">Segundo Nombre</label>
										<input type="text" name="segundonombre" disabled class="form-control"  Value="<?php echo $fila1['segundo_nombre']; ?>"></input>
                               					</div>
											</div>
                                             <div class="col-md-3">
                            			<div class="form-group">
                            			<label>Primer Apellido</label>
                            		<input type="text" name="primerapellido" disabled class="form-control"  Value="<?php echo $fila1['primer_apellido']; ?>"></input>
                              	 		</div>
                            		</div>
                                     <div class="col-md-3">
                            			<div class="form-group">
                            			<label>Segundo Apellido</label>
                            		<input type="text" name="segundoapellido" disabled class="form-control"  Value="<?php echo $fila1['segundo_apellido']; ?>"></input>
                               		</div>
                            	</div>
                            <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Genero</label>
                            		<input type="text" name="sexo" disabled class="form-control"  Value="<?php echo $fila1['sexo']; ?>"></input>
                            		
                               	</div>
                            </div>
                             <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Cedula</label>
                            		<input type="text" name="Cedula" disabled class="form-control" value="<?php echo $fila1['cedula']; ?>"></input>
                               	</div>
                            </div>

                            <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Fecha de Nacimiento</label>
                            		<input type="date" name="fechanacimiento" disabled class="form-control"  Value="<?php echo $fila1['fecha_nacimiento']; ?>"></input>
                               	</div>
                            </div>

                            <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Email</label>
                            		<input type="text" name="correoelectronico" disabled class="form-control"  Value="<?php echo $fila1['email']; ?>"></input>
                               	</div>
                            </div>
                          <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Telefono</label>
                            		<input type="text" name="telefono" disabled class="form-control"  Value="<?php echo $fila1['telefono']; ?>"></input>
                               	</div>
                            </div>
                             <div class="col-md-12">
                            	<div class="form-group">
                            	  <label>Direccion</label>
                            		<input type="text" name="direccion" disabled class="form-control"  Value="<?php echo $fila1['direccion_residencia']; ?>"></input>
                               		</div>
                           		 </div>
                           	  </div>
                          	
                         </div>
                       </div>
                    </div>
                 </div>
              </div>
          </div>
	
  	<?php
			$total = pg_num_rows($res1);
			for ($i=0; $i<$total; $i++) { 
		?>
		<?php } ?>

        				<div class="row">
							<div class="col-md-12">
								<div role="tabpanel" class="tab-pane" id="parteB">
								<br />
								  <div class="form2">
									<div class="row">
										<div class="col-md-3" id="">
											<label>Credencial</label>
                            				<input type="text" name="Credencial" disabled class="form-control" value="<?php echo $fila2['credencial']; ?>"></input>
										</div>
									
                                 <div class="col-md-3">
                            	  <div class="form-group">
                            		<label>Fecha de Ingreso</label>
                            		<input type="date" name="fecha de ingreso" disabled class="form-control" value="<?php echo $fila2['fecha_ingreso']; ?>"></input>
                               	</div>
                            </div>	




                            	  <div class="col-md-3">
                            	    <div class="form-group">
                            		<label>Antiguedad Policial</label>
                            		<input type="text" name="antiguedad" disabled class="form-control"  Value="<?php echo $fila2['antiguedad']; ?>"></input>
                               	</div>
                            </div>



                         <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Fecha Ult. Ascenso</label>
                            		<input type="date" name="fecha" disabled class="form-control"  Value="<?php echo $fila2['ultimo_ascenso']; ?>"></input>
                               	</div>
                            </div>	
                             <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Jerarquia</label>
                            		<input type="text" name="jerarquia" disabled class="form-control"  Value="<?php echo $fila2['rango']; ?>"></input>
                               	</div>
                            </div>	
                            




                         <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Antiguedad Jerarquia</label>
                            		<input type="text" name="cargo" disabled class="form-control"  Value="<?php echo $fila2['jerarquia']; ?>"></input>
                               	</div>
                            </div>	





                         <div class="col-md-3">
                            	<div class="form-group">
                            		<label>Ubicación Administrativa</label>
                            		<input type="text" name="ultimo" disabled class="form-control"  Value="<?php echo $fila2['ubicacion']; ?>"></input>
                               	</div>
                             </div>

                          <div class="col-md-3">
                        <div class="form-group has-feedback">
                            <label>Cargo Actual</label>
                            <input type="text" name="cargo" disabled class="form-control" value="<?php echo $fila3['cargo']; ?>"></input>
                          </div>
                        </div>


                          </div>
                        </div>
                      </div>
                    </div>
                 </div>   	
		
    <?php
			$total2 = pg_num_rows($res2);
			for ($i=0; $i<$total2; $i++) { 
		?>
		<?php } ?>

				<div class="row">
              <div class="col-md-12">
                <div role="tabpanel" class="tab-pane" id="parteC">
                <br />
                <div class="form2">
                  <div class="row">
                  

                    <?php                                       
                    foreach ($arreglo as $file):

                    ?>

                      <div class="col-md-8">
                      <div class="form-group has-feedback">
                        <label>Cargos Gerenciales Ocupados</label>
                                <input type="text" name="CargosGeren" disabled class="form-control" value="<?php echo $file['cargog']; ?>"></input>
           
                      </div>
                    </div>

                                     <div class="col-md-2">
                                  <div class="form-group">
                                    <label>Desde</label>
                                    <input type="date" name="desde" disabled class="form-control" value="<?php echo $file['desde']; ?>"></input>
                                    </div>
                              </div>  

                        <div class="col-md-2">
                              <div class="form-group">
                                <label>Hasta</label>
                                <input type="date" name="hasta" disabled class="form-control" value="<?php echo $file['hasta']; ?>"> </input>
                                </div>
                        </div>          
  <?php 
    endforeach;
  ?>
<div class="col-md-12" align="center">
<a href="../pdfphp/reporte.php?cedula=<?php echo $fila1['cedula']; ?>" class="btn btn-primary btn-mg ">Imprimir</a>
<a href="../View/login/panel.php" class="btn btn-primary btn-mg ">Volver</a>
</div>
  </form>   
  
	</body>
 
 </html>
<br>	