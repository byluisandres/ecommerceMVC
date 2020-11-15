<?php

/**
 * Controlador tienda
 */

class Tienda extends Controlador
{
  private $modelo;
  function __construct()
  {
    $this->modelo = $this->modelo("TiendaModelo");
  }

  function index()
  {
    $datos = [
      "titulo" => "Bienvenido a nuestra tienda",
      "menu" => false
    ];
    $this->vista("tiendaVista", $datos);
  }



}