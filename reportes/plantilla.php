<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('../img/logo-Ministerio.jpg',35,5,30);
		$this->Image('../img/logo.jpg',305,5,30);

		$this->SetFont('Arial','B',10);

		$this->Cell(30);
		$this->Cell(290,10, 'REPUBLICA BOLIVARIANA DE VENEZUELA',0,0,'C');
		$this->Ln(5);

		$this->Cell(30);
		$this->Cell(290,10, 'MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES INTERIORES, JUSTICIA Y PAZ',2,0,'C');
		$this->Ln(5);

		$this->Cell(30);
		$this->Cell(290,10, 'CUERPO DE INVESTIGACIONES CIENTIFICA, PENALES Y CRIMINALISTICAS',2,0,'C');
		$this->Ln(5);

		$this->Cell(30);
		$this->Cell(290,10, 'SUB DIRECCION GENERAL',2,0,'C');
		$this->Ln(5);

		$this->Cell(30);
		$this->Cell(290,10, 'DIRECCION DE TECNOLOGIA - DIVISION DE SISTEMAS',2,0,'C');
		$this->Ln(5);


		$this->Ln(10);
		$this->Cell(30);
		$this->Cell(290,10, 'Reporte por Funcionario',2,0,'C');
		$this->Ln(15);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I', 8);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

}


?>