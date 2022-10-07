<?php
    require_once("../conexion/conexion.php");
    require_once("../metodos/funciones.php");

    $id_camibuso = $_POST['id'];
    $talla = $_POST['talla'];
    $color = $_POST['color'];
    $precio = $_POST['precio'];
    $tipo_genero = $_POST['id_tipo_genero'];
    $tipo_tela = $_POST['id_tipo_tela'];
    $descripcion = $_POST['descripcion'];

    $datos = array($id_camibuso,$talla,$color,$precio,$tipo_genero,$tipo_tela,$descripcion);
    
    $registro_camibuso = new funciones();

    if($registro_camibuso->editar_camibusos($datos)==1){
        header("location: mostrar_camibusos.php");
    } else {
        echo '<script language="javascript">alert("Ocurrio un error y no se guardo el registro");</script>';
    }

?>