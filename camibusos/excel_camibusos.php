<?php 
    header('Content-type:application/xls');
    header('Content-Disposition: attachment; filename=reporte_camibusos.xls');
    header('Content-type: text/html; charset=windows-1252');

    require_once("../conexion/conexion.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();
    require_once("../metodos/funciones.php");    

    $consulta = new funciones();

    $sql = "SELECT talla, color, precio, tipo_genero.tipo_genero, tipo_tela.tipo_tela, logo, descripcion
        FROM camibusos, tipo_genero, tipo_tela
        WHERE camibusos.id_tipo_genero=tipo_genero.id AND camibusos.id_tipo_tela=tipo_tela.id";

    $datos = $consulta->consulta_camibuso($sql);

            $html = '<h3><center>Informe Camibusos</center></h3>
            <table width="100%" border="1">
            <tr bgcolor="#ccc">
                <td><strong>Talla</strong></td>
                <td><strong>Color</strong></td>
                <td><strong>Precio</strong></td>
                <td><strong>Genero</strong></td>
                <td><strong>Tela</strong></td>
                <td><strong>Logo</strong></td>
                <td><strong>Descripcion</strong></td>
            </tr>';
            foreach($datos as $registro){
                $html = $html.'
                <tr id="encabezado">
                    <td>'.$registro['talla'].'</td>
                    <td>'.$registro['color'].'</td>
                    <td>'.$registro['precio'].'</td>
                    <td>'.$registro['tipo_genero'].'</td>
                    <td>'.$registro['tipo_tela'].'</td>
                    <td>'.$registro['logo'].'</td>
                    <td>'.$registro['descripcion'].'</td>
                </tr>';
            }
            $html = $html.'</table>';
            echo utf8_decode($html);
?>