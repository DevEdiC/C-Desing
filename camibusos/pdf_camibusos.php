<?php
require_once("../conexion/conexion.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();
require_once("../metodos/funciones.php");    
require_once("../MPDF56/mpdf.php");

$consulta = new funciones();
                            
$sql = "SELECT talla, color, precio, tipo_genero.tipo_genero, tipo_tela.tipo_tela, logo, descripcion
        FROM camibusos, tipo_genero, tipo_tela
        WHERE camibusos.id_tipo_genero=tipo_genero.id AND camibusos.id_tipo_tela=tipo_tela.id";

$datos = $consulta->consulta_camibuso($sql);

$mdpf = new mPDF('',
'A4',
9,
'ccourieri',
5,
5,
10,
5,
9,
9,
'P');

$mdpf -> AddPage('P');
$html = '<h1>Informe de Camibusos</h1>
<table BORDER = "3" CELLSPACING = "3">
    <tr id="encabezado">
        <td>Talla</td>
        <td>Color</td>
        <td>Precio</td>
        <td>Genero</td>
        <td>Tela</td>
        <td>Logo</td>
        <td>Descripcion</td>
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

$mdpf -> writeHTML($html);
$ruta = '../pdf/'.date('Ymdhis').'.pdf';
$mdpf -> Output($ruta);
?>

<script language="JavaScript">
    window.open('<?php echo $ruta ?>','_top');
</script>