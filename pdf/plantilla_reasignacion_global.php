<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('../img/logo-Ministerio.jpg', 100,13,30);
		$this->Image('../img/cicpc_logo_trns.png', 470,5,30);

		$this->SetFont('Arial','B');
		
		$this->Cell(30);
		$this->SetX(200);
		$this->Cell(200,30,utf8_decode ('ACTA DE REASIGNACIÓN DE BIENES NACIONALES'),0,0,'C');
		$this->SetX(202);
		$this->Cell(40,105,date('d/m/Y'),0,0,'L');
		$this->Ln(5);

		$this->Ln(10);
		$this->Cell(30);
		$this->SetX(280);
		$this->Cell(25,60,utf8_decode ('Reporte de Reasignación'),2,1,'C');
		$this->Ln(20);

				$this->SetX(150);
				$this->Cell(800,-85,utf8_decode('En la ciudad de Caracas,                     se llevó a cabo por parte de la división de sistemas la entrega de los bienes muebles que se especifican a continuación'),0,0,'L');
				$this->Ln(10);
	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I', 8);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

}
?>