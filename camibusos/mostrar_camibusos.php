<?php
require_once("../conexion/conexion.php");
require_once("../metodos/funciones.php");

session_start();
$conexion = new conexion();
$conectar = $conexion->conectar();

if (!isset($_SESSION['correo'])) {
    header("location: ../acceso_usuario/login.php");
}

if (isset($_POST['cerrar_sesion'])) {
    unset($_SESSION['correo']);
    unset($_SESSION['contraseña']);
    header("location: ../acceso_usuario/login.php");
}

$identidad = $_SESSION['correo'];
?>
<?php
    $query_id_tipo_usuario = "SELECT id_tipo_usuario FROM usuarios WHERE usuarios.correo = '$identidad' ";
    $id_tipo_usuario = mysqli_query($conectar, $query_id_tipo_usuario);
    $row_id_tipo_iusuario = mysqli_fetch_assoc($id_tipo_usuario);
?>
<?php
    if ($row_id_tipo_iusuario['id_tipo_usuario'] == 1) {
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Camibusos</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="../assests/style.css">
        </head>
        <body>
            <header>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="../index.php">Camibusos</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-md-end" id="navbarScroll">
                            <div>
                                <a class="btn btn-outline-primary" href="grafica_camibusos.php">Estadisticas</a>
                                <a class="btn btn-outline-success" href="excel_camibusos.php">Exportar Excel</a>
                                <a class="btn btn-outline-danger" href="pdf_camibusos.php">Exportar Pdf</a>
                                <a class="btn btn-outline-primary" href="index_camibusos.php">Registrar</a>
                                <a class="btn btn-outline-primary" href="../home.php">Volver</a>                        
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="main">
                <section class="table__content">
                    <div class="table table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="option__table-item">
                                    <th scope="col">Talla</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Tela</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                            <?php 
                                $consulta = new funciones();
                                $sql = "SELECT camibusos.id, talla, color, precio, tipo_genero.tipo_genero, tipo_tela.tipo_tela, camibusos.logo, descripcion
                                        FROM camibusos, tipo_genero, tipo_tela
                                        WHERE camibusos.id_tipo_genero=tipo_genero.id AND camibusos.id_tipo_tela=tipo_tela.id";
                                $datos = $consulta->consulta_camibuso($sql);
                                foreach($datos as $registro){
                            ?>
                                <tr class="option__table-item">
                                    <th scope="row"><?php echo $registro['talla']?></th>
                                    <td><?php echo $registro['color']?></td>
                                    <td><?php echo $registro['precio']?></td>
                                    <td><?php echo $registro['tipo_genero']?></td>
                                    <td><?php echo $registro['tipo_tela']?></td>
                                    <td><?php if($registro['logo'] != ''){ ?><img height="60px" src="<?php echo $registro['logo'] ?>"><?php } ?></td>
                                    <td><?php echo $registro['descripcion']?></td>
                                    <td>
                                        <a id="editar" href="index_actualizar_camibusos.php?id=<?php echo $registro['id']?>">
                                        <i class='icon__option bx bxs-edit bx-md bx-tada-hover' style='color:#339c04' ></i>
                                    </td>
                                    <td>
                                        <a id="eliminar" href="borrar_camibusos.php?id=<?php echo $registro['id']?>">
                                        <i class='icon__option bx bxs-trash bx-md bx-tada-hover' style='color:#e00909' ></i>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        </body>
    </html>
<?php
    }
?>