<?php
include ('../../connections/conecta.php');
$conexion = conectar_bd();

if(isset($_POST["valorBusqueda"]))
{
 /*$query="SELECT * FROM cat_area INNER JOIN directorio WHERE cat_area.id_area=directorio.id_dir and nombre LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aPaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aMaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND cargo LIKE '%".$search."%'   ORDER BY jerarquia ASC";*/
    
    
    $query="SELECT area FROM cat_puesto where direccion = '".$_POST["valorBusqueda"]."'";

    
    
    
    
    $result= mysqli_query($conexion, $query);

     echo '
        <label>&nbsp;Área: </label>
        <select name="area_d" id="area_d" required>
        <option value="">Elige una opción</option>
            ';
                while($row= mysqli_fetch_array($result)){
      	         echo '
                    <option value="'.$row['area'].'" >'.$row['area'].'</option>';
                    }    
           echo '
          
        </select>
        <br><br>';
 }



 
?>