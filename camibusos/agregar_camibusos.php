<?php

require_once("../conexion/conexion.php");
require_once("../metodos/funciones.php");

$conect_b= new conexion();
$conexion1 = $conect_b->conectar();

$talla = $_POST['talla'];
$color = $_POST['color'];
$precio = $_POST['precio'];
$tipo_genero = $_POST['id_tipo_genero'];
$tipo_tela = $_POST['id_tipo_tela'];
$descripcion = $_POST['descripcion'];
$agregar = $_POST["agregar"];

if((isset($agregar)) && ($agregar =="form_registro")){

    $archivo = $_FILES["logo"]["tmp_name"];
    $nombre = $_FILES["logo"]["name"];
    
    if($archivo != "none"){
        $fp = fopen($archivo, "rw");
        $ruta = '../img/'.$nombre;
    
        if(move_uploaded_file($archivo, "$ruta")){

            $datos = array($talla,$color,$precio,$tipo_genero,$tipo_tela,$ruta,$descripcion);
            $registro_camibuso = new funciones();
            
            if($registro_camibuso->agregar_camibuso($datos)==1){
                header("location: mostrar_camibusos.php");
            } else {
                echo '<script language="javascript">alert("Ocurrio un error y no se guardo el registro");</script>';
            }
        }
    }
    
    $insertGoTo = "mostrar_camibusos.php";
    if (isset($_SERVER['QUERY_STRING'])) {
        $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
        $insertGoTo .= $_SERVER['QUERY_STRING'];
    }
        header(sprintf("Location: %s", $insertGoTo));
    
}
?>
