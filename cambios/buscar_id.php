<?php
include ('../connections/conecta.php');
$conexion = conectar_bd();

if(isset($_POST["valorBusqueda"]))
{
 /*$query="SELECT * FROM cat_area INNER JOIN directorio WHERE cat_area.id_area=directorio.id_dir and nombre LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aPaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aMaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND cargo LIKE '%".$search."%'   ORDER BY jerarquia ASC";*/
    
    
    $query="SELECT * FROM nomina WHERE id_empleado = '".$_POST["valorBusqueda"]."' ORDER BY id_empleado ASC";
    $query1="SELECT * FROM estatus ORDER BY id_estatus ASC";
    $query2="SELECT * FROM quincena ORDER BY id_quincena ASC";

    
    
    
    
    $result= mysqli_query($conexion, $query);
    $result1= mysqli_query($conexion, $query1);
    $result2= mysqli_query($conexion, $query2);
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
        <br><br><label>&nbsp;Adscripción actual: </label>
        <input name="adscripcion" id="adscripcion" type="text" size="35" readonly value = "'.$row['n_puesto'].'"/>
        <br><br>
        <label>&nbsp;Adscripción destino: </label>
        <input name="adscripcion_d" id="upper" type="text" size="35"/>
        <br><br><label>&nbsp;Quincena de aplicación: </label>
        <select name="quincena" id="quincena">
            ';
                while($row2= mysqli_fetch_array($result2)){
      	         echo '
                    <option value="'.$row2['quincena'].'" >'.$row2['quincena'].'</option>';
                    }    
           echo '
          
        </select>
        <label>&nbsp;Folio/Oficio: </label>
        <input name="oficio" id="upper" type="text" size="5"/>
        <br><br><label>&nbsp;Dirección actual: </label>
        <input name="direccion" id="adscripcion" type="text" size="10" readonly value = "'.$row['direccion'].'"/>

        <label>&nbsp;Dirección destino: </label>
        <input name="direccion_d" id="upper" type="text" size="10"/>
        <br><br><label>&nbsp;Estatus empleado: </label>
        <select name="estatus" id="estatus" value = "'.$row['direccion'].'">
            ';
                while($row1= mysqli_fetch_array($result1)){
      	         echo '
                    <option value="'.$row1['codigo'].'" >'.$row1['estatus'].'</option>';
                    }    
           echo '
          
        </select>
        
        <br>
        <br />
        <input type="submit" value="Modificar">
    </div>';
}
 else
 {
 	echo 'No hay valores';
 }
 }


 
?>