<?php

class App {
    
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        // Obtener el controlador de los parámetros GET
        // Formato: ?controller=Auth&action=login
        if (isset($_GET['controller'])) {
            $this->controller = $_GET['controller'];
        }

        // Obtener el método/action
        if (isset($_GET['action'])) {
            $this->method = $_GET['action'];
        }

        // Nombre del controlador
        $controllerName = $this->controller . 'Controller';
        
        // Verificar que el controlador existe
        if (!class_exists($controllerName)) {
            die("Error: El controlador '{$controllerName}' no existe. Controlador solicitado: " . htmlspecialchars($this->controller));
        }

        // Crear instancia del controlador
        $controller = new $controllerName();

        // Verificar que el método existe
        if (!method_exists($controller, $this->method)) {
            die("Error: El método '{$this->method}' no existe en {$controllerName}");
        }

        // Ejecutar el método
        call_user_func_array([$controller, $this->method], $this->params);
    }
}

