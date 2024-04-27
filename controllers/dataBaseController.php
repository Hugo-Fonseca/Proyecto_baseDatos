<?php

namespace App\controllers;

use mysqli;

class DataBaseController
{
    private $host = 'localhost';
    private $user = 'tendero@ten.com';
    private $pwd = '12345ten';
    private $db = 'facturacion_tienda_db';
    private $conex;

    function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->db
        );
    }

    function execSql($sql)
    {
        return $this->conex->query($sql);
    }

    function close()
    {
        $this->conex->close();
    }
}
