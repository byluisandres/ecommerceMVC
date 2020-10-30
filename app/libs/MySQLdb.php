<?php

/**
 * clase de la conexion MYSQL
 */
class MySQLdb
{

    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $db = "ecommercemvc";
    private $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);

        if (mysqli_connect_errno()) {
            echo "Error db" . mysqli_connect_errno();
            exit();
        } else {
        
        }

        if (!mysqli_set_charset($this->conn, "utf8")) {
            echo "Error en los caracteres" . mysqli_connect_error();
            exit();
        } else {
            
        }
    }
}
