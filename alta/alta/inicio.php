<?php
date_default_timezone_set('America/Mexico_City');
include ('../../connections/conecta.php');
$conexion = conectar_bd();
$query="SELECT * FROM cat_puesto GROUP BY direccion";
$query1="SELECT * FROM quincena ";
$query2="SELECT * FROM cat_alta";
$query3="SELECT * FROM nomina WHERE id_empleado=''";
$result= mysqli_query($conexion, $query);
$result1= mysqli_query($conexion, $query1);
$result2= mysqli_query($conexion, $query2);
$result3= mysqli_query($conexion, $query3);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Plantilla_General_Menu.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- InstanceBeginEditable name="doctitle" -->

<title>SIRH</title>
<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Roboto">
<!-- InstanceEndEditable -->
<link rel="shortcut icon"href="../../Imagenes/lvc.ico"/>

<link href="../../css/plantilla.css" rel="stylesheet" type="text/css"/>
<link href="../../css/texto.css" rel="stylesheet" type="text/css" />
<link href="../../css/fonts.css" rel="stylesheet" type="text/css" />
<link href="../../css/menu.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../../js/menu.js"></script>
<script>
$(document).ready(function() {
    $select();
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
    function select() {
    var textoBusqueda = $("select#direccion_d").val();
    $("#list_area").empty();
     if (textoBusqueda != "") {
        $.post("select_dir.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#list_area").html(mensaje);
         }); 
     } else { 
        $("#list_area").html();
        };
};

</script>
<!--
<script>
$(document).ready(function() {
    $("#resultadoBusqueda").html();
});

function select() {
    var textoBusqueda = $("select#a").val();
     if (textoBusqueda != "") {
        $.post("select_dir.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("input#direccion_d").val(mensaje);
         }); 
     } else { 
        $("input#direccion_d").val("");
        };
};
</script>
-->
<!-- InstanceBeginEditable name="head" -->
<!--
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
-->
<link href="../../css/tabla.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->

</head>
<body>

<div id="encabezado">
<div id="logo"> <a href="#"><img src="../../Imagenes/logo-vc.png" width="99%"/></a>
</div>
    <header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span></a>
		</div>
		<nav>
			<ul>
<!-- InstanceBeginEditable name="menu" -->              
    <li><a href="../../logout.php">Salir</a></li>
    <li><a href="../../inicio.php">Inicio</a></li>
    <li><a href="historial/inicio.php">Historial de Altas</a></li>
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
<label class="titulo_centro_mediano">ALTAS</label>
<br />
    
    

    <form action="cambiar_info.php" method="post">
    <div id="cuadro_captura_grande">
    <label>No. Plaza: </label>
        <input name="id_plaza" id="id_plaza" type="text" size="10" required/>
        <label>No. Empleado: </label>
        <input name="id_empleado" id="id_empleado" type="text" size="10" required/>
        <label>&nbsp;Paterno: </label>
        <input name="paterno" id="paterno" type="text" size="10" required/>
        <br><br><label>&nbsp;Materno: </label>
        <input name="materno" id="materno" type="text" size="10" required/>
        <label>&nbsp;Nombre: </label>
        <input name="nombre" id="nombre" type="text" size="10" required/>
        <br><br><label>&nbsp;Tipo de Nómina: </label>
        <select name="id_nomina" id="id_nomina" required>
            <option selected>-</option>
            <option value="1">1</option>
            <option value="5">5</option>
            <option value="8">8</option>
        </select>
        <label>&nbsp;Universo: </label>
        <select name="id_universo" id="id_universo" required>
            <option selected>-</option>
            <option value="CJ">CJ</option>
            <option value="G">G</option>
            <option value="K">K</option>
            <option value="L">L</option>
            <option value="M">M</option>
            <option value="O">O</option>
            <option value="P">P</option>
            <option value="PR">PR</option>
            <option value="S">S</option>
            <option value="T">T</option>
        </select>
        <label>&nbsp;Id Puesto: </label>
        <input name="id_puesto" id="id_puesto" type="text" size="6" required/>
        <br><br>
        <label>&nbsp;Nombre del Puesto: </label>
        <input name="n_puesto" id="n_puesto" type="text" size="25" required/>
        <label>&nbsp;Sección Sindical: </label>
        <input name="ss" id="ss" type="text" size="5" required/>
        <br><br>
        
        <label>&nbsp;Nivel Salarial: </label>
        <input name="id_salarial" id="id_salarial" type="text" size="5" required/>
        
        <label>&nbsp;Dirección: </label>
        <select name="direccion_d" id="direccion_d" onchange="select();" required>
        <option default>Elige una opción</option>
        <?php
                while($row= mysqli_fetch_array($result)){
      	         echo '
                    <option value="'.$row['direccion'].'" >'.$row['direccion'].'</option>';
                    }    
        ?>  
        </select>
        <br><br>    
        <div id="list_area"></div>


        <label>&nbsp;Fecha de Ingreso: </label>
        <input name="fecha_i" id="fecha_i" type="date" required value="<?php $fecha_baja = date("Y-m-d"); echo $fecha_baja ?>"/>

        <br><br><label>&nbsp;Fecha de Inicio de Puesto: </label>
        <input name="fecha_p" id="fecha_p" type="date" required value="<?php $fecha_baja = date("Y-m-d"); echo $fecha_baja ?>"/>

        
        <br><br><label>&nbsp;Quincena de aplicación: </label>
        <select name="quincena" id="quincena" required>
        <option value="">Elige una opción</option>
        <?php
                while($row1= mysqli_fetch_array($result1)){
      	         echo '
                    <option value="'.$row1['quincena'].'" >'.$row1['quincena'].'</option>';
                    }    
          ?>
          
        </select>

        <br><br><label>&nbsp;Tipo de Alta: </label>
        <select name="estatus" id="estatus" required>
        <option value="">Elige una opción</option>
   <?php
                while($row2= mysqli_fetch_array($result2)){
      	         echo '
                    <option value="'.$row2['id_alta'].'" >'.$row2['descripcion'].'</option>';
                    }    
          ?>
          
        </select>
        
        <br>
        <br>
        <input type="submit" value="Enviar">
    </div>
        </form>
<br />
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
            <script>
var input = document.getElementById("search_num");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("bus").click();
  }
});
</script>

<!-- InstanceEnd --></html>
