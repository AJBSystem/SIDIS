<?php
require ('fpdf/fpdf.php');

class PDF extends FPDF
{

	function Header()
	{
		$this->Image('../img/logo-Ministerio.jpg', 15,13,30);
		$this->Image('../img/cicpc_logo_trns.png', 170,5,30);

		$this->SetFont('Arial','B');
		
		$this->Cell(30);
		$this->SetX(10);
		$this->Cell(200,30,utf8_decode ('ACTA DE REASIGNACIÓN DE BIENES NACIONALES'),0,0,'C');
		$this->Ln(5);

		$this->Ln(10);
		$this->Cell(30);
		$this->SetX(100);
		$this->Cell(25,60,utf8_decode ('Reporte de Reasignación'),2,1,'C');
		$this->Ln(20);

				$this->SetX(15);
				$this->Cell(800,-85,utf8_decode('En la ciudad de Caracas, se llevó a cabo por parte de la división de sistemas la entrega a la: de los bienes muebles que se especifican a continuación'),0,0,'L');
				$this->Ln(10);
				

				
				$this->SetY(220);
				$this->SetX(75);
				$this->Cell(420,10,utf8_decode('Haciendo constar que dichos activos se encuentran en óptimas condiciones físicas. Se levanta la presente acta y en señal de conformidad firma el funcionario receptor, quedando este responsable del uso, '),0,0,'R');
				$this->Ln(10);
				

				$this->SetX(10);
				$this->Cell(155,10,utf8_decode('conservación y custodia de estos bienes: '),0,0,'R');

				$this->Ln(15);
				$this->Cell(175,10,utf8_decode('Recibe Conforme'),0,0,'C');
				$this->Ln(10);
				$this->SetX(82);
				$this->Cell(946,10,utf8_decode('Nombre y Apellido -------------------------------------------------------------------------------------'),0,0,'L');
				$this->Ln(30);
				$this->SetX(82);
				$this->Cell(946,10,utf8_decode('C.I. ----------------------------------   Credencial ---------------------------------    Cargo -------------------------------------------------------------------------------------------------------------------------------------------------------------'),0,0,'L');
				$this->Ln(30);
				$this->SetX(82);
				$this->Cell(946,10,utf8_decode('Firma -------------------------------------------------------------------------------------------------'),0,0,'L');
				$this->Ln(30);
				$this->SetX(82);
				$this->Cell(846,10,utf8_decode('NOTA: ESTOS EQUIPOS NO PUEDEN SER INCLUIDOS EN SU INVENTARIO, YA QUE PERTENECEN A UN PROYECTO DE LA VICEPRESIDENCIA DE LA REPUBLICA. '),0,0,'L');

	}

	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I', 8);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

}
?>