<?php

/**
 * clase modelo del login que se comunica con la base de datos
 */
class LoginModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }


    function insertarRegistro($data)
    {
        //datos
        $nombre = $data['nombre'];
        $email = $data['email'];
        $direccion = $data['direccion'];
        $ciudad = $data['ciudad'];
        $codigoPostal = $data['codigoPostal'];
        $pais = $data['pais'];
        $password1 = $data['password1'];
        $resultado = false;

        //validar si existe el correo eléctronico
        if ($this->validaCorreo($email)) {
            $clave = hash_hmac("sha512", $password1, "mimamamimima");
            $sql = "INSERT INTO usuarios VALUES (0,'$nombre','$email','$direccion','$ciudad','$codigoPostal','$pais','$clave')";
            $resultado = $this->db->queryNoSelect($sql);
        }
        return $resultado;
    }
    //función para validar el correo
    function validaCorreo($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $data = $this->db->query($sql);
        return count($data) == 0 ? true : false;
    }
}
