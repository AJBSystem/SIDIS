<?php
  extract($_GET);
  include('plantilla_reasignacion_global.php');
  require('conexion.php');
  
  $query="SELECT * FROM `products` WHERE asignacion_producto = 'Anthony Benitez'";             
  
  $resultado = $mysqli->query($query);

  $pdf = new PDF('L', 'mm', array(400,300));
  $pdf->AliasNbPages();
  $pdf->AddPage();

  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  
  $pdf->SetY(70);
  $pdf->SetX(30);
  $pdf->Cell(30,6,utf8_decode('Cod. Bien'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Descripcion'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Reasignado a'),1,0,'C',1);
  $pdf->Cell(35,6,utf8_decode('Precio Unitario'),1,0,'C',1);
  $pdf->Ln(6);
  while ( $row = $resultado->fetch_assoc() )
  {
  $pdf->SetX(30);
  $pdf->Cell(30,6,utf8_decode($row['numero_bien']),1,0,'C',0);  
  $pdf->Cell(120,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
  $pdf->Cell(120,6,utf8_decode($row['asignacion_producto']),1,0,'C',0);
  $pdf->Cell(35,6,utf8_decode($row['precio_producto']),1,1,'C',0);  
  }
  $pdf->SetFont('Arial','',8);
  $pdf->Output();
?>