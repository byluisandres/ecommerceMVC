<?php

/*
*Control maneja la url y lanza los procesos,
el primer elemento es el objeto o controlador
el segundo elemento es el método o acción
el tercero y posteriores son los parámetros
*/
class Control
{
    //propiedades
    protected $controlador = "Login";
    protected $metodo = "caratula";
    protected $parametros = [];

    function __construct()
    {
        $url = $this->separarURL();

        if ($url !== "" && file_exists("../app/controller/" . ucwords($url[0]) . ".php")) {
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
        //llamando la clase del controlador
        require_once "../app/controller/" . ucwords($this->controlador) . ".php";
        //Instanciando la clase del controlador
        $this->controlador = new $this->controlador;

        if (isset($url[1])) {
            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }

        $this->parametros = $url ? array_values($url) : [];
       
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
    }

    function separarURL()
    {
        $url = "";
        if (isset($_GET["url"])) {
            //eliminamos el carácter final
            $url = rtrim($_GET["url"], "/");
            $url = rtrim($_GET["url"], "\\");

            //limpiamos carácteres no propios de la url
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Separamos
            $url = explode("/", $url);

            return $url;
        }
    }
}
