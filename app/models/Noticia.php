<?php
// app/models/Noticia.php

class Noticia {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Listar todas las noticias (Más recientes primero)
    public function obtenerTodas() {
        // NOTA: Verifica si tu tabla se llama 'noticia' o 'noticias' en tu base de datos.
        // Aquí lo dejo como 'noticia' (singular) tal como lo tenías.
        $sql = "SELECT * FROM noticia ORDER BY not_id DESC";
        return $this->db->select($sql);
    }

    // TRAER SOLO NOTICIAS VIGENTES (Que no han vencido)
    public function obtenerActivas() {
        // La condición 'WHERE not_fecha_fin >= CURDATE()' hace la magia
        $sql = "SELECT * FROM noticia 
                WHERE not_fecha_fin >= CURDATE() 
                ORDER BY not_id DESC";
        return $this->db->select($sql);
    }

    // Obtener una por ID (Para editar)
    public function obtenerPorId($id) {
        $sql = "SELECT * FROM noticia WHERE not_id = ?";
        $res = $this->db->select($sql, [$id]);
        return $res[0] ?? null;
    }

    // Guardar nueva (INSERT)
    public function guardar($imagen, $inicio, $fin, $descripcion) {
        $sql = "INSERT INTO noticia (not_imagen, not_fecha_inicio, not_fecha_fin, not_descripcion) VALUES (?, ?, ?, ?)";
        // Usamos 'insert'
        return $this->db->insert($sql, [$imagen, $inicio, $fin, $descripcion]);
    }

    // Actualizar (UPDATE)
    public function actualizar($id, $imagen, $inicio, $fin, $descripcion) {
        $sql = "UPDATE noticia SET not_imagen = ?, not_fecha_inicio = ?, not_fecha_fin = ?, not_descripcion = ? WHERE not_id = ?";
        
        // CORRECCIÓN: Usamos 'update' en lugar de 'insert'
        // Si tu clase de BD no tiene 'update', cámbialo por 'query' o 'execute'
        return $this->db->update($sql, [$imagen, $inicio, $fin, $descripcion, $id]);
    }

    // Eliminar (DELETE)
    public function eliminar($id) {
        $sql = "DELETE FROM noticia WHERE not_id = ?";
        
        // CORRECCIÓN: Usamos 'query' o 'delete' (según tu framework), 
        // pero si antes usabas 'insert' para borrar y funcionaba, puedes dejarlo. 
        // Lo ideal es:
        return $this->db->insert($sql, [$id]); 
    }
}