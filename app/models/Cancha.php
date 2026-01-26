<?php

class Cancha {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAll() {
        $query = "SELECT * FROM cancha";
        return $this->db->select($query);
    }

    public function getById($id) {
        $query = "SELECT * FROM cancha WHERE id_cancha = ?";
        $result = $this->db->select($query, [$id]);
        return $result ? $result[0] : null;
    }
}