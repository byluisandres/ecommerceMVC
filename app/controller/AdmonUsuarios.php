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
        $this->vista("admonUsuariosIndexVista", $datos);
    }


    function alta()
    {
        $errores = array();
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = isset($_POST['nombre']) ? $_POST['nombre'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $password1 = isset($_POST['nombre']) ? $_POST['password1'] : "";
            $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";
            //validacion
            if (empty($usuario) || empty($email) || empty($password1) || empty($password2)) {
                array_push($errores, "Todos los campos con obligatorios");
            }
            if ($password1 != $password2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
            //crear el array de datos
            $data = [
                'usuario' => $usuario,
                'email' => $email,
                'password1' => $password1,
                'password2' => $password2,
            ];

            //verificamos que haya errores
            if (empty($errores)) {
                $resultado = $this->modelo->insertarDatos($data);
                if ($resultado) {
                    header("Location:" . RUTA . "admonUsuarios");
                } else {
                    $datos = [
                        "titulo" => "Error en el registro",
                        "menu" => false,
                        "errores" => [],
                        "data" => [],
                        "subtitulo" => "Error al registrarse",
                        "texto" => "Existio un error al insertar el registro, intentalo mas tarde",
                        "color" => "alert-danger",
                        "url" => "admonInicio",
                        "colorBoton" => "btn-danger",
                        "textoBoton" => "Regresar"
                    ];
                    $this->vista("mensajeVista", $datos);
                }
            } else {
                $datos = [
                    "titulo" => "Administrativo Usuarios alta",
                    "menu" => false,
                    "admon" => true,
                    "errores" => $errores,
                    "data" => $data,
                ];
                $this->vista("admonUsuariosVista", $datos);
            }
        } else {
            $datos = [
                "titulo" => "Administrativo Usuarios alta",
                "menu" => false,
                "admon" => true,
                "errores" => $errores,
                "data" => [],
            ];
            $this->vista("admonUsuariosVista", $datos);
        }
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
