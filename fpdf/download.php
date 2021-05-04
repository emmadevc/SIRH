<?php
require('html_table.php');
include ('../connections/conecta.php');
$conexion = conectar_bd();
$query="SELECT * FROM nomina WHERE direccion = '".$_GET['id']."' ORDER BY id_empleado ASC";
$result= mysqli_query($conexion, $query);
$query1="SELECT * FROM nomina WHERE id_universo = 's' AND direccion = '".$_GET['id']."'";
$result1= mysqli_query($conexion, $query1);
$row1=mysqli_fetch_array($result1);
$query2="SELECT * FROM nomina WHERE id_universo = 'l' AND area LIKE '%apoyo administrativo%' AND direccion = '".$_GET['id']."'";
$result2= mysqli_query($conexion, $query2);
$row2=mysqli_fetch_array($result2);
$query3="SELECT * FROM nomina WHERE id_universo = 'm' AND direccion = '".$_GET['id']."'";
$result3= mysqli_query($conexion, $query3);
$row3=mysqli_fetch_array($result3);


$pdf = new CellPDF('L','mm','Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$count=1;

$pdf->SetFont('Arial','B',5);
$pdf->Cell(7 ,10,'ID.',1,0,'C',0);
$pdf->Cell(13 ,10,'NO. PLAZA',1,0,'C',0);
$pdf->Cell(12 ,10,'EMPLEADO',1,0,'C',0);
$pdf->Cell(15 ,10,'A. PATERNO',1,0,'C',0);
$pdf->Cell(15 ,10,'A. MATERNO',1,0,'C',0);
$pdf->Cell(28 ,10,'NOMBRE',1,0,'C',0);
$pdf->Cell(7 ,10,'NOMI.',1,0,'C',0);
$pdf->Cell(7 ,10,'UNI.',1,0,'C',0);
$pdf->Cell(7 ,10,'NIV.',1,0,'C',0);
$pdf->Cell(10 ,10,'N. PUESTO',1,0,'C',0);
$pdf->Cell(42 ,10,'PUESTO',1,0,'C',0);
$pdf->Cell(7 ,10,'SIND.',1,0,'C',0);
$pdf->Cell(73 ,10,utf8_decode('ÁREA'),1,0,'C',0);
$pdf->Cell(20 ,10,utf8_decode('DIRECCIÓN'),1,1,'C',0);
$pdf->SetFont('Arial','',5);

while($row= mysqli_fetch_array($result)){
    $pdf->Cell(7 ,10,utf8_decode($count),1,0,'C',0);
    $pdf->Cell(13 ,10,utf8_decode($row['id_plaza']),1,0,'C',0);
    $pdf->Cell(12 ,10,utf8_decode($row['id_empleado']),1,0,'C',0);
    $pdf->Cell(15 ,10,utf8_decode($row['a_paterno']),1,0,'C',0);
    $pdf->Cell(15 ,10,utf8_decode($row['a_materno']),1,0,'C',0);
    $pdf->Cell(28 ,10,utf8_decode($row['nombre']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_tipo_nomina']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_universo']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_nivel_salarial']),1,0,'C',0);
    $pdf->Cell(10 ,10,utf8_decode($row['id_puesto']),1,0,'C',0);
    $pdf->Cell(42 ,10,utf8_decode($row['n_puesto']),1,0,'C',0);
    $pdf->Cell(7 ,10,utf8_decode($row['id_sindicato']),1,0,'C',0);
    $pdf->Cell(73 ,10,utf8_decode($row['area']),1,0,'C',0);
    $pdf->Cell(20 ,10,utf8_decode($row['direccion']),1,1,'C',0);
    $count++;
}
$pdf->Ln(20);
$pdf->Cell(85 ,5,utf8_decode("_______________________________________________________________\n".$row1['area']." \n".$row1['nombre']." ".$row1['a_paterno']." ".$row1['a_materno']." "),0,0,'C',0);
$pdf->Cell(85 ,5,utf8_decode("_______________________________________________________________\n".$row2['area']." \n".$row2['nombre']." ".$row2['a_paterno']." ".$row2['a_materno']." "),0,0,'C',0);
$contador=0;
while($row3= mysqli_fetch_array($result3)){
    
    if($contador==0 || ($contador % 3 == 0)){
        $pdf->Cell(85 ,5,utf8_decode("_______________________________________________________________\n".$row3['area']." \n".$row3['nombre']." ".$row3['a_paterno']." ".$row3['a_materno']." "),0,1,'C',0);
        $pdf->Ln(20);
    }
    else{
        $pdf->Cell(85 ,5,utf8_decode("_______________________________________________________________\n".$row3['area']." \n".$row3['nombre']." ".$row3['a_paterno']." ".$row3['a_materno']." "),0,0,'C',0);
    }
    $contador++;
}

$pdf->Output();
?>