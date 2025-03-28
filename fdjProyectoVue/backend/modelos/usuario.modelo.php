<?php
    require_once "conexion.php";

    class ModeloUsuario
    {
        // VALIDACIÓN DE ACCESO DE USUARIO
        public static function mdlValidarAcceso($objetoUsuario)
        {
            $sql = "SELECT
                        us.idUsuario,
                        CONCAT(us.nombre,' ',us.primApellido,' ',us.segApellido) AS nombreUsuario,
                        us.correo,
                        us.telefono,
                        us.usuario,
                        us.password,
                        us.idUsuarioRol,
                        rl.rol,
                        us.estatus
                    FROM usuarios us
                    JOIN usuarios_roles rl ON us.idUsuarioRol = rl.idUsuarioRol
                    WHERE us.usuario = :usuario;";

            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->bindValue(":usuario", $objetoUsuario->getUsuario(), PDO::PARAM_STR);

            $stmt->execute(); // Ejecuto mi consulta
            $dato = $stmt->fetch(PDO::FETCH_ASSOC); // Obtengo el resultado como un array asosiativo
            
            $respuesta = ""; // Mensaje para enviar en el formulario de login

            if($dato) // Pregunto si obtuve una consulta que haya coincidido con el usuario ingresado por teclado
            {
                $password = $dato["password"];
                if($password == md5($objetoUsuario->getPassword()))
                {
                    if($dato["estatus"] == 1)
                    {
                        session_start();
                        $_SESSION["idUsuario"]     = $dato["idUsuario"];
                        $_SESSION["nombreUsuario"] = $dato["nombreUsuario"];
                        $_SESSION["correo"]        = $dato["correo"];
                        $_SESSION["telefono"]      = $dato["telefono"];
                        $_SESSION["usuario"]       = $dato["usuario"];
                        $_SESSION["password"]      = $dato["password"];
                        $_SESSION["idUsuarioRol"]  = $dato["idUsuarioRol"];
                        $_SESSION["rol"]           = $dato["rol"];
                        $_SESSION["estatus"]       = $dato["estatus"];

                        $respuesta = "OK";
                    }

                    else 
                    {
                        $respuesta = "Tu usuario ha sido deshabilitado, contacta al administrador";
                    }
                }
                
                else
                {
                    $respuesta = "Tu contraseña es incorrecta";
                }
            }

            else 
            {
                $respuesta = "No existe el usuario <strong>".$objetoUsuario->getUsuario()."</strong>";
            }

            return $respuesta;
        }
    }
?>