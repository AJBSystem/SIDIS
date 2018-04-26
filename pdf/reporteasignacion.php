<?php
  extract($_GET);
  include('plantilla_reasignacion.php');
  require('conexion.php');
  $id_producto = $_GET['id_producto'];

  $query = "SELECT fecha_products, codigo_producto, serial,  nombre_producto, `marca_producto`,modelo_producto , categorias.nombre_categoria , numero_bien, motivo.nombre_motivo `nombre_motivo`, `condicion_producto`, `responsable_entrega`, `asignacion_producto`, `codigo_inventario`, `precio_producto` ,stock FROM `products` 
  INNER JOIN categorias on products.id_categoria = categorias.id_categoria  
  INNER JOIN motivo on products.id_motivo = motivo.id_motivo 
  WHERE id_producto = $id_producto";
 
                   
  
  $resultado = $mysqli->query($query);

  $pdf = new PDF('L', 'mm', array(600,500));
  $pdf->AliasNbPages();
  $pdf->AddPage();

  $pdf->SetFillColor(80,150,200);
  $pdf->Rect(100,70,100,100,'F');


  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',12);
  
  $pdf->SetY(70);
  $pdf->SetX(200);
  $pdf->Cell(30,6,utf8_decode('Cod. Bien'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Descripcion'),1,0,'C',1);
  $pdf->Cell(120,6,utf8_decode('Reasignado a'),1,0,'C',1);
  $pdf->Cell(35,6,utf8_decode('Precio Unitario'),1,0,'C',1);
  $pdf->Ln(6);
  while ( $row = $resultado->fetch_assoc() )
  {
  $pdf->SetX(200);
  $pdf->Cell(30,6,utf8_decode($row['numero_bien']),1,0,'C',0);  
  $pdf->Cell(120,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
  $pdf->Cell(120,6,utf8_decode($row['asignacion_producto']),1,0,'C',0);
  $pdf->Cell(35,6,utf8_decode($row['precio_producto']),1,0,'C',0);  

  }

  


  $pdf->SetFont('Arial','',8);


  $pdf->Output();
?>