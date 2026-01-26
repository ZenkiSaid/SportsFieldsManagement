<?php

class Horario {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAll() {
        $query = "SELECT * FROM horario ORDER BY hora";
        return $this->db->select($query);
    }
}