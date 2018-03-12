<?php
	extract($_GET);
	include('plantilla-serial.php');
	require('conexion.php');
	$id_producto = $_GET['id_producto'];

	$query = "SELECT fecha_products, codigo_producto, serial,  nombre_producto, `marca_producto`,modelo_producto , categorias.nombre_categoria , numero_bien, motivo.nombre_motivo `nombre_motivo`, `condicion_producto`, `responsable_entrega`, `asignacion_producto`, `codigo_inventario`, `precio_producto` ,stock FROM `products` 
	INNER JOIN categorias on products.id_categoria = categorias.id_categoria	
	INNER JOIN motivo on products.id_motivo = motivo.id_motivo 
	WHERE id_producto = $id_producto";
 
									 
	
	$resultado = $mysqli->query($query);

	$pdf = new PDF('L', 'mm', array(1000,500));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,utf8_decode('Fecha'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Cod. Producto'),1,0,'C',1);
	//$pdf->Cell(50,6,utf8_decode('Cantidad'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Serial'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Descripcion'),1,0,'C',1);
	$pdf->Cell(60,6,utf8_decode('Marca'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Modelo'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Categoría'),1,0,'C',1);
	//$pdf->Cell(70,6,utf8_decode('Área'),1,0,'C',1);
	$pdf->Cell(70,6,utf8_decode('N° Bien'),1,0,'C',1);
	$pdf->Cell(70,6,utf8_decode('Motivo'),1,0,'C',1);
	$pdf->Cell(90,6,utf8_decode('Condición'),1,0,'C',1);
	$pdf->Cell(75,6,utf8_decode('Recibido por'),1,0,'C',1);
	$pdf->Cell(70,6,utf8_decode('Asignado a'),1,0,'C',1);
	$pdf->Cell(70,6,utf8_decode('Cod. Inventario'),1,0,'C',1);
	//$pdf->Cell(70,6,utf8_decode('Cargo'),1,0,'C',1);
	$pdf->Cell(50,6,utf8_decode('Precio'),1,0,'C',1);
//	$pdf->Cell(30,6,utf8_decode('Disponible'),1,0,'C',1);
	$pdf->cell(70,6,utf8_decode('Disponible'),1,1,'C',1);

	while ( $row = $resultado->fetch_assoc() )
	{

	$pdf->Cell(70,6,utf8_decode($row['fecha_products']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['codigo_producto']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['serial']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
	//$pdf->Cell(25,6,utf8_decode($row['codigo_producto']),1,0,'C',0);	
	//$pdf->Cell(70,6,utf8_decode($row['nombre_producto']),1,0,'C',0);
	$pdf->Cell(60,6,utf8_decode($row['marca_producto']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['modelo_producto']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['nombre_categoria']),1,0,'C',0);
	//$pdf->Cell(70,6,utf8_decode($row['nombre_area']),1,0,'C',0);
	$pdf->Cell(70,6,utf8_decode($row['numero_bien']),1,0,'C',0);
	$pdf->Cell(70,6,utf8_decode($row['nombre_motivo']),1,0,'C',0);
	$pdf->Cell(90,6,utf8_decode($row['condicion_producto']),1,0,'C',0);
	$pdf->Cell(75,6,utf8_decode($row['responsable_entrega']),1,0,'C',0);
	$pdf->Cell(70,6,utf8_decode($row['asignacion_producto']),1,0,'C',0);
	//$pdf->Cell(70,6,utf8_decode($row['nombre_rango']),1,0,'C',0);
	//$pdf->Cell(70,6,utf8_decode($row['nombre_cargo']),1,0,'C',0);
	$pdf->Cell(70,6,utf8_decode($row['codigo_inventario']),1,0,'C',0);
	$pdf->Cell(50,6,utf8_decode($row['precio_producto']),1,0,'C',0);	
	$pdf->Cell(70,6,utf8_decode($row['stock']),1,1,'C',0);
	}

	


	$pdf->SetFont('Arial','',8);

	// while ($row = $resultado->fetch_assoc())
	// {
	// 	$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
	// 	$pdf->Cell(20,6,($row['id_municipio']),1,0,'C');
	// 	$pdf->Cell(70,6,utf8_decode($row['municipio']),1,0,'C');			
	// }
	$pdf->Output();
?>