<?php

class Database {
    
    private $conexion;
    private $servidor = "DESKTOP-GE79NBB";
    private $usuario = "sa";
    private $password = "@Danny@110404";
    private $base_datos = "gestion_canchas";

    public function __construct() {
        try {
            // Intentar conectar con SQL Server
            $this->conexion = new PDO(
                "sqlsrv:Server=" . $this->servidor . ";Database=" . $this->base_datos,
                $this->usuario,
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    /**
     * Ejecuta una consulta SELECT
     * @param string $query Consulta SQL con placeholders (?)
     * @param array $params Parámetros para la consulta
     * @return array|false Resultados o false si hay error
     */
    public function select($query, $params = []) {
        try {
            $stmt = $this->conexion->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error en SELECT: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Ejecuta una consulta INSERT
     * @param string $query Consulta SQL con placeholders (?)
     * @param array $params Parámetros para la consulta
     * @return bool True si se inserta, false si hay error
     */
    public function insert($query, $params = []) {
        try {
            $stmt = $this->conexion->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Error en INSERT: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Ejecuta una consulta UPDATE
     * @param string $query Consulta SQL con placeholders (?)
     * @param array $params Parámetros para la consulta
     * @return bool True si se actualiza, false si hay error
     */
    public function update($query, $params = []) {
        try {
            $stmt = $this->conexion->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Error en UPDATE: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Ejecuta una consulta DELETE
     * @param string $query Consulta SQL con placeholders (?)
     * @param array $params Parámetros para la consulta
     * @return bool True si se elimina, false si hay error
     */
    public function delete($query, $params = []) {
        try {
            $stmt = $this->conexion->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Error en DELETE: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obtiene el último ID insertado
     */
    public function lastInsertId() {
        return $this->conexion->lastInsertId();
    }

    /**
     * Cierra la conexión
     */
    public function cerrar() {
        $this->conexion = null;
    }
}
