<?php
    require_once "conexion.php";

    class ModeloUsuario
    {
        // VALIDACIÓN DE ACCESO DE USUARIO
        public static function mdlValidarAcceso($objetoUsuario)
        {
            // RESPUESTA QUE SERÁ CONVERTIDA A JSON ENCONDE MÁS ADELANTE / POR DEFECTO TENDRÁ ERROR
            $respuesta = [
                "status"  => "error",
                "message" => "Ha ocurrido un error en la consulta"
            ];

            $sql = "
                SELECT
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
                WHERE us.usuario = :usuario;
            ";

            $stmt = Conexion::getBD()->prepare($sql);
            $stmt->bindValue(":usuario", $objetoUsuario->getUsuario(), PDO::PARAM_STR);

            $stmt->execute();
            $dato = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($dato)
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

                        $respuesta = [
                            "status"  => "success",
                            "message" => "OK"
                        ];
                    }

                    else 
                    {   
                        $respuesta = [
                            "status"  => "error",
                            "message" => "Tu usuario ha sido deshabilitado, contacta al administrador"
                        ];
                    }
                }
                
                else
                {
                    $respuesta = [
                        "status"  => "error",
                        "message" => "Tu contraseña es incorrecta"
                    ];
                }
            }

            else 
            {
                $respuesta = [
                    "status"  => "error",
                    "message" => "No existe el usuario <strong>".$objetoUsuario->getUsuario()."</strong>"
                ];
            }

            return json_encode($respuesta);
        }
    }
?>