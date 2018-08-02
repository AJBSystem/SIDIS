<?php
  extract($_GET);
  include('plantilla_reasignacion.php');
  require('conexion.php');
  
$id_pro = $_GET['id_producto'];
$query = "SELECT id_producto, numero_bien,nombre_producto, asignacion_producto, foto, COUNT(asignacion_producto) as cantidad, precio_producto 
          FROM products 
          WHERE id_producto = $id_pro"; 

  $resultado = $mysqli->query($query);
  //$ruta_img=$resultado['foto'];
  $pdf = new PDF('L', 'mm', array(600,500));
  $pdf->AliasNbPages();
  $pdf->AddPage();


  // AQUI VA LA FOTO//
  // $pdf->SetFillColor(80,150,200);
  // $pdf->Rect(80,70,100,100,'F');
 
  /// FIN FOTO//

  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  
  $pdf->SetY(70);
  $pdf->SetX(180);
  $pdf->Cell(30,6,utf8_decode('Cantidad'),1,0,'C',1);
  $pdf->Cell(30,6,utf8_decode('Cod. Bien'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Descripcion'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Reasignado a'),1,0,'C',1);
  $pdf->Cell(35,6,utf8_decode('Precio Unitario'),1,0,'C',1);
  $pdf->Ln(6);
  while ( $row = $resultado->fetch_assoc() )
  {
  $pdf->SetX(180);
  $pdf->Cell(30,6,utf8_decode($row['cantidad']),1,0,'C',0);
  $pdf->Cell(30,6,utf8_decode($row['numero_bien']),1,0,'C',0);  
  $pdf->Cell(120,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
  $pdf->Cell(120,6,utf8_decode($row['asignacion_producto']),1,0,'C',0);
  $pdf->Cell(35,6,utf8_decode($row['precio_producto']),1,1,'C',0);  
  $pdf->SetY(70);
  $pdf->SetX(80);
  $pdf->Cell(100,100, $pdf->Image('../img/'.$row['foto'], $pdf->getx(), $pdf->GetY(),100,100),1); 
  }
  $pdf->SetFont('Arial','',8);


  $pdf->Output();
?>