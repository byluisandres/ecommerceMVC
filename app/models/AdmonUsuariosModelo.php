<?php

class AdmonUsuariosModelo
{
    private $db;
    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function insertarDatos($data)
    {
        $nombre = $data['usuario'];
        $email = $data['email'];
        $password1 = $data['password1'];
        $resultado = false;

        $clave = hash_hmac("sha512", $password1, "mimmamamemima");
        $fecha = date("Y-m-d H:i:s");
        $sql = "INSERT INTO admon (id, nombre,correo,clave,status,baja,creado_dt) VALUES(0,'$nombre','$email','$clave',1,0,'$fecha')";

        $resultado = $this->db->queryNoSelect($sql);

        return $resultado;
    }
}
