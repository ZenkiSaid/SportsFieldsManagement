<?php
class HomeCancha {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM home_canchas ORDER BY hc_id DESC";
        return $this->db->select($sql);
    }

    public function guardar($imagen, $descripcion) {
        $sql = "INSERT INTO home_canchas (hc_imagen, hc_descripcion) VALUES (?, ?)";
        return $this->db->insert($sql, [$imagen, $descripcion]);
    }

    public function eliminar($id) {
        // Primero obtenemos el nombre para borrar el archivo físico
        $sqlSelect = "SELECT hc_imagen FROM home_canchas WHERE hc_id = ?";
        $registro = $this->db->select($sqlSelect, [$id]);
        
        if ($registro) {
            $archivo = 'uploads/home_canchas/' . $registro[0]['hc_imagen'];
            if (file_exists($archivo)) {
                unlink($archivo); // Borra el archivo de la carpeta
            }
        }
        
        $sql = "DELETE FROM home_canchas WHERE hc_id = ?";
        return $this->db->insert($sql, [$id]); // Usamos insert/query para ejecutar
    }

    // Obtener una sola foto por ID (Para mostrarla en el formulario de edición)
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM home_canchas WHERE hc_id = ?";
        $resultado = $this->db->select($sql, [$id]);
        return $resultado ? $resultado[0] : null;
    }

    // Actualizar la imagen (Solo imagen, ya que quitamos descripción)
    public function actualizar($id, $imagenNueva) {
        $sql = "UPDATE home_canchas SET hc_imagen = ? WHERE hc_id = ?";
        return $this->db->insert($sql, [$imagenNueva, $id]); // Usamos insert para ejecutar UPDATE
    }
}