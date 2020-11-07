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

  function index()
  {
    $datos = [
      "titulo" => "Login",
      "menu" => false
    ];
    $this->vista("loginVista", $datos);
  }

  function olvido()
  {
    echo "Hola desde olvido";
  }

  function registro()
  {
    $errores = array();
    $data = array();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
      $email = isset($_POST['email']) ? $_POST['email'] : "";
      $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
      $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : "";
      $codigoPostal = isset($_POST['codigoPostal']) ? $_POST['codigoPostal'] : "";
      $pais = isset($_POST['pais']) ? $_POST['pais'] : "";
      $password1 = isset($_POST['password1']) ? $_POST['password1'] : "";
      $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";

      $data = [
        "nombre" => $nombre,
        "email" => $email,
        "direccion" => $direccion,
        "ciudad" =>  $ciudad,
        "codigoPostal"  => $codigoPostal,
        "pais" => $pais,
        "password1" => $password1,
        "password2" => $password2,
      ];
      if (
        $nombre == "" && $email == "" && $direccion == "" && $ciudad == "" && $codigoPostal == "" && $pais == ""
        && $password1 == "" && $password2 == ""
      ) {
        array_push($errores, "Todos los datos son obigatorios");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errores, "correo no válido");
      }
      if ($password1 != $password2) {
        array_push($errores, "Las contraseñas deben coincidir");
      }


      if (count($errores) == 0) {
        print "dar de alta";
      } else {
        $datos = [
          "titulo" => "Registro Usuario",
          "menu" => false,
          "errores" => $errores,
          "data" => $data
        ];
        $this->vista("loginRegistroVista", $datos);
      }
    } else {
      $datos = [
        "titulo" => "Registro Usuario",
        "menu" => false
      ];
      $this->vista("loginRegistroVista", $datos);
    }
  }
}
