<?php 
/**
 * clase modelo del login que se comunica con la base de datos
 */
class LoginModelo{
    private $db;

    function __construct()
    {
        $this->db= new MySQLdb();
    }

}
