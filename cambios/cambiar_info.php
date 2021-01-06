<?php
    include ('../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    $id_empleado = $_POST['id_empleado'];

    session_start();

    $query1="SELECT * FROM nomina WHERE id_empleado = '".$id_empleado."'";
    $result1= mysqli_query($conexion, $query1);
    $row1= mysqli_fetch_array($result1);
        
    $direccion = $_POST['direccion_d'];
    $area = $_POST['area_d'];    
    $quincena = $_POST['quincena'];
    $oficio = $_POST['oficio'];
    $estatus = $_POST['estatus'];
    $fecha_inicio_p = date("y.m.d");
    
    $query='INSERT INTO kardex (id_empleado, a_paterno, a_materno, nombre, t_nomina, niv_salarial, universo, id_puesto, n_puesto, seccion_s, id_plaza, area, direccion, fecha_inicio, fecha_fin, estatus, tipo_modif, quincena, oficio, area_d, direccion_d, usuario) 
    VALUES ("'.$id_empleado.'","'.$row1['a_paterno'].'","'.$row1['a_materno'].'","'.$row1['nombre'].'","'.$row1['id_tipo_nomina'].'","'.$row1['id_nivel_salarial'].'","'.$row1['id_universo'].'","'.$row1['id_puesto'].'","'.$row1['n_puesto'].'","'.$row1['id_sindicato'].'","'.$row1['id_plaza'].'","'.$row1['area'].'","'.$row1['direccion'].'","'.$row1['fecha_inicio_p'].'","'.$fecha_inicio_p.'","'.$estatus.'", "CAMBIO_ADS", "'.$quincena.'", "'.$oficio.'", "'.$area.'", "'.$direccion.'", "'.$_SESSION['id'].'")';
    if (mysqli_query($conexion, $query)) {
        $query3='UPDATE nomina 
        SET area="'.$area.'", direccion="'.$direccion.'", estatus="'.$estatus.'", fecha_inicio_p="'.$fecha_inicio_p.'" WHERE id_empleado = "'.$id_empleado.'"';
            if (mysqli_query($conexion, $query3)) {
                echo "<script> 
                alert('Cambio realizado');
                window.location.replace('inicio.php');
                 </script>";
            }
            else{
                echo "<script> 
                alert('Ocurrio un error inesperado1');
                window.location.replace('inicio.php'); </script>";

            }
    } else {
        echo "<script> 
                alert('Ocurrio un error inesperado');
                window.location.replace('inicio.php');
                 </script>";
    }

?>