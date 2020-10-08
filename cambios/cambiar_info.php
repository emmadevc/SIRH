<?php
    include ('../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    $id_empleado = $_POST['id_empleado'];

    $query1="SELECT * FROM nomina WHERE id_empleado = '".$id_empleado."'";
    $result1= mysqli_query($conexion, $query1);
    $row1= mysqli_fetch_array($result1);
        
    $id_puesto = $_POST['adscripcion_d'];

    $query2="SELECT * FROM cat_puesto WHERE id_puesto = '".$id_puesto."'";
    $result2= mysqli_query($conexion, $query2);
    $row2= mysqli_fetch_array($result2);
    
    $id_universo=$row2['id_universo'];
    $n_puesto=$row2['n_puesto'];
    $area=$row2['area'];
    $direccion=$row2['direccion'];

    $estatus = $_POST['estatus'];
    $fecha_inicio_p = date("m.d.y");
    echo $fecha_inicio_p;
    
    $query="INSERT INTO kardex (id_empleado, a_paterno, a_materno, nombre, t_nomina, niv_salarial, universo, id_puesto, n_puesto, seccion_s, id_plaza, cargo, direccion, fecha_inicio, fecha fin, estatus) VALUES ('".$id_empleado."','".$row['a_paterno']."','".$row['a_materno']."','".$row['a_nombre']."','".$row['id_tipo_nomina']."','".$row['id_nivel_salarial']."','".$row['id_universo']."','".$row['id_puesto']."','".$row['n_puesto']."','".$row['id_sindicato']."','".$row['id_plaza']."','".$row['area']."','".$row['direccion']."','".$row['fecha_inicio_p']."','".$fecha_inicio_p."','".$estatus."')";
    if (mysqli_query($conn, $query)) {
        $query3="UPDATE nomina SET id_universo='".$id_universo."', id_puesto='".id_puesto."', n_puesto='".$n_puesto."', area='".$area."', direccion='".$direccion."', estatus='".$estatus."', fecha_inicio_p='".$fecha_inicio_p."' WHERE id_empleado = '".$id_empleado."'";
            if (mysqli_query($conn, $query3)) {
                echo "<script> 
                alert('Cambio realizado');
                window.location.replace('inicio.php'); </script>";
            }
            else{
                echo "<script> 
                alert('Ocurrió un error inesperado1');
                window.location.replace('inicio.php'); </script>";

            }
    } else {
        echo "<script> 
                alert('Ocurrió un error inesperado');
                window.location.replace('inicio.php'); </script>";
    }

?>