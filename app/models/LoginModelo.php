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
    function getUsuarioCoreo($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $data = $this->db->query($sql);
        return $data;
    }

    function enviarCorreo($email)
    {
        $data = $this->getUsuarioCoreo($email);
        $id = $data['id'];
        $nombre = $data['nombre'];
        $msg = $nombre . ", entra el siguiente enlace para cambiar tu contraseña</br>";
        $msg .= "<a  href='http://localhost" . RUTA . "login/cambiaClave/" . $id . "' class='btn btn-primary'>Cambiar contraseña</a>";
        $headers = "MIME-Version:1.0\r\n";
        $headers .= "Content-type:text/html; charset=UTF-8\r\n";
        $headers .= "From:eCommerce\r\n";
        $headers .= "Repaly-to:$email\r\n";

        $asunto = "Cambiar clave de acceso";
        return @mail($email, $asunto, $msg, $headers);
    }

    function cambiaClaveAcceso($id, $password1)
    {
        $resultado = false;
        //validar 
        $clave = hash_hmac("sha512", $password1, "mimamamimima");
        $sql = "UPDATE usuarios SET clave='$clave' WHERE id='$id'";
        $resultado = $this->db->queryNoSelect($sql);
        return $resultado;
    }

    function verificar($email, $password)
    {
        $errores = array();
        if ($email == "" | $password == "") {
            array_push($errores, "Todos los campos son obligatorios");
        } else {
            $clave = hash_hmac("sha512", $password, "mimamamimima");
            $sql = "SELECT * FROM usuarios WHERE email='$email' AND clave='$clave'";
            $data = $this->db->query($sql);


            if (empty($data)) {
                array_push($errores, "El usuario y/o la contraseña con incorrectas.");
            }
        }

        //  else if ($clave != $data['clave']) {
        //     var_dump($errores);
        //     die();
        //   array_push($errores, "Contraseña incorrecta");
        //  }

        return $errores;
    }
}
