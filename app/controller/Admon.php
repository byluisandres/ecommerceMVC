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
        $datos = [
            "titulo" => "Administrativo Inicio",
            "menu" => false,
            "admon"=>true,
            "data" => [],
        ];
        $this->vista("admonInicioVista", $datos);
    }
}
