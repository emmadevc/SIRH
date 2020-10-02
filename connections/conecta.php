<?php
function conectar_bd(){
$server='187.237.244.227';
$bd='sisnom_n';    
$usuario='root';
$password ='pgm3satvc';
$conexion= mysqli_connect($server, $usuario, $password, $bd);
mysqli_set_charset($conexion, "utf8");

if($conexion == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    
}

    return $conexion;

}
?>