<?php
    require_once "conexion.php";

    class ModeloFormularios {
        // MODELO QUE RETORNA UN ARRAY EL CUAL SERVIRÁ PARA RELLENAR UN COMBO (SELECT)
        public static function mdlMostrarCombo($tabla, $campo, $valor, $ordenamiento) {
            $listaCombo = array(); // Aquí se guardarán los valores para llenar el combo

            $cadenaWhere = "";
            if($valor != null) $cadenaWhere .= " WHERE $campo = $valor";
            if($tabla == "docentes") $cadenaWhere .= " WHERE estatus = 1";

            $sql = "SELECT * FROM $tabla $cadenaWhere ORDER BY $ordenamiento";
            $stmt = Conexion::getBD()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
?>