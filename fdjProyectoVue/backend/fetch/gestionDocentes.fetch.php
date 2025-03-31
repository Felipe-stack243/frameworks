<?php
    require_once "../clases/docente.clase.php";
    require_once "../modelos/docente.modelo.php";
    
    class FetchGestionDocentes
    {
        // CONSULTAR
        public static function fetchMostrarDocentes()
        {
            $respuesta = ModeloDocente::mdlMostrarDocentes();
            
            return $respuesta;
        }

        // AGREGAR
        public function fetchRegistrarDocente($objetoDocente)
        {
            // Envio mi objeto al modelo
            $respuesta = ModeloDocente::mdlRegistrarDocente($objetoDocente);

            echo $respuesta;
        }

        // MODIFCAR
        public function fetchModificarDocente($objetoDocente)
        {
            // Envio mi objeto al modelo
            $respuesta = ModeloDocente::mdlModificarDocente($objetoDocente);

            echo $respuesta;
        }

        // ACTIVAR O DESACTIVAR DOCENTE
        public function fetchActivarDesactivarDocente($idDocente, $valor)
        {
            // Envio mi objeto al modelo
            $respuesta = ModeloDocente::mdlActivarDesactivarDocente($idDocente, $valor);

            echo $respuesta;
        }
    }

    // Verifico si el formulario fue enviado:
    if(isset($_POST["operacion"]))
    {
        if($_POST["operacion"] == "registrarDocente")
        {
            // Creo una instancia de mi objeto Usuario
            $objetoDocente = new ClaseDocente();
            $objetoDocente->setNombre($_POST["nombre"]);
            $objetoDocente->setPrimApellido($_POST["primApellido"]);
            $objetoDocente->setSegApellido($_POST["segApellido"]);

            $miFetch = new FetchGestionDocentes();
            $miFetch->fetchRegistrarDocente($objetoDocente);
        }

        else if($_POST["operacion"] == "modificarDocente")
        {
            // Creo una instancia de mi objeto Usuario
            $objetoDocente = new ClaseDocente();
            $objetoDocente->setIdDocente($_POST["idDocente"]);
            $objetoDocente->setNombre($_POST["nombre"]);
            $objetoDocente->setPrimApellido($_POST["primApellido"]);
            $objetoDocente->setSegApellido($_POST["segApellido"]);

            $miFetch = new FetchGestionDocentes();
            $miFetch->fetchModificarDocente($objetoDocente);
        }

        else if($_POST["operacion"] == "activarDesactivar")
        {
            // Creo una instancia de mi objeto Usuario
            $idDocente = $_POST["idDocente"];
            $valor     = $_POST["valorEstatus"];

            $miFetch = new FetchGestionDocentes();
            $miFetch->fetchActivarDesactivarDocente($idDocente, $valor);
        }
    }
?>