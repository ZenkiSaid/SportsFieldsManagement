<?php

class DashboardController extends Controller {
    
    public function index() {
        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $usuario_nombre = $_SESSION['usuario_nombre'] ?? 'Usuario';
        echo "<h1>Bienvenido, " . htmlspecialchars($usuario_nombre) . "</h1>";
        echo "<p><a href='index.php?controller=Auth&action=logout'>Cerrar Sesión</a></p>";
    }
}
