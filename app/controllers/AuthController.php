<?php

class AuthController extends Controller {
    
    public function index() {
        $this->view('auth/login');
    }

    /**
     * Procesa el login del usuario
     */
    public function login() {
        // Si es GET, mostrar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('auth/login');
            return;
        }

        // Si es POST, procesar el login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usu = isset($_POST['nombre_usu']) ? trim($_POST['nombre_usu']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($nombre_usu) || empty($password)) {
                header('Location: index.php?controller=Auth&action=login&msg=required');
                exit;
            }

            // Crear instancia de Usuario
            $usuarioModel = new Usuario($this->db);
            $resultado = $usuarioModel->autenticar($nombre_usu, $password);

            if ($resultado['success']) {
                // Login exitoso - guardar sesión
                $_SESSION['usuario_id'] = $resultado['usuario']['id_usu'];
                $_SESSION['usuario_nombre'] = $resultado['usuario']['nombre_usu'];
                $_SESSION['autenticado'] = true;

                // Redirigir al dashboard
                header('Location: index.php?controller=Dashboard&action=index');
                exit;
            } else {
                // Login fallido
                header('Location: index.php?controller=Auth&action=login&msg=error');
                exit;
            }
        }
    }

    /**
     * Procesa el registro de un nuevo usuario
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $this->view('auth/register');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre_usu = isset($_POST['nombre_usu']) ? trim($_POST['nombre_usu']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';

            if ($password !== $password_confirm) {
                header('Location: index.php?controller=Auth&action=register&msg=mismatch');
                exit;
            }

            $usuarioModel = new Usuario($this->db);
            $resultado = $usuarioModel->registrar($nombre_usu, $email, $password);

            if ($resultado['success']) {
                header('Location: index.php?controller=Auth&action=login&msg=registrosuccess');
                exit;
            } else {
                $msg = 'error';
                if (strpos($resultado['message'], 'ya existe') !== false) {
                    $msg = 'exists';
                }
                header('Location: index.php?controller=Auth&action=register&msg=' . $msg);
                exit;
            }
        }
    }


    /**
     * Cierra la sesión del usuario
     */
    public function logout() {
        // Destruir la sesión
        session_destroy();
        header('Location: index.php?controller=Home&action=index');
        exit;
    }
}
