<?php
    require_once("../conexion/conexion.php");
    require_once("../metodos/funciones.php");

    $nombre = $_POST['nombre'];
    $identificacion = $_POST['identificacion'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $id_tipo_usuario = $_POST['id_tipo_usuario'];

    $datos = array($nombre,$identificacion,$correo,$contraseña,$id_tipo_usuario);

    $registro_usuario = new funciones();

    if($registro_usuario->registrar_usuario($datos)==1){
        session_start();
        $_SESSION['correo'] = $correo;
        $_SESSION['contraseña'] = $contraseña;
        header("Location: ../home.php");
    } else {
        echo '<script language="javascript">alert("Ocurrio un error y no se guardo el registro");</script>';
    }

?>