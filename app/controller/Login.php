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
    if (isset($_COOKIE['datos'])) {
      $datos_array = explode("|", $_COOKIE['datos']);
      $usuario = $datos_array[0];
      $clave = $datos_array[1];
      $data = [
        "usuario" => $usuario,
        "clave" => $clave,
        "recordar" => "on",
      ];
    } else {
      $data = [];
    }
    $datos = [
      "titulo" => "Login",
      "menu" => false,
      "data" => $data
    ];
    $this->vista("loginVista", $datos);
    //$this->vista("inicioVista", $datos=[]);
  }

  function olvido()
  {
    $errores = array();
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $email = isset($_POST['email']) ? $_POST['email'] : "";
      if ($email == "") {
        array_push($errores, "Escribe tu correo para poder recupar la contraseña");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errores, "Formato del correo no válido");
      }

      if (count($errores) == 0) {
        if ($this->modelo->validaCorreo($email)) {
          array_push($errores, "El correo no exite");
        } else {
          if ($this->modelo->enviarCorreo($email)) {
            $datos = [
              "titulo" => "Cambio de clave de acceso",
              "menu" => false,
              "errores" => [],
              "data" => [],
              "subtitulo" => "Cambio de clave de acceso",
              "texto" => "Se ha enviado un correo a " . $email,
              "color" => "alert-success",
              "url" => "login",
              "colorBoton" => "btn-success",
              "textoBoton" => "Regresar"
            ];
            $this->vista("mensajeVista", $datos);
          } else {
            $datos = [
              "titulo" => "Error en el envío del correo",
              "menu" => false,
              "errores" => [],
              "data" => [],
              "subtitulo" => "Error en el envío del correo",
              "texto" => "Existo un error al enviar el correo. Prueba mas tarde",
              "color" => "alert-danger",
              "url" => "login",
              "colorBoton" => "btn-danger",
              "textoBoton" => "Regresar"
            ];
            $this->vista("mensajeVista", $datos);
          }
        }
      }
    } else {
      $datos = [
        "titulo" => "Recuperar contaseña",
        "menu" => false,
        "errores" => [],
        "data" => [],
        "subtitulo" => "Recuperar contaseña",
      ];
      $this->vista("olvidoVista", $datos);
    }

    if (count($errores)) {
      $datos = [
        "titulo" => "Recuperar contaseña",
        "menu" => false,
        "errores" => $errores,
        "data" => [],
        "subtitulo" => "Recuperar contaseña",
      ];
      $this->vista("olvidoVista", $datos);
    }
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
        $nombre == "" || $email == "" || $direccion == "" || $ciudad == "" || $codigoPostal == "" || $pais == ""
        || $password1 == "" || $password2 == ""
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
        $resultado = $this->modelo->insertarRegistro($data);
        if ($resultado) {
          $datos = [
            "titulo" => "Bienvenid@ a la tienda virtual",
            "menu" => false,
            "errores" => [],
            "data" => [],
            "subtitulo" => "Bienvenid@",
            "texto" => "Gracias por registrarse",
            "color" => "alert-success",
            "url" => "menu",
            "colorBoton" => "btn-success",
            "textoBoton" => "Iniciar"
          ];
          $this->vista("mensajeVista", $datos);
        } else {
          $datos = [
            "titulo" => "Error",
            "menu" => false,
            "errores" => [],
            "data" => [],
            "subtitulo" => "",
            "texto" => "Puede que exista ya el correo",
            "color" => "alert-danger",
            "url" => "login",
            "colorBoton" => "btn-danger",
            "textoBoton" => "Regresar"
          ];
          $this->vista("mensajeVista", $datos);
        }
      } else {
        $datos = [
          "titulo" => "Registro Usuario",
          "menu" => false,
          "errores" => $errores,
          "data" => $data
        ];
        $this->vista("RegistroVista", $datos);
      }
    } else {
      $datos = [
        "titulo" => "Registro Usuario",
        "menu" => false
      ];
      $this->vista("RegistroVista", $datos);
    }
  }

  function cambiaClave($data)
  {

    $errores = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id = isset($_POST['id']) ? $_POST['id'] : "";
      $password1 = isset($_POST['password1']) ? $_POST['password1'] : "";
      $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
      //Validaciones
      if ($password1 == "" || $password2 == "") {
        array_push($errores, "Todos los cambos son obligatorios");
      }
      if ($password1 != $password2) {
        array_push($errores, "Las contraseñas deben coincidir");
      }

      if (count($errores)) {
        //si hay errores
        $datos = [
          "titulo" => "Cambia Clave de acceso",
          "menu" => false,
          "errores" => $errores,
          "data" => $data
        ];
        $this->vista("cambiaClave", $datos);
      } else {
        //no hay errores
        if ($this->modelo->cambiaClaveAcceso($id, $password1)) {
          $datos = [
            "titulo" => "Modificar clave de acceso",
            "menu" => false,
            "errores" => [],
            "data" => [],
            "subtitulo" => "Modificar clave de acceso",
            "texto" => "Se ha modificado con exito",
            "color" => "alert-success",
            "url" => "login",
            "colorBoton" => "btn-success",
            "textoBoton" => "Regresar"
          ];
          $this->vista("mensajeVista", $datos);
        } else {
          $datos = [
            "titulo" => "Error al modificar la clave de acceso",
            "menu" => false,
            "errores" => [],
            "data" => [],
            "subtitulo" => "Error al modificar la clave de acceso",
            "texto" => "Existe un erroe al modificar la clave de acceso",
            "color" => "alert-danger",
            "url" => "login",
            "colorBoton" => "btn-danger",
            "textoBoton" => "Regresar"
          ];
          $this->vista("mensajeVista", $datos);
        }
      }
    } else {
      $datos = [
        "titulo" => "Cambia Clave de acceso",
        "menu" => false,
        "data" => $data
      ];
      $this->vista("cambiaClave", $datos);
    }
  }

  function verifica()
  {
    $errores = array();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $usuario = isset($_POST['email']) ? $_POST['email'] : "";
      $password = isset($_POST['password']) ? $_POST['password'] : "";
      $recordar = isset($_POST['recordar']) ? "on" : "off";

      $errores = $this->modelo->verificar($usuario, $password);
      //Recuerdame
      $valor = $usuario . "|" . $password;
      if ($recordar = "on") {
        $fecha = time() + (60 * 60 * 607);
      } else {
        $fecha = time() - 1;
      }
      setcookie("datos", $valor, $fecha, RUTA);
      $data = [
        "usuario" => $usuario,
        "clave" => $password,
        "recordar" => $recordar
      ];
      if (empty($errores)) {
        $data = $this->modelo->getUsuarioCoreo($usuario);
        $session = new Session();
        $session->iniciarLogin($data);
        header("Location:" . RUTA . "tienda");
      } else {
        $datos = [
          "titulo" => "Login",
          "menu" => false,
          "errores" => $errores,
          "data" => $data
        ];
        $this->vista("loginVista", $datos);
      }
    }
  }
}
