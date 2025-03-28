<?php
    class ControladorLaboratorios
    {
        public static function ctrMostrarLaboratorios()
        {
            $respuesta = ModeloLaboratorio::mdlMostrarLaboratorios();
            
            return $respuesta;
        }
    }
?>