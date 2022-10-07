<?php
require_once("../conexion/conexion.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();
    
    $query_genero = "SELECT * FROM tipo_genero ORDER BY tipo_genero ASC";
    $genero = mysqli_query($conectar, $query_genero);
    $row_genero = mysqli_fetch_assoc($genero);

    $query_tela = "SELECT * FROM tipo_tela ORDER BY tipo_tela ASC";
    $tela = mysqli_query($conectar, $query_tela);
    $row_tela = mysqli_fetch_assoc($tela);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Camibuso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assests/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Agregar Camibuso</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-end" id="navbarScroll">
                    <div>
                        <a class="btn btn-outline-primary" href="mostrar_camibusos.php">Volver</a>                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="main">
        <section class="form container">
            <div class="form__content">   
                <form action="agregar_camibusos.php" method="POST" enctype="multipart/form-data" class="form__login">
                    <h1 class="tittle__form animate__animated animate__backInLeft">Agregar Camibuso</h1>
                    <input class="input__form-login" name="talla" type="text" placeholder="Ingrese la Talla">
                    <input class="input__form-login" name="color" type="text" placeholder="Ingrese el Color">
                    <input class="input__form-login" name="precio" type="number" placeholder="Ingrese el Precio">
                    <select class="input__form-login" required="required" name="id_tipo_genero">
                        <option value="">Seleccione el tipo de prenda</option>
                        <?php do{ ?>
                        <option value="<?php echo $row_genero['id'] ?>">Para <?php echo $row_genero['tipo_genero'] ?></option>
                        <?php }while($row_genero = mysqli_fetch_assoc($genero)) ?>
                    </select>
                    <select class="input__form-login" required="required" name="id_tipo_tela">
                        <option value="">Seleccione tipo de tela</option>
                        <?php do{ ?>
                        <option value="<?php echo $row_tela['id'] ?>"><?php echo $row_tela['tipo_tela'] ?></option>
                        <?php }while($row_tela = mysqli_fetch_assoc($tela)) ?>
                    </select>
                    <div class="form-group row">
                                <div class="container__file-selector">
                                    <input class="file__selector form-control" required="required" type="file" value="" name="logo">
                                </div>
                            </div>
                    <textarea class="input__form-login" name="descripcion" cols="40" rows="3" spellcheck="true" placeholder="Coloque aqui la descripción..."></textarea>
                    <input class="input__submit-login" type="submit" value="Agregar">
                    <input type="text" value="form_registro" name="agregar" hidden>
                </form> 
            </div>
        </section>
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>