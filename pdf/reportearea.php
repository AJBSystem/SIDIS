<?php
	include('plantilla-area.php');
	require('conexion.php');


	$pdf = new PDF('L', 'mm', array(1000,500));
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(33,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(33,6,'Serial',1,0,'C',1);
	$pdf->Cell(33,6,utf8_decode('Código'),1,0,'C',1);
	$pdf->Cell(83,6,'Nombre',1,0,'C',1);
	$pdf->Cell(33,6,'Modelo',1,0,'C',1);
	$pdf->Cell(33,6,'Marca',1,0,'C',1);
	$pdf->Cell(43,6,utf8_decode('Categoría'),1,0,'C',1);
	$pdf->Cell(71,6,utf8_decode('N° Bien'),1,0,'C',1);
	$pdf->Cell(73,6,'Motivo',1,0,'C',1);
	$pdf->Cell(73,6,utf8_decode('Condición'),1,0,'C',1);
	$pdf->Cell(73,6,'Responsable',1,0,'C',1);
	$pdf->Cell(73,6,utf8_decode('Asignación'),1,0,'C',1);
	$pdf->Cell(73,6,'Rango',1,0,'C',1);
	$pdf->Cell(73,6,'Cargo',1,0,'C',1);
	$pdf->Cell(72,6,'Concepto',1,0,'C',1);
	$pdf->Cell(73,6,'Precio',1,1,'C',1);

	

	$pdf->Cell(33,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(33,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(33,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(83,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(33,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(33,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(43,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(71,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(72,6,utf8_decode(''),1,0,'C',0);
	$pdf->Cell(73,6,utf8_decode(''),1,0,'C',0);




	$pdf->SetFont('Arial','',8);

	// while ($row = $resultado->fetch_assoc())
	// {
	// 	$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
	// 	$pdf->Cell(20,6,($row['id_municipio']),1,0,'C');
	// 	$pdf->Cell(70,6,utf8_decode($row['municipio']),1,0,'C');			
	// }
	$pdf->Output();
?>