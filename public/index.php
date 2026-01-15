<?php
// public/index.php - Router Principal

// Iniciar sesión
session_start();

// Cargar archivos de configuración y core
require_once '../app/config/database.php';
require_once '../app/core/App.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';
require_once '../app/core/Database.php';

// Cargar todos los modelos
foreach (glob('../app/models/*.php') as $model) {
    require_once $model;
}

// Cargar todos los controladores
foreach (glob('../app/controllers/*.php') as $controller) {
    require_once $controller;
}

// Inicializar la aplicación
$app = new App();
