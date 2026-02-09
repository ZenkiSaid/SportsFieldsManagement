<?php
// app/controllers/PerfilController.php
require_once '../app/models/Usuario.php';

class PerfilController extends Controller {

    public function __construct() {
        parent::__construct();
        // Validar sesión
        if (!isset($_SESSION['autenticado'])) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

    public function index() {
        $usuarioModel = new Usuario($this->db);
        $usuario = $usuarioModel->obtenerUsuarioPorId($_SESSION['usuario_id']);
        
        $this->view('perfil/index', [
            'usuario' => $usuario,
            'mensaje' => $_GET['msg'] ?? null
        ]);
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_SESSION['usuario_id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

            $usuarioModel = new Usuario($this->db);
            
            // Reutilizamos editarUsuario del modelo Usuario
            // Nota: editarUsuario maneja la lógica de si password es null
            if ($usuarioModel->editarUsuario($id, $nombre, $correo, $password)) {
                
                // Actualizar nombre en sesión si cambió
                $_SESSION['usuario_nombre'] = $nombre;
                $_SESSION['usuario_email'] = $correo; // Si guardamos email en sesión

                header('Location: index.php?controller=Perfil&action=index&msg=update_ok');
            } else {
                header('Location: index.php?controller=Perfil&action=index&msg=error');
            }
        }
    }
}
