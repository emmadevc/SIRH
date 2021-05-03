<?php
    include ('../../../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    session_start();

    $query1="SELECT * FROM nomina WHERE id_empleado = '".$id_empleado."'";
    $result1= mysqli_query($conexion, $query1);
    $row1= mysqli_fetch_array($result1);
?>