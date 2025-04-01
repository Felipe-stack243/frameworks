<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    session_start();
    session_unset();  // Elimino todas las variables de sesión
    session_destroy(); // Destruyo la sesión

    echo json_encode(["success" => true]);
?>