<?php
extract($_REQUEST);
require("../bd_sidis");

include('plantilla.php');
//include('../View/login/consulta.php')

$ced = $_GET['cedula'];

$query1 = "SELECT cedula,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,sexo,fecha_nacimiento::date,grupo.valor grupo_sanguineo,n.valor nivel_academico,email,telefono,direccion_residencia,estatus_funcionario
 FROM funcionario f 
 inner join persona p
 on f.persona=p.id_persona
 inner join nomenclador n 
 on p.nivel_academico=n.id 
 inner join nomenclador as grupo 
 on p.grupo_sanguineo=grupo.id
 WHERE p.cedula=$ced and  (f.rango=237 or f.rango=238 or f.rango=239 or f.rango=240 or f.rango=241 OR estatus_funcionario='A')";
$res1 = pg_query($query1) or die('Fallo el query:'.pg_last_error());
$fila1 = pg_fetch_array($res1); 
//----------------------------------------------------------------------------------------------------------------------------//
$query2 = "SELECT f.despacho ubicacion,f.cargo,f.ultimo_ascenso::date,f.credencial,f.fecha_ingreso::date,rango.valor rango, EXTRACT(YEAR FROM CURRENT_DATE)-EXTRACT(YEAR FROM F.FECHA_INGRESO) ANTIGUEDAD, EXTRACT(YEAR FROM CURRENT_DATE)-EXTRACT(YEAR FROM F.ultimo_ascenso) jerarquia 
FROM funcionario f 
INNER JOIN nomenclador rango 
  on f.rango = rango.id
INNER JOIN persona p
 on f.persona = p.id_persona
 where p.cedula=$ced";
$res2 = pg_query($query2) or die('Fallo el query:'.pg_last_error());
$fila2 = pg_fetch_array($res2); 
//----------------------------------------------------------------------------------------------------------------------------//

$query3 = "SELECT cargo, hc.descripcion as cargog, hc.desde::date, hc.hasta::date 
FROM historicocargos as hc
INNER JOIN funcionario as f
  on hc.id_funcionario = f.id_funcionario
INNER JOIN persona as p 
  on f.persona = p.id_persona
  WHERE p.cedula=$ced";
$res3 = pg_query($query3) or die('Fallo el query:'.pg_last_error());
//$cargoActual = pg_fetch_array($res3);
$fila3 = array();
while ($fila3= pg_fetch_array($res3)) {
	$datos[] = $fila3;
	}
//----------------------------------------------------------------------------------------------------------------------------//
$query5 = "SELECT expediente_disciplinario, estado_expediente, tipo_decision, fecha_decision::date    
FROM disciplinario 
WHERE cedula_funcionario = $ced";
$res5 = pg_query($query5) or die('Fallo el query:'.pg_last_error());
//$fila5 = pg_fetch_array($res5);
while ($fila5 = pg_fetch_array($res5)) {
	$disci[] = $fila5;
}
//----------------------------------------------------------------------------------------------------------------------------//

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','LEGAL');

$pdf->SetFillColor(80,150,200);
$pdf->SetFont('Arial','B',10);

$pdf->Ln(3);
$pdf->Cell(30);
$pdf->Cell(290, 10, "Datos Personales",1,0,'C',1);

$pdf->Ln();


$pdf->SetFillColor(80,150,200);
$pdf->Rect(40,73,50,48,'F');
// para mostrar la foto en forma dinamica
$query4 = pg_query("SELECT foto FROM persona WHERE cedula='$ced'");	
$directorio = '<img src="../img/sin-foto.png"';
$res = pg_fetch_array($query4);

if (file_exists($res['foto'])){
$pdf->Image($res['foto'],40,73,50,48);//aqui va la imagen
}else{
	$res = '';
$pdf->Cell($res);//aqui va la imagen
}

$pdf->SetFillColor(80,150,200);
$pdf->Cell(40);
$pdf->Cell(5,5);
$pdf->Cell(35);
$pdf->Cell(60,6,'Primer Nombre',1,0,'C',1);
$pdf->Cell(60,6,'Segundo Nombre',1,0,'C',1);
$pdf->Cell(60,6,'Primer Apellido',1,0,'C',1);
$pdf->Cell(60,6,'Segundo Apellido',1,0,'C',1);

$pdf->Ln();

$pdf->Cell(80);
$pdf->Cell(60,6,($fila1['primer_nombre']),1,0,'C');
$pdf->Cell(60,6,($fila1['segundo_nombre']),1,0,'C');
$pdf->Cell(60,6,($fila1['primer_apellido']),1,0,'C');
$pdf->Cell(60,6,($fila1['segundo_apellido']),1,1,'C');
$pdf->Ln();


$pdf->Cell(80);
$pdf->SetFillColor(80,150,200);
$pdf->Cell(32,6,'Fec Nac',1,0,'C',1);
$pdf->Cell(25,6,'Cedula',1,0,'C',1);
$pdf->Cell(25,6,'Genero',1,0,'C',1);
$pdf->Cell(80,6,'Email',1,0,'C',1);
$pdf->Cell(40,6,'Telefono',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(32,6,($fila1['fecha_nacimiento']),1,0,'C',0);
$pdf->Cell(25,6,($fila1['cedula']),1,0,'C',0);
$pdf->Cell(25,6,($fila1['sexo']),1,0,'C',0);
$pdf->Cell(80,6,($fila1['email']),1,0,'C',0);
$pdf->Cell(40,6,($fila1['telefono']),1,0,'C',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(80);
$pdf->SetFillColor(80,150,200);

$pdf->Cell(32,6,'Direccion',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(80);

$pdf->Cell(240,6,($fila1['direccion_residencia']),1,0,'C',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(30);
$pdf->Cell(290, 10, "Datos Administrativos", 1,0,'C',1);
$pdf->Ln();
$pdf->Cell(30);
$pdf->SetFillColor(80,150,200);
$pdf->Cell(35,6,'Credencial',1,0,'C',1);
$pdf->Cell(28,6,'Fec Ing',1,0,'C',1);
$pdf->Cell(32,6,'Ant. Policial',1,0,'C',1);
$pdf->Cell(42,6,'Fec Ult Asc',1,0,'C',1);
$pdf->Cell(58,6,'Jerarquia',1,0,'C',1);
$pdf->Cell(32,6,'Ant. Jerarquia',1,0,'C',1);
$pdf->Cell(63,6,'Ubicicacion Adm.',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(35,6,($fila2['credencial']),1,0,'C',0);
$pdf->Cell(28,6,($fila2['fecha_ingreso']),1,0,'C',0);
$pdf->Cell(32,6,($fila2['antiguedad']),1,0,'C',0);

$pdf->Cell(42,6,($fila2['ultimo_ascenso']),1,0,'C',0);
$pdf->Cell(58,6,($fila2['rango']),1,0,'C',0);

$pdf->Cell(32,6,($fila2['jerarquia']),1,0,'C',0);
$pdf->Cell(63,6,($fila2['ubicacion']),1,0,'C',0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(30);
$pdf->Cell(290, 10, "Datos Gerenciales", 1,0,'C',1);
$pdf->Ln();
$pdf->Cell(30);
$pdf->SetFillColor(80,150,200);
$pdf->Cell(35,6,'Cargo Actual',1,0,'C',1);


$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(290,6,($fila2['cargo']),1,0,'C',0);
//para los cargos gerenciales ocupados///////////////////
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(30);// este es el encabezado
$pdf->Cell(65,6,'Cargos Gererenciales Ocupados',1,0,'C',1);
$pdf->Ln();
$pdf->Cell(35);

if(isset($datos))
{
foreach ($datos as $fila3) {
$pdf->SetX(40);
$pdf->MultiCell(290,6,($fila3['cargog']),1,1,0);
	}
}
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(30);
$pdf->Cell(290, 10, "Datos Disciplinarios", 1,0,'C',1);
//para los datos disciplinarios///////////////////
$pdf->Ln();
$pdf->Cell(30);// este es el encabezado
$pdf->Ln();
//$pdf->Cell(35);
$pdf->SetX(40);
$pdf->Cell(72.5,6,'# Expediente',1,0,'C',1);
$pdf->Cell(72.5,6,'Estatus',1,0,'C',1);
$pdf->Cell(72.5,6,'Fecha Decision',1,0,'C',1);
$pdf->Cell(72.5,6,'Tipo de Decision',1,0,'C',1);
$pdf->Ln();
if(isset($disci))
{
foreach ($disci as $fila5) {

//$pdf->SetXY(30,130);

$pdf->Cell(30);
$pdf->Cell(72.5,6,($fila5['expediente_disciplinario']),1,1,'C',0);

//$pdf->SetXY(112.5,130);
$pdf->Ln(-6);
$pdf->Cell(102.5);
$pdf->Cell(72.5,6,($fila5['estado_expediente']),1,1,'C',0);

//$pdf->SetXY(185,130);
$pdf->Ln(-6);
$pdf->Cell(175);
$pdf->Cell(72.5,6,($fila5['fecha_decision']),1,1,'C',0);

//$pdf->SetXY(257.5,130);
$pdf->Ln(-6);
$pdf->Cell(247.5);
$pdf->Cell(72.5,6,($fila5['tipo_decision']),1,1,'C',0);

}

	}
$pdf->Output();
?>