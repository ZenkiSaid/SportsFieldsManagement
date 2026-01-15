<?php
// app/core/Controller.php

class Controller {
    
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function view($view, $data = []) {
        // Verifica si el archivo de la vista existe
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // Si no existe, muestra un mensaje de error simple
            die("Error: No se encuentra la vista: app/views/" . $view . ".php");
        }
    }
}