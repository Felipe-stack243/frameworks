<?php
    // Archivo para validar la sesión activa de un usuario dentro del sistema
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    session_start();

    if(isset($_SESSION['idUsuario']))
    {
        echo json_encode(
            [
                "acceso"        => true, 
                "idUsuario"     => $_SESSION['idUsuario'],
                "nombreUsuario" => $_SESSION["nombreUsuario"],
                "correo"        => $_SESSION["correo"],
                "telefono"      => $_SESSION["telefono"],
                "usuario"       => $_SESSION["usuario"],
                "password"      => $_SESSION["password"],
                "idUsuarioRol"  => $_SESSION["idUsuarioRol"],
                "rol"           => $_SESSION["rol"],
                "estatus"       => $_SESSION["estatus"]
            ]
        );
    } 
    
    else 
    {
        echo json_encode(["acceso" => false]);
    }
?>