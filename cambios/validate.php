<?php
include '../connections/conecta.php';
$conexion = conectar_bd();

$user = $_POST['user'];
$pass = $_POST['pass'];

if($user != NULL && $pass != NULL)
{

    $query="SELECT * FROM user WHERE user = '".$user."' and pass = '".$pass."'";
    $result= mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    
 if($row)
 {
     echo "<script> window.location.replace('../inicio.php'); </script>";
     $_SESSION['id_user'];
 }
    else 
        "<script> 
        window.alert('Usuario o contraseña incorrectos');
        window.location.replace('../inicio.php'); </script>";
}
 
?>