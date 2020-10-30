<?php

/**
 * Controlador Login
 */

class Login extends Controlador
{
  private $modelo;
  function __construct()
  {
    $this->modelo = $this->modelo("LoginModelo");
  }

  function caratula()
  {
    $datos = [
      "titulo" => "Login",
      "menu" => false
    ];
    $this->vista("loginVista", $datos);
  }

  function olvido(){
    echo "Hola desde olvido";
  }

  function registro()
  {
    $datos = [
      "titulo" => "Registro Usuario",
      "menu" => false
    ];
    $this->vista("loginRegistroVista", $datos);
  }
}
