<?php
    require_once "conexion.php";

    class ModeloLaboratorio
    {
        public static function mdlMostrarLaboratorios()
        {
            $sql = "SELECT 
                        l.idLaboratorio,
                        l.laboratorio, 
                        l.alias, 
                        l.idLaboratorioEstatus,
                        CASE 
                            WHEN l.idLaboratorioEstatus = 1 THEN 'SIN CLASE ASIGNADA'
                            WHEN l.idLaboratorioEstatus = 2 THEN 'EN CLASE'
                            WHEN l.idLaboratorioEstatus = 4 THEN 'EN MANTENIMIENTO'
                            WHEN l.idLaboratorioEstatus = 3 THEN 'EN TRANSITO'
                            ELSE 'DESCONOCIDO'
                        END AS estatus,

                        CASE 
                            WHEN l.idLaboratorioEstatus = 2 THEN CONCAT(d.nombre, ' ', d.primApellido, ' ', d.segApellido) 
                            ELSE NULL
                        END AS docente,

                        CASE 
                            WHEN l.idLaboratorioEstatus = 2 THEN lo.hora 
                            ELSE NULL
                        END AS hora

                    FROM laboratorios l
                    LEFT JOIN laboratorios_operaciones lo ON l.idLaboratorio = lo.idLaboratorio
                    LEFT JOIN docentes d ON lo.idDocente = d.idDocente
                    GROUP BY l.idLaboratorio
                    ORDER BY l.laboratorio ASC;
            ";

            $stmt = Conexion::getBD()->prepare($sql); // Preparo mi consulta
            $stmt->execute();
            return $stmt->fetchAll();
        }

        // MODELO PARA COLOCAR EN TRANSITO A UN LABORATORIO
        public static function mdlColocarTransito($objetoLaboratorio, $idUsuario)
        {
            $respuesta = "";
            
            try
            {
                $bd = Conexion::getBD();
                $bd->beginTransaction();

                $sql  = "UPDATE laboratorios SET idLaboratorioEstatus = 3 WHERE idLaboratorio = :idLaboratorio";
                $stmt = $bd->prepare($sql);
                $stmt->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt->execute();

                $sql2  = "INSERT INTO laboratorios_operaciones (idLaboratorio, fecha, hora, idUsuarioTransito) VALUES (:idLaboratorio, CURDATE(), CURTIME(), $idUsuario)";
                $stmt2 = $bd->prepare($sql2);
                $stmt2->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt2->execute();

                $bd->commit();
                $respuesta = "OK";
            }

            catch (Exception $e) {
                $bd->rollBack();
                $respuesta = "Ha ocurrido el siguiente error: " . $e->getMessage();
            }

            return $respuesta;
        }

        // MODELO PARA COLOCAR DISPONIBLE UN LABORATORIO
        public static function mdlColocarDisponible($objetoLaboratorio, $idUsuario)
        {
            $respuesta = "";
            
            try
            {
                $bd = Conexion::getBD();
                $bd->beginTransaction();

                $sql  = "UPDATE laboratorios SET idLaboratorioEstatus = 1 WHERE idLaboratorio = :idLaboratorio";
                $stmt = $bd->prepare($sql);
                $stmt->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt->execute();

                $sql2  = "INSERT INTO laboratorios_operaciones (idLaboratorio, fecha, hora, idUsuarioDisponible) VALUES (:idLaboratorio, CURDATE(), CURTIME(), $idUsuario)";
                $stmt2 = $bd->prepare($sql2);
                $stmt2->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt2->execute();

                $bd->commit();
                $respuesta = "OK";
            }

            catch (Exception $e) {
                $bd->rollBack();
                $respuesta = "Ha ocurrido el siguiente error: " . $e->getMessage();
            }

            return $respuesta;
        }

        // MODELO PARA COLOCAR EN MANTENIMIENTO A UN LABORATORIO
        public static function mdlColocarMantenimiento($objetoLaboratorio, $idUsuario)
        {
            $respuesta = "";
            
            try
            {
                $bd = Conexion::getBD();
                $bd->beginTransaction();

                $sql  = "UPDATE laboratorios SET idLaboratorioEstatus = 4 WHERE idLaboratorio = :idLaboratorio";
                $stmt = $bd->prepare($sql);
                $stmt->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt->execute();

                $sql2  = "INSERT INTO laboratorios_operaciones (idLaboratorio, fecha, hora, idUsuarioMantenimiento) VALUES (:idLaboratorio, CURDATE(), CURTIME(), $idUsuario)";
                $stmt2 = $bd->prepare($sql2);
                $stmt2->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt2->execute();

                $bd->commit();
                $respuesta = "OK";
            }

            catch (Exception $e) {
                $bd->rollBack();
                $respuesta = "Ha ocurrido el siguiente error: " . $e->getMessage();
            }

            return $respuesta;
        }

        // MODELO PARA COLOCAR OCUPADO A UN LABORATORIO
        public static function mdlColocarOcupado($objetoLaboratorio, $idUsuario, $idDocente)
        {
            $respuesta = "";
            
            try
            {
                $bd = Conexion::getBD();
                $bd->beginTransaction();

                $sql  = "UPDATE laboratorios SET idLaboratorioEstatus = 2 WHERE idLaboratorio = :idLaboratorio";
                $stmt = $bd->prepare($sql);
                $stmt->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt->execute();

                $sql2  = "INSERT INTO laboratorios_operaciones (idLaboratorio, idDocente, fecha, hora, idUsuarioOcupado) VALUES (:idLaboratorio, $idDocente, CURDATE(), CURTIME(), $idUsuario)";
                $stmt2 = $bd->prepare($sql2);
                $stmt2->bindValue(":idLaboratorio", $objetoLaboratorio->getIdLaboratorio(), PDO::PARAM_STR);
                $stmt2->execute();

                $bd->commit();
                $respuesta = "OK";
            }

            catch (Exception $e) {
                $bd->rollBack();
                $respuesta = "Ha ocurrido el siguiente error: " . $e->getMessage();
            }

            return $respuesta;
        }
    }
?>