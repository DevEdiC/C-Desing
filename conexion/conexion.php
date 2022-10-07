<?php

class conexion{
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "mysql";
    private $db = "c'desing";

    public function conectar(){
        $conexion = mysqli_connect( $this->servidor,
                                    $this->usuario,
                                    $this->password,
                                    $this->db); 
        return $conexion;    
    }
}

?>