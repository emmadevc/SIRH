<?php 
include ('connections/conecta.php');
?>

<?php
if (!isset($_SESSION)) {
  session_start();
}

$conexion = conectar_bd();
$query="SELECT * FROM nomina ORDER BY id_empleado ASC";
$query1="SELECT universo FROM estructura GROUP BY universo";
$result= mysqli_query($conexion, $query);
$result1= mysqli_query($conexion, $query1);
$query2="SELECT COUNT(*) AS count FROM nomina";
$result2= mysqli_query($conexion, $query2);
$row2= mysqli_fetch_array($result2);
$count = $row2['count'];
$paginas = $count/50;
$paginas=ceil($paginas);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Plantilla_General_Menu.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- InstanceBeginEditable name="doctitle" -->

<title>SISNOM</title>
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Roboto">
<!-- InstanceEndEditable -->
<link rel="shortcut icon"href="Imagenes/lvc.ico"/>

<link href="css/plantilla.css" rel="stylesheet" type="text/css"/>
<link href="css/texto.css" rel="stylesheet" type="text/css" />
<link href="css/fonts.css" rel="stylesheet" type="text/css" />
<link href="css/menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html();
});

function buscar() {
    var textoBusqueda = $("input#search_num").val();
    $("#place").empty();
     if (textoBusqueda != "") {
        $.post("buscar_id.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#place").html(mensaje);
         }); 
     } else { 
        $("#place").html();
        };
};
</script>
<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html();
});

function buscar_name() {
    var textoBusqueda = $("input#search_name").val();
    $("#place").empty();
     if (textoBusqueda != "") {
        $.post("buscar_name.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#place").html(mensaje);
         }); 
     } else { 
        $("#place").html();
        };
};
</script>
<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html();
});

function buscar_universo() {
    var textoBusqueda = $("select#universo").val();
    $("#place").empty();
     if (textoBusqueda != "") {
        $.post("buscar_universo.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#place").html(mensaje);
         }); 
     } else { 
        $("#place").html();
        };
};
</script>
                    
<!-- InstanceBeginEditable name="head" -->
<!--
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
-->
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->

</head>
<body>

<div id="encabezado">
<div id="logo"> <a href="#"><img src="Imagenes/logo-vc.png" width="99%"/></a>
</div>
    <header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span></a>
		</div>
		<nav>
			<ul>
<!-- InstanceBeginEditable name="menu" -->              
    <li><a href="index.php">Salir</a></li>
    <li><a href="inicio.php">Inicio</a></li>
    <li><a href="cambios/inicio.php">Cambios</a></li>
<!-- InstanceEndEditable -->
			</ul>
		</nav>
	</header>
</div>

<div id="contenido">
<BR/>
<center>
<!-- InstanceBeginEditable name="contenido_general" -->


<!--
<img src="Imagenes/vut.png" width="200"  /> <br />
-->
<label class="titulo_centro_mediano">SISTEMA DE NÓMINAS | AVC </label>
<br />
    <div id="cuadro_captura_grande">
        <label>No. Empleado: </label>
        <input name="search_num" id="search_num" type="text" size="10"/>
        <input name="bus" type="submit" class="" id="bus" value="Buscar" onclick="buscar();"/>
        <label> <?php echo $paginas?>Nombre: </label>
        <input name="search_name" id="search_name" type="text" size="15" />
        <input name="bus" type="submit" class="" id="bus" value="Buscar" onclick="buscar_name();"/>
        <br><br>
        <label>Universo: </label>
        <select name="universo" id="universo" onchange="buscar_universo();">
            <option value="" >Seleciona</option>
            <?php
    while($row1= mysqli_fetch_array($result1)){
      	echo '
        <option value="'.$row1['universo'].'" >'.$row1['universo'].'</option>';
 }    
        ?>
          
        </select>
        <br />
        
    </div>
<br />
    <div id="place">
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
  </tr>
    
        <?php
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
        ?>
      
  
   
</table>
        </div>
<br />
<table border="0" >
  <tr>
    <td>
        <a href=""><img src="First.gif" /></a>
       </td>
    <td>
        <a href=""><img src="Previous.gif" /></a>
        </td>
    <td>
        <a href=""><img src="Next.gif" /></a>
       </td>
    <td>
        <a href=""><img src="Last.gif" /></a>
        </td>
  </tr>
</table>
<br />
 <br />

<!-- InstanceEndEditable -->
</center>
<BR/>
</div>
<div id="pie">
2020 - Alcaldia Venustiano Carranza
</div>
</body>
<!-- InstanceEnd --></html>
