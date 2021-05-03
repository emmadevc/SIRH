<?php
    include ('../../connections/conecta.php');
    $conexion = conectar_bd();
    date_default_timezone_set('America/Mexico_City');
    $id_empleado = $_POST['id_empleado'];

    session_start();

    $id_plaza = $_POST['id_plaza'];    
    $id_empleado = $_POST['id_empleado'];    
    $paterno = $_POST['paterno'];    
    $materno = $_POST['materno'];    
    $nombre = $_POST['nombre'];    
    $id_nomina = $_POST['id_nomina'];    
    $id_salarial = $_POST['id_salarial'];    
    $id_universo = $_POST['id_universo'];    
    $direccion = $_POST['direccion_d'];    
    $area = $_POST['area_d'];    
    $fecha_i = $_POST['fecha_i'];    
    $fecha_alta = $_POST['fecha_p'];    
    $quincena = $_POST['quincena'];
    $alta = $_POST['estatus'];
    $id_puesto = $_POST['id_puesto'];
    $n_puesto = $_POST['n_puesto'];
    $ss = $_POST['ss'];
    
    $query='
    INSERT 
    INTO 
    hist_altas 
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
    fecha_alta, 
    estatus, 
    tipo_modif,
    quincena, 
    usuario) 
    VALUES 
    ("'.$id_empleado.'",
    "'.$paterno.'",
    "'.$materno.'",
    "'.$nombre.'",
    "'.$id_nomina.'",
    "'.$id_salarial.'",
    "'.$id_universo.'",
    "'.$id_puesto.'",
    "'.$n_puesto.'",
    "'.$ss.'",
    "'.$id_plaza.'",
    "'.$area.'",
    "'.$direccion.'",
    "'.$fecha_i.'",
    "'.$fecha_alta.'",
    "ALTA",
    "'.$alta.'",  
    "'.$quincena.'", 
    "1")';
    if (mysqli_query($conexion, $query)) {
        $query3='
        INSERT INTO 
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
        fecha_ing, 
        fecha_inicio_p )
        VALUES(
            "'.$id_plaza.'",
        "'.$id_empleado.'",
        "'.$paterno.'",
        "'.$materno.'",
        "'.$nombre.'",
        "'.$id_nomina.'",
        "'.$id_universo.'",
        "'.$id_salarial.'",
        "'.$id_puesto.'",
        "'.$n_puesto.'",
        "'.$ss.'",
        "'.$area.'",
        "'.$direccion.'",
        "'.$fecha_i.'",
        "'.$fecha_alta.'")';
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

?>