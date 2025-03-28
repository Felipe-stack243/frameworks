<?php
    class Conexion
    {
        public static function getBD()
        {
            $bd = new PDO("mysql:host=localhost;dbname=fdj2025", "root", "", 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $bd;
        }
    }
?>