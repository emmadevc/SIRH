<?php
    include ('../../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    $id_empleado = $_POST['id_empleado'];

    session_start();

    $query1="SELECT * FROM nomina WHERE id_empleado = '".$id_empleado."'";
    $result1= mysqli_query($conexion, $query1);
    $row1= mysqli_fetch_array($result1);
        
    $quincena = $_POST['quincena'];
    $oficio = $_POST['oficio'];
    $fecha_baja = date("y.m.d");
    
    
    $query='INSERT INTO 
    hist_bajas 
    (id_empleado, 
    a_paterno, 
    a_materno, 
    nombre, 
    t_nomina, 
    niv_salarial, 
    universo, 
    id_puesto, 
    n_puesto, 
    seccion_s, 
    id_plaza, 
    area, 
    direccion, 
    fecha_inicio, 
    fecha_aplicacion, 
    estatus, 
    tipo_modif,
    quincena, 
    fecha_baja, 
    usuario) 
    VALUES 
    ("'.$id_empleado.'",
    "'.$row1['a_paterno'].'",
    "'.$row1['a_materno'].'",
    "'.$row1['nombre'].'",
    "'.$row1['id_tipo_nomina'].'",
    "'.$row1['id_nivel_salarial'].'",
    "'.$row1['id_universo'].'",
    "'.$row1['id_puesto'].'",
    "'.$row1['n_puesto'].'",
    "'.$row1['id_sindicato'].'",
    "'.$row1['id_plaza'].'",
    "'.$row1['area'].'",
    "'.$row1['direccion'].'",
    "'.$row1['fecha_inicio_p'].'",
    "'.$fecha_baja.'",
    "Baja", 
    "'.$_POST['baja'].'", 
    "'.$quincena.'", 
    "'.$oficio.'",
    "1")';
    if (mysqli_query($conexion, $query)) {
        $query5 = 'SELECT * FROM hist_bajas ORDER BY id DESC LIMIT 1'; 
        $result5= mysqli_query($conexion, $query5);
        $row5= mysqli_fetch_array($result5);

        
        $query4 = 'INSERT INTO 
    hist_nom_bajas  
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
    fecha_inicio_p,
    id_hist)
    VALUES(
        "'.$row1['id_plaza'].'",
    "'.$row1['id_empleado'].'",
    "'.$row1['a_paterno'].'",
    "'.$row1['a_materno'].'",
    "'.$row1['nombre'].'",
    "'.$row1['id_tipo_nomina'].'",
    "'.$row1['id_universo'].'",
    "'.$row1['id_nivel_salarial'].'",
    "'.$row1['id_puesto'].'",
    "'.$row1['n_puesto'].'",
    "'.$row1['id_sindicato'].'",
    "'.$row1['area'].'",
    "'.$row1['direccion'].'",
    "'.$row1['cve'].'",
    "'.$row1['cvo'].'",
    "'.$row1['fecha_ing'].'",
    "'.$row1['estatus'].'",
    "'.$row1['fecha_inicio_p'].'",
    "'.$row5['id'].'")';
    if (mysqli_query($conexion, $query4)) {

        $query3='
        DELETE
        FROM 
        nomina 
        WHERE 
        id_empleado = "'.$id_empleado.'"';
            if (mysqli_query($conexion, $query3)) {
                echo "<script> 
                alert('Cambio realizado');
                window.location.replace('inicio.php');
                 </script>";
            }
            else{
                echo "<script> 
                alert('Ocurrio un error inesperado1');
                window.location.replace('inicio.php');
                 </script>";

            }
    } else {
        echo "<script> 
                alert('Ocurrio un error inesperado');
                window.location.replace('inicio.php');
                 </script>";
    }
    



}
    else{
        echo "<script>alert('Ocurrió un error inesperado2'); window.history.go(-1);</script)";
    }
?>