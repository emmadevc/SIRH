<?php
function conectar_bd(){
$server='10.42.0.222';
$bd='sisnom_n_prueba';    
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