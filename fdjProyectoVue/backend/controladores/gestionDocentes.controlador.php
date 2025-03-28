<?php
    class ControladorGestionDocentes
    {
        public static function ctrMostrarDocentes()
        {
            $respuesta = ModeloDocente::mdlMostrarDocentes();
            
            return $respuesta;
        }
    }
?>