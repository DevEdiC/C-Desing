<?php

class funciones{

  //Estas funciones son para el apartado de camibusos

  public function agregar_camibuso($datos){
    $conect_b = new conexion();
    $conexion = $conect_b->conectar();

    $sql = "INSERT INTO camibusos (talla,color,precio,id_tipo_genero,id_tipo_tela,logo,descripcion) 
            VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

    $result = mysqli_query($conexion,$sql);
    return $result;
  }  

  public function consulta_camibuso($sql){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();

    $result = mysqli_query($conexion1, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function consulta_camibuso_individual($sql){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();
    return $result = mysqli_query($conexion1, $sql);
  }

  public function editar_camibusos($datos){
    $conect = new conexion();
    $conexion1 = $conect->conectar();

    $sql = "UPDATE camibusos SET talla='$datos[1]',color='$datos[2]',precio='$datos[3]',
                              id_tipo_genero='$datos[4]',id_tipo_tela='$datos[5]',
                              descripcion='$datos[6]'
                              WHERE id='$datos[0]'";

    return $result = mysqli_query($conexion1, $sql);
  }
  
  public function eliminar_camibusos($id_camibuso){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();
    $sql = "DELETE FROM camibusos where id = '$id_camibuso'";
    return $result = mysqli_query($conexion1,$sql);
  }

  //Estas funciones son para el apartado de usuarios

  public function registrar_usuario($datos){
    $conect_b = new conexion();
    $conexion = $conect_b->conectar();

    $sql = "INSERT INTO usuarios (nombre, identificacion, correo, contraseña, id_tipo_usuario) 
            VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";

    $result = mysqli_query($conexion,$sql);
    return $result;
  } 

  public function consulta_usuario($sql){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();

    $result = mysqli_query($conexion1, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  public function consulta_usuario_individual($sql){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();
    return $result = mysqli_query($conexion1, $sql);
  }

  public function editar_usuarios($datos){
    $conect = new conexion();
    $conexion1 = $conect->conectar();

    $sql = "UPDATE usuarios SET identificacion='$datos[0]',nombres='$datos[1]',apellidos='$datos[2]',
                              telefono='$datos[3]',password='$datos[4]',
                              id_tipo_usuario='$datos[5]'
                              WHERE identificacion='$datos[0]'";

    return $result = mysqli_query($conexion1, $sql);
  }

  public function eliminar_usuarios($identification){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();
    $sql = "DELETE FROM usuarios where identificacion = '$identification'";
    return $result = mysqli_query($conexion1,$sql);
  }

  //Este apartado de funciones es para los prestamos 

  public function registrar_prestamo($datos){
    $conect_b = new conexion();
    $conexion = $conect_b->conectar();

    $sql = "INSERT INTO prestamos (id_usuario, isbn_libro,fecha_prestamo) 
            VALUES ('$datos[0]','$datos[1]','$datos[2]')";

    $result = mysqli_query($conexion,$sql);
    return $result;
  } 

  public function datos_prestamo($sql){
    $conect_b= new conexion();
    $conexion1 = $conect_b->conectar();
    return $result = mysqli_query($conexion1, $sql);
  }

  public function editar_estado_libro($isbn){
    $conect = new conexion();
    $conexion1 = $conect->conectar();

    $sql = "UPDATE libros SET id_estado_prestamo=2
                          WHERE isbn='$isbn'";
    return $result = mysqli_query($conexion1, $sql);
  }

  public function editar_estado_libro_devolucion($isbn){
    $conect = new conexion();
    $conexion1 = $conect->conectar();

    $sql = "UPDATE libros SET id_estado_prestamo=1
                          WHERE isbn='$isbn'";
    return $result = mysqli_query($conexion1, $sql);
  }

  public function colocar_fecha_entrega($datos){
    $conect = new conexion();
    $conexion1 = $conect->conectar();
    
    //if ('id_usuario'==$datos['0']) {
    $sql = "UPDATE prestamos SET fecha_entrega ='$datos[2]' WHERE isbn_libro='$datos[1]' 
            AND id_usuario = '$datos[0]'";

    return $result = mysqli_query($conexion1, $sql);
    //}
    
  }

}

class user {

  public function getUser($correo,$contraseña){
    $conect = new conexion();
    $conexion1 = $conect->conectar();
    
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'";
    $result = mysqli_query($conexion1,$sql);

    $numRows = $result->num_rows;
    if ($numRows == 1) {
      return true;
    }else{
      return false;
    }
    
  }

}

?>
