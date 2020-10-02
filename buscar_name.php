<?php
include ('connections/conecta.php');
$conexion = conectar_bd();

if(isset($_POST["valorBusqueda"]))
{
 /*$query="SELECT * FROM cat_area INNER JOIN directorio WHERE cat_area.id_area=directorio.id_dir and nombre LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aPaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aMaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND cargo LIKE '%".$search."%'   ORDER BY jerarquia ASC";*/
    
    
    $query="SELECT * FROM (SELECT *, CONCAT_WS(' ',nombre, a_paterno, a_materno) as conc FROM nomina) a WHERE conc LIKE '%".$_POST['valorBusqueda']."%'";

    
    
    
    
    $result= mysqli_query($conexion, $query);
 if(mysqli_num_rows($result)> 0)
 {
      echo '
      <table class="header">
      <tr>
    <td>Plaza</td>
    <td>No. Empleado</td>
    <td>A. Paterno</td>
    <td>A. Materno</td>
    <td>Nombre</td>
    <td>RFC</td>
    <td>Curp</td>
    <td>Nomina</td>
    <td>Universo</td>
    <td>Nivel</td>
    <td>N. Puesto</td>
    <td>Puesto</td>
    <td>Sindicato</td>
    <td>Área</td>
    <td>Dirección</td>
  </tr>';
      while($row= mysqli_fetch_array($result)){
      	echo '
        <tr>
        <td bgcolor="#CCCCCC">'.$row['id_plaza'].'</td>
      <td>'.$row['id_empleado'].'</td>
      <td>'.$row['a_paterno'].'</td>
      <td>'.$row['a_materno'].'</td>
      <td>'.$row['nombre'].'</td>
      <td>'.$row['id_legal'].'</td>
      <td>'.$row['curp'].'</td>
      <td>'.$row['id_tipo_nomina'].'</td>
      <td>'.$row['id_universo'].'</td>
      <td>'.$row['id_nivel_salarial'].'</td>
      <td>'.$row['id_puesto'].'</td>
      <td>'.$row['n_puesto'].'</td>
      <td>'.$row['id_sindicato'].'</td>
      <td>'.$row['area'].'</td>
      <td bgcolor="#CCCCCC">'.$row['direccion'].'</td>
      </tr>';
 }
     echo '</table>';
}
 else
 {
 	echo 'No hay valores';
 }
 }


 
?>