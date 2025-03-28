<?php
    require_once "base.php";

    class ClaseUsuario extends Base
    {
        protected $idUsuario;
        protected $nombre;
        protected $primApellido;
        protected $segApellido;
        protected $correo;
        protected $telefono;
        protected $usuario;
        protected $password;
        protected $idUsuarioRol;
        protected $estatus;

        public function getIdUsuario()
        {
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
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

        public function getCorreo()
        {
            return $this->correo;
        }

        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }

        public function getTelefono()
        {
            return $this->telefono;
        }

        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }

        
        public function getUsuario()
        {
            return $this->usuario;
        }

        public function setUsuario($usuario)
        {
            $this->usuario = $usuario;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getIdUsuarioRol()
        {
            return $this->idUsuarioRol;
        }

        public function setIdUsuarioRol($idUsuarioRol)
        {
            $this->idUsuarioRol = $idUsuarioRol;
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