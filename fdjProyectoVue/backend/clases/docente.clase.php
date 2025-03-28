<?php
    require_once "base.php";

    class ClaseDocente extends Base
    {
        protected $idDocente;
        protected $nombre;
        protected $primApellido;
        protected $segApellido;
        protected $estatus;

        public function getIdDocente()
        {
            return $this->idDocente;
        }

        public function setIdDocente($idDocente)
        {
            $this->idDocente = $idDocente;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getPrimApellido()
        {
            return $this->primApellido;
        }

        public function setPrimApellido($primApellido)
        {
            $this->primApellido = $primApellido;
        }

        public function getSegApellido()
        {
            return $this->segApellido;
        }

        public function setSegApellido($segApellido)
        {
            $this->segApellido = $segApellido;
        }

        public function getEstatus()
        {
            return $this->estatus;
        }

        public function setEstatus($estatus)
        {
            $this->estatus = $estatus;
        }
    }
?>