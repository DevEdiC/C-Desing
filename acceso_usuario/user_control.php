<?php
require_once("../metodos/funciones.php");
require_once("../conexion/conexion.php");

    if (isset($_POST['submit'])) {

        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        $usuario = new user();   

        if ($usuario->getUser($correo,$contraseña)) {
            session_start();
            $_SESSION['correo'] = $correo;
            $_SESSION['contraseña'] = $contraseña;
            header("location:../home.php ");
        }else{
            echo '<script language="javascript">alert("Datos de acceso incorrectos");</script>';
        } 
    }
?>