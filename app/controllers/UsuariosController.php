<?php
// app/controllers/UsuariosController.php

// Importamos el modelo
require_once 'app/models/Usuario.php';

class UsuariosController extends Controller {

    // Este método se ejecuta cuando vas a ?controller=Usuarios&action=index
    public function index() {
        // 1. Instanciar modelo
        $usuarioModel = new Usuario();
        
        // 2. Obtener datos
        $datos_usuarios = $usuarioModel->obtenerTodos();

        // 3. Preparar la vista interna
        // Nota: Crearemos este archivo en el Paso 4
        $vista_interna = 'app/views/usuarios/index.php';
        
        // Variables extra para el dashboard
        $titulo_pagina = "Gestión de Usuarios";

        // 4. Cargar el Dashboard Principal (admin.php)
        // El dashboard incluirá la $vista_interna en el centro
        require_once 'dashboards/admin.php';
    }
}
?>