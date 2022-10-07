<?php 
    require_once("../conexion/conexion.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();

    $query_roles = "SELECT * FROM tipo_usuario";
    $roles = mysqli_query($conectar, $query_roles);
    $row_roles = mysqli_fetch_assoc($roles);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Tipos de usuarios</title>
        <link rel="stylesheet" href="../assests/style.css">
    </head>
    <body>
        <div id="chartdiv"></div>
        <script src="../amcharts4/amcharts4/core.js"></script>
        <script src="../amcharts4/amcharts4/charts.js"></script>
        <script src="../amcharts4/amcharts4/themes/animated.js"></script>
        <script language="JavaScript">
            am4core.useTheme(am4themes_animated);

                var chart = am4core.create("chartdiv", am4charts.PieChart);


            chart.data = [
                <?php 
                    do{
                        $query_usuarios = "SELECT * FROM usuarios WHERE id_tipo_usuario = '$row_roles[id]'";
                        $usuarios = mysqli_query($conectar, $query_usuarios);
                        $row_usuarios = mysqli_fetch_assoc($usuarios);
                        $total_usuarios = mysqli_num_rows($usuarios);
                    ?>
                    ,{
                        "rol": "<?php echo $row_roles['usuario']; ?>",
                        "cantidad": <?php echo $total_usuarios; ?>
                    },
                    <?php 
                    } while($row_roles = mysqli_fetch_assoc($roles))
                ?>
            ];

            var series = chart.series.push(new am4charts.PieSeries());
                series.dataFields.value = "cantidad";
                series.dataFields.category = "rol";
                series.hiddenState.properties.opacity = 1;
                series.hiddenState.properties.endAngle = -90;
                series.hiddenState.properties.startAngle = -90;

            chart.legend = new am4charts.Legend();
        </script>
        <button id="volver" onclick="location.href='mostrar_camibusos.php'">
            Volver
        </button>
    </body>
</html>