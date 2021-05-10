<?php
include ('../connections/conecta.php');
$conexion = conectar_bd();

$id = $_GET['id'];

$query = "SELECT * FROM hist_nom_cambios WHERE id_hist = ".$id;
$result = mysqli_query($conexion, $query);
$row = mysqli_fetch_array($result);

$query1 = "UPDATE nomina SET area = '".$row['area']."', direccion = '".$row['direccion']."' WHERE id_empleado = ".$row['id_empleado'];
$result1 = mysqli_query($conexion, $query1);

if($result1){
    $query2 = "DELETE FROM kardex WHERE id_kardex = ".$id;
    
    if($result2 = mysqli_query($conexion, $query2)){
        header("Location: inicio.php");
    }else{
        echo "<script>alert('Ocurrió un error al eliminar'); window.history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('Ocurrió un error al eliminar'); window.history.go(-1);</script>";
}






?>