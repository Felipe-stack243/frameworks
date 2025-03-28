<?php
    require_once "base.php";

    class ClaseLaboratorio extends Base
    {
        protected $idLaboratorio;
        protected $laboratorio;
        protected $alias;
        protected $capacidad;
        protected $idLaboratorioEstatus;

        public function getIdLaboratorio()
        {
            return $this->idLaboratorio;
        }

        public function setIdLaboratorio($idLaboratorio)
        {
            $this->idLaboratorio = $idLaboratorio;
        }

        public function getLaboratorio()
        {
            return $this->laboratorio;
        }

        public function setLaboratorio($laboratorio)
        {
            $this->laboratorio = $laboratorio;
        }

        public function getAlias()
        {
            return $this->alias;
        }

        public function setAlias($alias)
        {
            $this->alias = $alias;
        }

        public function getCapacidad()
        {
            return $this->capacidad;
        }

        public function setCapacidad($capacidad)
        {
            $this->capacidad = $capacidad;
        }

        public function getIdLaboratorioEstatus()
        {
            return $this->idLaboratorioEstatus;
        }

        public function setIdLaboratorioEstatus($idLaboratorioEstatus)
        {
            $this->idLaboratorioEstatus = $idLaboratorioEstatus;
        }
    }
?>