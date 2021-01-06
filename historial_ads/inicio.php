<?php 
session_start();
if(isset($_SESSION['level'])){

if($_SESSION['level']==2||$_SESSION['level']==1){

include ('../connections/conecta.php');
    if(!$_GET){
        header('Location:inicio.php?pagina=1');
    }

?>

<?php
if (!isset($_SESSION)) {
  session_start();
}

$conexion = conectar_bd();

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
<link rel="shortcut icon"href="../Imagenes/lvc.ico"/>

<link href="../css/plantilla.css" rel="stylesheet" type="text/css"/>
<link href="../css/texto.css" rel="stylesheet" type="text/css" />
<link href="../css/fonts.css" rel="stylesheet" type="text/css" />
<link href="../css/menu.css" rel="stylesheet" type="text/css" />
    
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="../js/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="../js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>
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
    <li><a href="../cambios/inicio.php">Cambios</a></li>
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
<label class="titulo_centro_mediano">SISTEMA DE NÓMINAS</label>
<br />
    <div id="cuadro_captura_grande">
        <label>No. Empleado: </label>
        <input name="search_num" id="search_num" type="text" size="10"/>
        <input name="bus" type="submit" class="" id="bus" value="Buscar" onclick="buscar();"/>
        <label>Nombre: </label>
        <input name="search_name" id="search_name" type="text" size="15" />
        <input name="bus_name" type="submit" class="" id="bus_name" value="Buscar" onclick="buscar_name();"/>
        <br>
        <br />
        
    </div>
<br />
        <br>

<?php
    $query2="SELECT COUNT(*) AS count FROM kardex";
        $result2= mysqli_query($conexion, $query2);
        $row2= mysqli_fetch_array($result2);
        $count = $row2['count'];
        $art_pag = 5;
        $paginas = $count/$art_pag;
        $paginas=ceil($paginas);

    ?>
    <div id="place">
            <!-- paginacion -->
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
      <a class="page-link" href="inicio.php?pagina=1" tabindex="-1">Inicio</a>
    </li>
    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
      <a class="page-link" href="inicio.php?pagina=<?php echo $_GET['pagina']-1 ?>" tabindex="-1">Anterior</a>
    </li>
      <?php for($i=0;$i<$paginas;$i++):?>
    <li hidden class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>"><a class="page-link" href="inicio.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
    <?php endfor?>
      <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">  
      <a class="page-link" href="inicio.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a>
    </li>
      <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">  
      <a class="page-link" href="inicio.php?pagina=<?php echo $paginas ?>">Fin</a>
    </li>
  </ul>
        Página <?php echo $_GET['pagina']." de ".$paginas ?>
</nav>
<!-- Fin paginacion -->

        
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
    <td>Area</td>
    <td>Dirección</td>
    <td>Area D.</td>
    <td>Dirección D.</td>
    <td>F. Inicio Adscripción</td>
    <td>F. Fin Adscripción</td>
    <td>Estatus</td>
    <td>Oficio</td>
    <td>Quincena</td>
    <td>Tipo de Modificación</td>
  </tr>
    
        <?php
        
        $inicio= ($_GET['pagina']-1)*$art_pag;
        $query="SELECT * FROM kardex ORDER BY id_kardex DESC LIMIT ".$inicio.",".$art_pag;
        $result= mysqli_query($conexion, $query);

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
      <td>'.$row['area'].'</td>
      <td>'.$row['direccion'].'</td>
      <td>'.$row['area_d'].'</td>
      <td>'.$row['direccion_d'].'</td>
      <td>'.$row['fecha_inicio'].'</td>
      <td>'.$row['fecha_fin'].'</td>
      <td>'.$row['estatus'].'</td>
      <td>'.$row['oficio'].'</td>
      <td>'.$row['quincena'].'</td>
      <td bgcolor="#CCCCCC">'.$row['tipo_modif'].'</td>
      </tr>';
 }    
        ?>
      
  
   
</table>
        </div>
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
    <script>
var input = document.getElementById("search_name");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("bus_name").click();
  }
});
</script>

<!-- InstanceEnd --></html>
<?php 
}
else{
    echo "<script> 
    window.location.replace('../cambios/login.php'); </script>";
}
}
else
echo "<script> 
window.location.replace('login.php'); </script>";

?>