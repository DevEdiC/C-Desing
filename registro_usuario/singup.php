<?php
require_once("../conexion/conexion.php");
    $conexion = new conexion();
    $conectar = $conexion->conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingUp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../assests/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">C'Desing</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-end" id="navbarScroll">
                    <div>
                        <a class="btn btn-outline-primary" href="../acceso_usuario/login.php">Log In</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="form__content">   
        <form action="register_user.php" method="POST" class="form__login">
            <h1 class="tittle__form animate__animated animate__backInLeft">Registro de Usuario</h1>
            <input class="input__form-login" name="nombre" type="text" placeholder="Ingrese su nombre">
            <input class="input__form-login" name="identificacion" type="text" placeholder="Ingrese su identificación">
            <input class="input__form-login" name="correo" type="email" placeholder="Ingrese su correo">
            <input class="input__form-login" name="id_tipo_usuario" hidden="hidden" value="2" >
            <input class="input__form-login" name="contraseña" type="password" placeholder="Ingrese su contraseña">
            <input class="input__submit-login" type="submit" value="Registrar">
        </form> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>