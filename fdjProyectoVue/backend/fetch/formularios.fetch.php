<?php
    require_once "../modelos/formularios.modelo.php";

    class FetchFormularios {
        // CONTROLADOR UTILIZADO PARA MANDAR A LLAMAR AL MODELO QUE RETORNE LOS VALORES PARA LLENAR COMBOS (SELECTS)
        public static function fetchMostrarCombo($tabla, $campo, $valor, $ordenamiento) 
        {
            $respuesta = ModeloFormularios::mdlMostrarCombo($tabla, $campo, $valor, $ordenamiento);

            return $respuesta;
        }
    }
?>