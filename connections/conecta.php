<?php
function conectar_bd(){
$server='localhost';
$bd='bd';    
$usuario='root';
$password ='';
$conexion= mysqli_connect($server, $usuario, $password, $bd);
mysqli_set_charset($conexion, "utf8");

if($conexion == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    
}

    return $conexion;

}
?>
