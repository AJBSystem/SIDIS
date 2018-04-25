<?php
  include('plantilla_reasignacion.php');
  require('conexion.php');

  $query = "SELECT * FROM products";
          

  $resultado = $mysqli->query($query);

  $pdf = new PDF('L', 'mm', array(1000,500));
  $pdf->AliasNbPages();
  $pdf->AddPage();

$pdf->SetFillColor(80,150,200);
$pdf->Rect(40,73,50,48,'F');
// para mostrar la foto en forma dinamica
// $query4 = mysqli_query("SELECT foto FROM persona WHERE cedula='$ced'"); 
$directorio = '<img src="../img/sin-foto.png"';
// $res = mysqli_fetch_array($query4);

// if (file_exists($res['foto'])){
// $pdf->Image($res['foto'],40,73,50,48);//aqui va la imagen
// }else{
  // $res = '';
// $pdf->Cell($res);//aqui va la imagen
// }





  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);


  $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
  // $pdf->Cell(30,6,'Serial',1,0,'C',1);
  $pdf->Cell(25,6,utf8_decode('Código'),1,0,'C',1);
  $pdf->Cell(50,6,utf8_decode('N° Bien'),1,0,'C',1);
  $pdf->Cell(363,6,utf8_decode('Descripción'),1,0,'C',1);
  $pdf->Cell(25,6,utf8_decode('Código'),1,0,'C',1);
  
  
  $pdf->Cell(70,6,'Concepto',1,0,'C',1);
  // $pdf->Cell(70,6,utf8_decode('Área'),1,0,'C',1);
  
 
  $pdf->Cell(363,6,utf8_decode('Condición'),1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Asignación'),1,0,'C',1);
  $pdf->Cell(30,6,'Precio',1,1,'C',1);

  
  while ( $row = $resultado->fetch_assoc() )
  {
  $pdf->Cell(20,6,utf8_decode($row['stock']),1,0,'C',0);
  // $pdf->Cell(30,6,utf8_decode($row['serial']),1,0,'C',0);
  $pdf->Cell(25,6,utf8_decode($row['codigo_producto']),1,0,'C',0);
  $pdf->Cell(50,6,utf8_decode($row['numero_bien']),1,0,'C',0);
  $pdf->Cell(363,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
  // $pdf->Cell(30,6,utf8_decode($row['modelo_producto']),1,0,'C',0);
  // $pdf->Cell(30,6,utf8_decode($row['marca_producto']),1,0,'C',0);
  // $pdf->Cell(40,6,utf8_decode($row['id_categoria']),1,0,'C',0);
  $pdf->Cell(25,6,utf8_decode($row['codigo_inventario']),1,0,'C',0); 
  $pdf->Cell(70,6,utf8_decode($row['concepto_inventario']),1,0,'C',0);
  // $pdf->Cell(70,6,utf8_decode($row['id_area']),1,0,'C',0);
  
  // $pdf->Cell(70,6,utf8_decode($row['id_motivo']),1,0,'C',0);
  $pdf->Cell(363,6,utf8_decode($row['condicion_producto']),1,0,'C',0);
  // $pdf->Cell(70,6,utf8_decode($row['responsable_entrega']),1,0,'C',0);
  // $pdf->Cell(70,6,utf8_decode($row['asignacion_producto']),1,0,'C',0);
  // $pdf->Cell(70,6,utf8_decode($row['id_rango']),1,0,'C',0);
  // $pdf->Cell(70,6,utf8_decode($row['id_cargo']),1,0,'C',0);
  
  $pdf->Cell(30,6,utf8_decode($row['precio_producto']),1,1,'C',0);  
  }
  


  $pdf->SetFont('Arial','',8);

  // while ($row = $resultado->fetch_assoc())
  // {
  //  $pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
  //  $pdf->Cell(20,6,($row['id_municipio']),1,0,'C');
  //  $pdf->Cell(70,6,utf8_decode($row['municipio']),1,0,'C');      
  // }
  $pdf->Output();
?><?php
  include('plantilla.php');
  require('conexion.php');

  // $query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";

  $resultado = $mysqli->query($query);

  $pdf = new PDF('L', 'mm', array(1000,500));
  $pdf->AliasNbPages();
  $pdf->AddPage();

  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
  $pdf->Cell(30,6,'Serial',1,0,'C',1);
  $pdf->Cell(25,6,utf8_decode('Código'),1,0,'C',1);
  $pdf->Cell(70,6,'Nombre',1,0,'C',1);
  $pdf->Cell(30,6,'Modelo',1,0,'C',1);
  $pdf->Cell(30,6,'Marca',1,0,'C',1);
  $pdf->Cell(40,6,utf8_decode('Categoría'),1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Área'),1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('N° Bien'),1,0,'C',1);
  $pdf->Cell(70,6,'Motivo',1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Condición'),1,0,'C',1);
  $pdf->Cell(70,6,'Responsable',1,0,'C',1);
  $pdf->Cell(70,6,utf8_decode('Asignación'),1,0,'C',1);
  $pdf->Cell(70,6,'Rango',1,0,'C',1);
  $pdf->Cell(70,6,'Cargo',1,0,'C',1);
  $pdf->Cell(70,6,'Concepto',1,0,'C',1);
  $pdf->Cell(70,6,'Precio',1,1,'C',1);

  

  $pdf->Cell(20,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(30,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(25,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(30,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(30,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(40,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,0,'C',0);
  $pdf->Cell(70,6,utf8_decode(''),1,1,'C',0); 



  $pdf->SetFont('Arial','',8);

  // while ($row = $resultado->fetch_assoc())
  // {
  //  $pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
  //  $pdf->Cell(20,6,($row['id_municipio']),1,0,'C');
  //  $pdf->Cell(70,6,utf8_decode($row['municipio']),1,0,'C');      
  // }
  $pdf->Output();
?>