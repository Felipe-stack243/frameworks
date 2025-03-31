<?php
    require_once "../clases/usuario.clase.php";
    require_once "../modelos/usuario.modelo.php";

    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    class FetchLogin
    {
        public function fetchValidarAcceso($objetoUsuario)
        {
            $respuesta = ModeloUsuario::mdlValidarAcceso($objetoUsuario);

            echo $respuesta;
        }
    }

    // Obtengo los datos JSON enviados por Vue
    $datos = json_decode(file_get_contents("php://input"), true);

    // Verifico si el formulario fue enviado:
    if(isset($datos["operacion"]))
    {
        if($datos["operacion"] == "iniciarSesion")
        {
            // Creo una instancia de mi objeto Usuario
            $objetoUsuario = new ClaseUsuario();
            $objetoUsuario->setUsuario($datos["usuario"]);
            $objetoUsuario->setPassword($datos["password"]);

            $miFetch = new FetchLogin();
            $miFetch->fetchValidarAcceso($objetoUsuario);
        }
    }
?>