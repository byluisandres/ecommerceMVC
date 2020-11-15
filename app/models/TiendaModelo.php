<?php

/**
 * clase modelo de la tienda
 */
class TiendaModelo
{
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }
}
