<?php 
session_start();
if(isset($_SESSION['level'])){

if($_SESSION['level']==2||$_SESSION['level']==1){
include ('../connections/conecta.php');
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
<link rel="shortcut icon"href="../Imagenes/lvc.ico"/>

<link href="../css/plantilla.css" rel="stylesheet" type="text/css"/>
<link href="../css/texto.css" rel="stylesheet" type="text/css" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" />
<link href="../css/menu.css" rel="stylesheet" type="text/css" />
<link href="../css/boton.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
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
<link href="../css/tabla.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->

</head>
<body>

<div id="encabezado">
<div id="logo"> <a href="#"><img src="../Imagenes/logo-vc.png" width="99%"/></a>
</div>
    <header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span></a>
		</div>
		<nav>
			<ul>
<!-- InstanceBeginEditable name="menu" -->              
    <li><a href="../logout.php">Salir</a></li>
    <li><a href="../inicio.php">Inicio</a></li>
    <li><a href="historial/inicio.php">Historial de Bajas</a></li>
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
<label class="titulo_centro_mediano">SISTEMA DE N??MINAS</label>
<br />
    <div id="cuadro_captura_grande"><br><br>
    <a class="button type1" href="alta/inicio.php">Alta</a><br><br><br><br>
    <a class="button type1" href="baja/inicio.php">Baja</a><br>

       <!--
        <label>Nombre: </label>
        <input name="search_name" id="search_name" type="text" size="15" />
        <input name="bus" type="submit" class="" id="bus" value="Buscar" onclick="buscar_name();"/>
-->
        <br>
        <br />
        
    </div>
    
<br />
    <form action="cambiar_info.php" method="post">
    <div id="place">
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
<?php 
}
else{
    echo "<script> 
    window.location.replace('login.php'); </script>";
}
}
else
echo "<script> 
window.location.replace('login.php'); </script>";

?>