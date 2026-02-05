<?php
// public/index.php

// 1. INICIAR SESIÓN (Obligatorio para login y mensajes flash)
session_start();

// 2. Configuración y Core
require_once '../app/config/database.php';
require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';

// 3. Enrutador Simple (Front Controller)

// Variables por defecto
$controllerName = 'HomeController';
$actionName = 'index';

// A) Prioridad 1: Parámetros GET explícitos (ej: index.php?controller=Auth&action=login)
if (isset($_GET['controller'])) {
    $controllerName = ucfirst($_GET['controller']) . 'Controller';
    if (isset($_GET['action'])) {
        $actionName = $_GET['action'];
    }
} 
// B) Prioridad 2: URL Amigable (ej: public/User/profile)
elseif (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $urlParams = explode('/', $url);

    // Evitar que "index.php" se interprete como controlador
    if (!empty($urlParams[0]) && strtolower($urlParams[0]) !== 'index.php') {
        $controllerName = ucfirst($urlParams[0]) . 'Controller';
    }
    
    if (!empty($urlParams[1])) {
        $actionName = $urlParams[1];
    }
    
    // Guardamos params extra si fuera necesario, aunque este router parece no usarlos así
    // $params = array_slice($urlParams, 2);
}

// Ruta al archivo del controlador
$controllerFile = '../app/controllers/' . $controllerName . '.php';

// 4. Cargar Controlador
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        if (method_exists($controller, $actionName)) {
            // Ejecutar la acción solicitada
            $controller->{$actionName}();
        } else {
            // Error amigable si la acción no existe
            die("Error 404: El método '$actionName' no existe en el controlador '$controllerName'.");
        }
    } else {
        die("Error 500: La clase '$controllerName' no se pudo cargar.");
    }
} else {
    // Si el controlador no existe, pero estamos en la raíz o error, mandamos a Home
    if ($controllerName == 'Index.phpController') { 
         // Caso borde extremo
         header('Location: index.php');
         exit;
    }
    die("Error 404: El controlador '$controllerName' no se encuentra ($controllerFile).");
}