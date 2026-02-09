<?php
// app/config/database.php

// Detectar si estamos en local o en el servidor (InfinityFree u otro)
// Puedes basarte en el nombre del servidor (hostname) o en la existencia de un archivo .env si lo usaras.
// Aquí usaremos una comprobación simple del host.

$whitelist = array('127.0.0.1', '::1', 'localhost');

// Usamos el operador de coalescencia nula (??) para evitar "Undefined array key" en CLI u otros entornos
if (in_array($_SERVER['REMOTE_ADDR'] ?? '', $whitelist)) {
    // === CONFIGURACIÓN LOCAL ===
    define('DB_SERVIDOR', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_PASSWORD', '');
    define('DB_NOMBRE', 'gestion_canchas');
} else {
    // === CONFIGURACIÓN INFINITYFREE (Llenar con datos del panel) ===
    // Host suele ser algo como: sqlXXX.infinityfree.com
    define('DB_SERVIDOR', 'sql307.infinityfree.com'); 
    define('DB_USUARIO', 'if0_41073337'); 
    define('DB_PASSWORD', '6hOywZhEBmvYGM');
    define('DB_NOMBRE', 'if0_41073337_gestion_canchas');
}

define('DB_CHARSET', 'utf8mb4');
