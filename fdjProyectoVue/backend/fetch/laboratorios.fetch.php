<?php
    require_once "../modelos/laboratorio.modelo.php";

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    class FetchLaboratorios
    {
        public static function fetchMostrarLaboratorios()
        {
            $respuesta = ModeloLaboratorio::mdlMostrarLaboratorios();
            
            echo $respuesta;
        }
    }

    // Llamar la función para ejecutar la consulta
    FetchLaboratorios::fetchMostrarLaboratorios();
?>