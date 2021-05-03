<?php
include ('../../connections/conecta.php');
$conexion = conectar_bd();

if(isset($_POST["valorBusqueda"]))
{
 /*$query="SELECT * FROM cat_area INNER JOIN directorio WHERE cat_area.id_area=directorio.id_dir and nombre LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aPaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aMaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND cargo LIKE '%".$search."%'   ORDER BY jerarquia ASC";*/
    
    
    $query="SELECT * FROM nomina WHERE id_empleado = '".$_POST["valorBusqueda"]."' ORDER BY id_empleado ASC";
    $query1="SELECT * FROM estatus ORDER BY id_estatus ASC";
    $query2="SELECT * FROM quincena ORDER BY id_quincena ASC";
    $query3="SELECT * FROM cat_baja GROUP BY id_baja ASC";

    
    
    
    
    $result= mysqli_query($conexion, $query);
    $result1= mysqli_query($conexion, $query1);
    $result2= mysqli_query($conexion, $query2);
    $result3= mysqli_query($conexion, $query3);
 if(mysqli_num_rows($result)> 0)
 {
     $row= mysqli_fetch_array($result);
      echo '
      <div id="cuadro_captura_grande">
        <label>No. Empleado: </label>
        <input name="id_empleado" id="id_empleado" type="text" size="10" readonly value = "'.$row['id_empleado'].'"/>
        <label>&nbsp;Paterno: </label>
        <input name="paterno" id="paterno" type="text" size="10" readonly value = "'.$row['a_paterno'].'"/>
        <br><br><label>&nbsp;Materno: </label>
        <input name="materno" id="materno" type="text" size="10" readonly value = "'.$row['a_materno'].'"/>
        <label>&nbsp;Nombre: </label>
        <input name="nombre" id="nombre" type="text" size="10" readonly value = "'.$row['nombre'].'"/>
        <br><br><label>&nbsp;Dirección: </label>
        <input name="direccion" id="direccion" type="text" size="10" readonly value = "'.$row['direccion'].'"/>

        <br><br><label>&nbsp;Adscripción: </label>
        
        <input name="area" id="area" type="text" size="50" readonly value = "'.$row['area'].'"/>
        <br><br>
        
        <label>&nbsp;Quincena de aplicación: </label>
        <select name="quincena" id="quincena" required>
        <option value="">Elige una opción</option>
            ';
                while($row2= mysqli_fetch_array($result2)){
      	         echo '
                    <option value="'.$row2['quincena'].'" >'.$row2['quincena'].'</option>';
                    }    
           echo '
          
        </select>
        <br><br>
        <label>&nbsp;Fecha de Baja: </label>
        <input name="oficio" id="oficio" type="text" size="25"/>

        <br><br><label>&nbsp;Concepto de baja: </label>
        <select name="baja" id="baja" required>
        <option value="">Elige una opción</option>
            ';
                while($row3= mysqli_fetch_array($result3)){
      	         echo '
                    <option value="'.$row3['id_baja'].'" >'.$row3['descripcion'].'</option>';
                    }    
           echo '
          
        </select>
        
        <br>
        <br />
        <input type="submit" value="Continuar">
    </div>';
}
 else
 {
 	echo 'No hay valores';
 }
 }



 
?>