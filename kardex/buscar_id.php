<?php
include ('connections/conecta.php');
$conexion = conectar_bd();

if(isset($_POST["valorBusqueda"]))
{
 /*$query="SELECT * FROM cat_area INNER JOIN directorio WHERE cat_area.id_area=directorio.id_dir and nombre LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aPaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND aMaterno LIKE '%".$search."%' OR cat_area.id_area=directorio.id_dir AND cargo LIKE '%".$search."%'   ORDER BY jerarquia ASC";*/
    
    
    $query="SELECT * FROM kardex WHERE id_empleado LIKE '%".$_POST["valorBusqueda"]."%' ORDER BY id_empleado ASC";

    
    
    
    
    $result= mysqli_query($conexion, $query);
 if(mysqli_num_rows($result)> 0)
 {
      echo '
      <table class="header">
      <tr>
    <td>No. Empleado</td>
    <td>A. Paterno</td>
    <td>A. Materno</td>
    <td>Nombre</td>
    <td>T. Nómina</td>
    <td>Universo</td>
    <td>Nivel Salarial</td>
    <td>C. Puesto</td>
    <td>Denominación</td>
    <td>Sección Sindical</td>
    <td>Plaza</td>
    <td>Cargo</td>
    <td>Dirección</td>
    <td>F. Inicio Cargo</td>
    <td>F. Fin Cargo</td>
    <td>Estatus</td>
    <td>Tipo de Modificación</td>
  </tr>';
      while($row= mysqli_fetch_array($result)){
      	echo '
        <tr>
        <td bgcolor="#CCCCCC">'.$row['id_empleado'].'</td>
      <td>'.$row['a_paterno'].'</td>
      <td>'.$row['a_materno'].'</td>
      <td>'.$row['nombre'].'</td>
      <td>'.$row['t_nomina'].'</td>
      <td>'.$row['universo'].'</td>
      <td>'.$row['niv_salarial'].'</td>
      <td>'.$row['id_puesto'].'</td>
      <td>'.$row['n_puesto'].'</td>
      <td>'.$row['seccion_s'].'</td>
      <td>'.$row['id_plaza'].'</td>
      <td>'.$row['cargo'].'</td>
      <td>'.$row['direccion'].'</td>
      <td>'.$row['fecha_inicio'].'</td>
      <td>'.$row['fecha_fin'].'</td>
      <td>'.$row['estatus'].'</td>
      <td bgcolor="#CCCCCC">'.$row['tipo_modif'].'</td>
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