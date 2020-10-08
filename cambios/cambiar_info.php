<?php
    include ('../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    $id_universo = $_POST['id_universo'];
    $id_puesto = $_POST['id_puesto'];
    $n_puesto = $_POST['n_puesto'];
    $area = $_POST['area'];
    $direccion = $_POST['direccion'];
    $estatus = $_POST['estatus'];
    $fecha_inicio_p = date("m.d.y");
    echo $fecha_inicio_p;
    
    $query="INSERT INTO kardex () VALUES ()";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

?>