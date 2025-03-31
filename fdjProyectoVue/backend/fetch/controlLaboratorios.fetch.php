<?php
    require_once "../clases/laboratorio.clase.php";
    require_once "../modelos/laboratorio.modelo.php";

    class FetchControlLaborarios
    {
        public function fetchColocarTransito($objetoLaboratorio, $idUsuario)
        {
            $respuesta = ModeloLaboratorio::mdlColocarTransito($objetoLaboratorio, $idUsuario);

            echo $respuesta;
        }

        public function fetchColocarDisponible($objetoLaboratorio, $idUsuario)
        {
            $respuesta = ModeloLaboratorio::mdlColocarDisponible($objetoLaboratorio, $idUsuario);

            echo $respuesta;
        }

        public function fetchColocarMantenimiento($objetoLaboratorio, $idUsuario)
        {
            $respuesta = ModeloLaboratorio::mdlColocarMantenimiento($objetoLaboratorio, $idUsuario);

            echo $respuesta;
        }

        public function fetchColocarOcupado($objetoLaboratorio, $idUsuario, $idDocente)
        {
            $respuesta = ModeloLaboratorio::mdlColocarOcupado($objetoLaboratorio, $idUsuario, $idDocente);

            echo $respuesta;
        }
    }

    // Verifico si el formulario fue enviado:
    if(isset($_POST["operacion"]))
    {
        $operacion = $_POST["operacion"];

        switch ($operacion) 
        {
            case 'colocarTransito':
                $idUsuario = $_POST["idUsuario"];

                $objetoLaboratorio = new ClaseLaboratorio();
                $objetoLaboratorio->setIdLaboratorio($_POST["idLaboratorio"]);

                $miFetch = new FetchControlLaborarios();
                $miFetch->fetchColocarTransito($objetoLaboratorio, $idUsuario);
            break;

            case 'colocarDisponible':
                $idUsuario = $_POST["idUsuario"];

                $objetoLaboratorio = new ClaseLaboratorio();
                $objetoLaboratorio->setIdLaboratorio($_POST["idLaboratorio"]);

                $miFetch = new FetchControlLaborarios();
                $miFetch->fetchColocarDisponible($objetoLaboratorio, $idUsuario);
            break;

            case 'colocarMantenimiento':
                $idUsuario = $_POST["idUsuario"];

                $objetoLaboratorio = new ClaseLaboratorio();
                $objetoLaboratorio->setIdLaboratorio($_POST["idLaboratorio"]);

                $miFetch = new FetchControlLaborarios();
                $miFetch->fetchColocarMantenimiento($objetoLaboratorio, $idUsuario);
            break;

            case 'ocuparLaboratorio':
                $idUsuario = $_POST["idUsuario"];
                $idDocente = $_POST["idDocente"];

                $objetoLaboratorio = new ClaseLaboratorio();
                $objetoLaboratorio->setIdLaboratorio($_POST["idLaboratorio"]);

                $miFetch = new FetchControlLaborarios();
                $miFetch->fetchColocarOcupado($objetoLaboratorio, $idUsuario, $idDocente);
            break;
        }
    }
?>