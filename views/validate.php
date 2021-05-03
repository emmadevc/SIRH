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
        switch($row['level'])
        {
            case 10:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dga.php'); </script>";
            case 11:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('alcaldia.php'); </script>";
            case 12:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('ci.php'); </script>";
            case 13:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dectar.php'); </script>";
            case 14:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dectbal.php'); </script>";
            case 15:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dectmoc.php'); </script>";
            case 16:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dectmor.php'); </script>";
            case 17:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('depc.php'); </script>";
            case 18:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('depfe.php'); </script>";
            case 19:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dgds.php'); </script>";
            case 20:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dggaj.php'); </script>";
            case 21:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dgirypc.php'); </script>";
            case 22:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dgodu.php'); </script>";
            case 23:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dgsc.php'); </script>";
            case 24:
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['level']=$row['level'];
                echo "<script> window.location.replace('dgsu.php'); </script>";
           
        
            default:
                echo "<script> 
                window.alert('No tienes permiso para acceder');
                window.location.replace('login.php'); </script>";
        }
    }
        else 
           echo "<script> 
           window.alert('Usuario o contraseña incorrectos');
           window.location.replace('login.php'); </script>";
}
 
?>