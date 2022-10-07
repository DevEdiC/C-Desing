<?php
require_once("../conexion/conexion.php");
require_once("../metodos/funciones.php");

$id_camibuso = $_GET['id'];

$eliminar_registro = new funciones();

if($eliminar_registro->eliminar_camibusos($id_camibuso)==1){
    header("location: mostrar_camibusos.php");
} else {
    echo '<script language="javascript">alert("Ocurrio un error y no se elimino el registro");</script>';
}
?>
