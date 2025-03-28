<?php
    require_once "conexion.php";

    class ModeloDocente
    {
        // OBTENGO LA CONSULTA DE DOCENTES
        public static function mdlMostrarDocentes()
        {
            $sql = "SELECT 
                        d.idDocente,
                        d.nombre,
                        d.primApellido,
                        d.segApellido,
                        d.estatus
                    FROM docentes d
                    ORDER BY d.idDocente ASC;
            ";

            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // REGISTRO A UN DOCENTE
        public static function mdlRegistrarDocente($objetoDocente)
        {
            $respuesta = "";
            
            $sql = "INSERT INTO docentes(nombre, primApellido, segApellido) VALUES(:nombre, :primApellido, :segApellido);";
            
            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->bindValue(":nombre", $objetoDocente->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":primApellido", $objetoDocente->getPrimApellido(), PDO::PARAM_STR);
            $stmt->bindValue(":segApellido", $objetoDocente->getSegApellido(), PDO::PARAM_STR);

            $resultado = $stmt->execute();

            if($resultado) {
                $respuesta = "OK";
            }

            else {
                $respuesta = "ERROR AL INSERTAR DOCENTE";
            }

            return $respuesta;
        }

        // MODIFICO UN DOCENTE:
        public static function mdlModificarDocente($objetoDocente)
        {
            $respuesta = "";
            
            $sql = "UPDATE docentes SET nombre = :nombre, primApellido = :primApellido, segApellido = :segApellido WHERE idDocente = :idDocente;";
            
            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->bindValue(":nombre", $objetoDocente->getNombre(), PDO::PARAM_STR);
            $stmt->bindValue(":primApellido", $objetoDocente->getPrimApellido(), PDO::PARAM_STR);
            $stmt->bindValue(":segApellido", $objetoDocente->getSegApellido(), PDO::PARAM_STR);
            $stmt->bindValue(":idDocente", $objetoDocente->getIdDocente(), PDO::PARAM_STR);

            $resultado = $stmt->execute();

            if($resultado) {
                $respuesta = "OK";
            }

            else {
                $respuesta = "ERROR AL MODIFICAR DOCENTE";
            }

            return $respuesta;
        }

        // ACTIVAR / DESACTIVAR DOCENTE:
        public static function mdlActivarDesactivarDocente($idDocente, $valor)
        {
            $respuesta = "";
            
            $sql = "UPDATE docentes SET estatus = :estatus WHERE idDocente = :idDocente;";
            
            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->bindParam(":estatus", $valor, PDO::PARAM_STR);
            $stmt->bindParam(":idDocente", $idDocente, PDO::PARAM_STR);

            $resultado = $stmt->execute();

            if($resultado) {
                $respuesta = "OK";
            }

            else {
                $respuesta = "ERROR AL MODIFICAR DOCENTE";
            }

            return $respuesta;
        }
    }
?>