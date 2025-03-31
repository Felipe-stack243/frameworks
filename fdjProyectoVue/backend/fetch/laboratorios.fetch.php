<?php
    require_once "../modelos/laboratorio.modelo.php";

    class FetchLaboratorios
    {
        public static function fetchMostrarLaboratorios()
        {
            $respuesta = ModeloLaboratorio::mdlMostrarLaboratorios();
            
            return $respuesta;
        }
    }
?>