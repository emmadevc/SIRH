<?php
include ('../../../connections/conecta.php');
$conexion = conectar_bd();

$id = $_GET['id'];

$query1 = "DELETE FROM hist_bajas WHERE id = ".$id;
$result1 = mysqli_query($conexion, $query1);

$query3 = "SELECT * FROM hist_nom_bajas WHERE id_hist = ".$id;
$result3 = mysqli_query($conexion, $query3);
$row3 = mysqli_fetch_array($result3);


if($result1){
    $query2 = 'INSERT INTO 
    nomina  
    (id_plaza,
    id_empleado,
    a_paterno,
    a_materno, 
    nombre, 
    id_tipo_nomina, 
    id_universo, 
    id_nivel_salarial, 
    id_puesto, 
    n_puesto, 
    id_sindicato, 
    area, 
    direccion, 
    cve,
    cvo,
    estatus,
    fecha_ing, 
    fecha_inicio_p
    )
    VALUES(
        "'.$row3['id_plaza'].'",
    "'.$row3['id_empleado'].'",
    "'.$row3['a_paterno'].'",
    "'.$row3['a_materno'].'",
    "'.$row3['nombre'].'",
    "'.$row3['id_tipo_nomina'].'",
    "'.$row3['id_universo'].'",
    "'.$row3['id_nivel_salarial'].'",
    "'.$row3['id_puesto'].'",
    "'.$row3['n_puesto'].'",
    "'.$row3['id_sindicato'].'",
    "'.$row3['area'].'",
    "'.$row3['direccion'].'",
    "'.$row3['cve'].'",
    "'.$row3['cvo'].'",
    "'.$row3['fecha_ing'].'",
    "'.$row3['estatus'].'",
    "'.$row3['fecha_inicio_p'].'")';

    $result2 = mysqli_query($conexion, $query2);
    if($result2){
        $query4 = "DELETE FROM hist_bajas WHERE id = ".$id;
        $result4 = mysqli_query($conexion, $query1);
        if($result4){
            header("Location: inicio.php");
        }
        else{
            echo "<script>alert('Ocurrió un error'); window.history.go(-1);</script>";
        }

    }else{
        echo "<script>alert('Ocurrió un error'); window.history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('Ocurrió un error'); window.history.go(-1);</script>";
}






?>