<?php
require('fpdf.php');
include ('../connections/conecta.php');
$conexion = conectar_bd();
$query="SELECT * FROM nomina WHERE direccion = '".$_GET['id']."' ORDER BY id_empleado ASC";
$result= mysqli_query($conexion, $query);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../Imagenes/logo_solo_vc.png',10,8,15);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(100);
    // Título
    $this->Cell(40,10,'SIRH '.$_GET['id'],0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->SetFont('Arial','B',5);
    $this->Cell(7 ,10,'Id.',1,0,'C',0);
    $this->Cell(13 ,10,'No. Plaza',1,0,'C',0);
    $this->Cell(10 ,10,'Empleado',1,0,'C',0);
    $this->Cell(15 ,10,'A. Paterno',1,0,'C',0);
    $this->Cell(15 ,10,'A. Materno',1,0,'C',0);
    $this->Cell(20 ,10,'Nombre',1,0,'C',0);
    $this->Cell(7 ,10,'Nomi.',1,0,'C',0);
    $this->Cell(7 ,10,'Uni.',1,0,'C',0);
    $this->Cell(7 ,10,'Niv.',1,0,'C',0);
    $this->Cell(10 ,10,'N. Puesto',1,0,'C',0);
    $this->Cell(42 ,10,'Puesto',1,0,'C',0);
    $this->Cell(7 ,10,'Sind.',1,0,'C',0);
    $this->Cell(100 ,10,utf8_decode('Área'),1,0,'C',0);
    $this->Cell(20 ,10,utf8_decode('Dirección'),1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Alcaldía Venustiano Carranza'),0,0,'C');
}
}

$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',5);
$count=0;
while($row= mysqli_fetch_array($result)){
    $pdf->Cell(7 ,10,utf8_decode($count),1,0,'C',0);
    $pdf->Cell(13 ,10,utf8_decode($row['id_plaza']),1,0,'C',0);
    $pdf->Cell(10 ,10,utf8_decode($row['id_empleado']),1,0,'C',0);
    $pdf->Cell(15 ,10,utf8_decode($row['a_paterno']),1,0,'C',0);
    $pdf->Cell(15 ,10,utf8_decode($row['a_materno']),1,0,'C',0);
    $pdf->Cell(20 ,10,utf8_decode($row['nombre']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_tipo_nomina']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_universo']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_nivel_salarial']),1,0,'C',0);
    $pdf->Cell(10 ,10,utf8_decode($row['id_puesto']),1,0,'C',0);
    $pdf->Cell(42 ,10,utf8_decode($row['n_puesto']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_sindicato']),1,0,'C',0);
    $pdf->Cell(100 ,10,utf8_decode($row['area']),1,0,'C',0);
    $pdf->Cell(20 ,10,utf8_decode($row['direccion']),1,1,'C',0);
    $count++;
}

$pdf->Output();
?>