<?php

class Admon extends Controlador
{
    private $modelo;
    function __construct()
    {
        $this->modelo = $this->modelo("AdmonModelo");
    }

    function index()
    {
        $datos = [
            "titulo" => "Administrativo",
            "menu" => false,
            "data" => [],
        ];
        $this->vista("admonVista", $datos);
    }

    function verifica()
    {
        $errores = array();
        $data = array();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = isset($_POST['email']) ? $_POST['email'] : "";
            $clave = isset($_POST['password']) ? $_POST['password'] : "";

            if (empty($usuario)) {
                array_push($errores, "El usuario es obligatorio");
            }
            if (empty($clave)) {
                array_push($errores, "La clave es obligatoria");
            }
            $data = [
                'usuario' => $usuario,
                'clave' => $clave
            ];
            if (empty($errores)) {
                if ($this->modelo->verificarClave($data)) {
                } else {
                }
            }
        } else {
            $datos = [
                "titulo" => "Administrativo Inicio",
                "menu" => false,
                "admon" => true,
                "data" => []
            ];
            $this->vista("admonInicioVista", $datos);
        }

        $datos = [
            "titulo" => "Administrativo Inicio",
            "menu" => false,
            "admon" => true,
            "data" => [],
        ];
        $this->vista("admonInicioVista", $datos);
    }
}
