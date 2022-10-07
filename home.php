<?php
    require_once("conexion/conexion.php");
    require_once("metodos/funciones.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();

    session_start();

    if (!isset($_SESSION['correo'])) {
        header("location: acceso_usuario/login.php");
    }
    
    if (isset($_POST['cerrar_sesion'])) {
        unset($_SESSION['correo']);
        header("location: acceso_usuario/login.php");
    }

    $identidad = $_SESSION['correo'];

    $consulta = new funciones();
                                    
    $sql = "SELECT camibusos.id, talla, color, precio, tipo_genero.tipo_genero, tipo_tela.tipo_tela, camibusos.logo, descripcion
            FROM camibusos, tipo_genero, tipo_tela
            WHERE camibusos.id_tipo_genero=tipo_genero.id AND camibusos.id_tipo_tela=tipo_tela.id";
    $datos = $consulta->consulta_camibuso($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>C'Desing</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="assests/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">C'Desing</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="camibusos/mostrar_camibusos.php">Camibusos</a>
                            </li>
                        </ul>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll dropstart" style="--bs-scroll-height: 100px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php 
                                        $query_nombre = "SELECT nombre FROM usuarios WHERE usuarios.correo = '$identidad' ";
                                        $nombre = mysqli_query($conectar, $query_nombre);
                                        $row_nombre = mysqli_fetch_assoc($nombre);
                                        echo $row_nombre['nombre'];
                                    ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar Sesion</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="main">
            <section class="products__container">
            <?php 
                foreach($datos as $registro){
            ?>
            <article class="product__card">
                <figure class="product__img">
                    <img src="<?php $logo = $registro['logo']; $logo1 = ltrim($logo,'./'); echo $logo1?>" class="picture__product">
                </figure>
                <div class="product__texts">
                <h2 class="text size__product"><?php echo $registro['talla']?></h2>
                <h2 class="text price__product"><?php echo $registro['precio']." COP"?></h2>
                <h2 class="text cloth__product"><?php echo $registro['tipo_tela']?></h2>
                <p class="text description__product"><?php echo $registro['descripcion']?></p>
                </div>
            </article>
            <?php
                }
            ?>
            </section>
        </main>
        <footer>
            
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </body>
</html>