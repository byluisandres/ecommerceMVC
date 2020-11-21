<?php

class AdmonUsuarios extends Controlador
{
    private $modelo;
    function __construct()
    {
        $this->modelo = $this->modelo("AdmonUsuariosModelo");
    }

    function index()
    {
        $datos = [
            "titulo" => "Administrativo Usuarios",
            "menu" => false,
            "admon" => true,
            "data" => [],
        ];
        $this->vista("admonUsuariosIndexVista",$datos);
    }

    
    function alta()
    {
        $datos = [
            "titulo" => "Administrativo Usuarios alta",
            "menu" => false,
            "admon" => true,
            "data" => [],
        ];
        $this->vista("admonUsuariosVista",$datos);
    }


    function baja()
    {
        print "usuarios baja";
    }
    function cambio()
    {
        print "usuarios cambio";
    }

}
