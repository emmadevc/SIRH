<?php
session_start();
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
        if($row['level']==2||$row['level']==1)
        {
           $_SESSION['id']=$row['id'];
           $_SESSION['level']=$row['level'];
           echo "<script> window.location.replace('inicio.php'); </script>";
           

        }
       else 
           echo "<script> 
           window.alert('No tienes permiso para acceder');
           window.location.replace('login.php'); </script>";
    }
       else 
           echo "<script> 
           window.alert('Usuario o contraseña incorrectos');
           window.location.replace('login.php'); </script>";
}

?>