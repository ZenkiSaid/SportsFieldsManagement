<?php

class Estado {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAll() {
        $query = "SELECT * FROM estado";
        return $this->db->select($query);
    }
}