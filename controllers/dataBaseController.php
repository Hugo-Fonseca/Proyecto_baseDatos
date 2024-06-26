<?php
namespace App\controllers;

use mysqli;

class DataBaseController
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'facturacion_tienda_db';
    private $conex;

    public function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->db
        );
    }

    public function execSql($sql)
    {
        return $this->conex->query($sql);
    }

    public function close()
    {
        $this->conex->close();
    }

    public function getInsertId()
    {
        return $this->conex->insert_id;
    }
}
?>
