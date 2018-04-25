<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('../img/logo-Ministerio.jpg', 35,15,30);
		$this->Image('../img/cicpc_logo_trns.png', 875,5,30);

		$this->SetFont('Arial','B',10);

		$this->Cell(30);
		$this->SetX(350);
		$this->Cell(290,10,utf8_decode ('ACTA DE REASIGNACIÓN DE BIENES NACIONALES'),0,0,'C');
		$this->Ln(5);

		$this->Ln(10);
		$this->Cell(30);
		$this->SetX(350);
		$this->Cell(290,10,utf8_decode ('Reporte de Reasignación'),2,1,'C');
		$this->Ln(20);

				$this->SetX(10);
				$this->Cell(865,10,utf8_decode('En la ciudad de Caracas, se llevó a cabo por parte de la división de sistemas la entrega a la: de los bienes muebles que se especifican a continuación'),0,0,'L');
				$this->Ln(10);
				
				$this->Cell(846,10,utf8_decode('LCDA. KATIRIA ELENA PÉREZ SÁNCHEZ'),1,0,'R');
				$this->Cell(100,10,utf8_decode('CARGO: JEFA DE LA DIVISION'),1,1,'C');
				
				$this->Cell(946,10,utf8_decode('RECIBE CONFORME/NOMBRE APELLIDO'),1,0,'L');
				
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