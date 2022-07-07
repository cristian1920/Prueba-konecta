<?php


class ConexionMysql
{

    function conexion()
    {
        $usuario = "root";
        $contraseña ="";
        $nombre_bd ="pruebaphp";

        try {
            $conectar = new PDO(
                'mysql:host=localhost;
                dbname=' . $nombre_bd,
                $usuario,
                $contraseña,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                
            );
            return $conectar;
        } catch (PDOException $e) {
            echo "Problema con la conexion: " . $e->getMessage();
        }
    }
}

