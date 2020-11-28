<?php

class AdmonModelo
{
    private $db;
    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function verificarClave($data)
    {
        var_dump($data);
    }
}
