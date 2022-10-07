<?php

  session_start();

  session_unset();

  session_destroy();

  header('Location:acceso_usuario/login.php');

?>