<?php

namespace App\controllers;

use App\models\usuarios;

class facturaController
{
    function read()
    {
        $dataBase = new DataBaseController();
        $sql = "select * from clientes";
        $result = $dataBase->execSql($sql);
        $clientes = [];
        if ($result->num_rows == 0) {
            return $clientes;
        }
        while ($item = $result->fetch_assoc()) {
            $contacto = new clientes();
            $contacto->set('id', $item['id']);
            $contacto->set('nombre', $item['nombre']);
            $contacto->set('email', $item['email']);
            $contacto->set('telefono', $item['telefono']);
            array_push($contactos, $contacto);
        }
        $dataBase->close();
        return $contactos;
    }

    function create($contacto)
    {
        $sql = "insert into contactos(nombre,email,telefono)values";
        $sql .= "(";
        $sql .= "'".$contacto->get('nombre')."',";
        $sql .= "'".$contacto->get('email')."',";
        $sql .= "'".$contacto->get('telefono')."'";
        $sql .= ")";
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function update($contacto)
    {
        $sql = "UPDATE contactos SET ";
        $sql .= "nombre='" . $contacto->get('nombre')."', ";
        $sql .= "email='". $contacto->get('email')."', "; 
        $sql .= "telefono='". $contacto->get('telefono')."' ";
        $sql .= "WHERE id=" . $contacto->get('id');
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }

    function delete($id)
    {
        $sql = "delete from contactos WHERE id=".$id;
        $dataBase = new DataBaseController();
        $result = $dataBase->execSql($sql);
        $dataBase->close();
        return $result;
    }
}