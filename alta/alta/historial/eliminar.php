<?php
include ('../../../connections/conecta.php');
$conexion = conectar_bd();

$id = $_GET['id'];

$query = "SELECT * FROM hist_altas WHERE id = ".$id;
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_array($result);

$query1 = "DELETE FROM hist_altas WHERE id = ".$id;
$result1 = mysqli_query($conexion, $query1);

if($result1){
    $query2 = "DELETE FROM nomina WHERE id_empleado = ".$row['id_empleado'];
    $result2 = mysqli_query($conexion, $query2);
    if($result2){
        header("Location: inicio.php");
    }else{
        echo "<script>alert('Ocurrió un error al eliminar'); window.history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('Ocurrió un error al eliminar'); window.history.go(-1);</script>";
}






?>