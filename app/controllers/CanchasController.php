<?php
// app/controllers/CanchasController.php
require_once '../app/models/Cancha.php';
require_once '../app/models/HomeCancha.php';

class CanchasController extends Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['autenticado']) || $_SESSION['usuario_rol'] != 'Administrador') {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

   public function index() {
        // 1. Cargar canchas normales (Para el inventario de arriba)
        $modeloCancha = new Cancha($this->db);
        $canchas = $modeloCancha->obtenerTodos(); // Asegúrate que tu método se llame así en el modelo

        // 2. Cargar fotos del Home (Para la galería de abajo) <--- NUEVO
        $modeloHome = new HomeCancha($this->db);
        $fotosHome = $modeloHome->obtenerTodas();

        // 3. Configurar la vista (SOLO UNA VEZ)
        $vista_interna = '../app/views/canchas/index.php';
        $titulo_pagina = "Gestión de Canchas";
        $usuario_nombre = $_SESSION['usuario_nombre'];
        
        // 4. Cargar el Dashboard
        require_once '../app/views/dashboards/admin.php';
    }

    // --- NUEVAS FUNCIONES PARA EL SLIDER ---

    public function guardarFotoHome() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen'])) {
            $modelo = new HomeCancha($this->db);
            
            if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $carpeta = 'uploads/home_canchas/';
                if (!file_exists($carpeta)) mkdir($carpeta, 0777, true);
                
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $nombre = uniqid('slider_') . '.' . $ext;
                
                if(move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombre)){
                    $modelo->guardar($nombre, $_POST['descripcion']);
                }
            }
            // Redirigimos al mismo index de canchas
            header("Location: index.php?controller=Canchas&action=index#seccion-fotos");
        }
    }

    public function eliminarFotoHome() {
        if (isset($_GET['id'])) {
            $modelo = new HomeCancha($this->db);
            $modelo->eliminar($_GET['id']);
            header("Location: index.php?controller=Canchas&action=index#seccion-fotos");
        }
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modelo = new Cancha($this->db);
            if ($modelo->guardar($_POST['nombre'], $_POST['precio'])) {
                header("Location: index.php?controller=Canchas&action=index&msg=save_ok");
            } else {
                echo "<script>alert('Error al guardar'); window.history.back();</script>";
            }
        }
    }

    // En CanchasController.php
   // En app/controllers/CanchasController.php

    public function editar() {
        if (isset($_GET['id'])) {
            $modelo = new Cancha($this->db);
            $cancha = $modelo->obtenerPorId($_GET['id']);
            
            if ($cancha) {
                // CORRECCIÓN AQUÍ: Cambiamos 'editar.php' por 'edit.php'
                $vista_interna = '../app/views/canchas/edit.php'; 
                
                $titulo_pagina = "Editar Cancha";
                $usuario_nombre = $_SESSION['usuario_nombre'];
                
                require_once '../app/views/dashboards/admin.php'; 
            } else {
                header("Location: index.php?controller=Canchas&action=index");
            }
        }
    }
    // --- FUNCIÓN ACTUALIZAR ---
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modelo = new Cancha($this->db);
            // Llama a la función corregida del modelo
            if ($modelo->actualizar($_POST['id'], $_POST['nombre'], $_POST['precio'])) {
                header("Location: index.php?controller=Canchas&action=index&msg=update_ok");
            } else {
                echo "<script>alert('Error al actualizar'); window.history.back();</script>";
            }
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $modelo = new Cancha($this->db);
            if($modelo->eliminar($_GET['id'])){
                 header("Location: index.php?controller=Canchas&action=index&msg=delete_ok");
            } else {
                 echo "<script>alert('No se puede eliminar: Esta cancha tiene reservas asociadas.'); window.location.href='index.php?controller=Canchas&action=index';</script>";
            }
        }
    }
   // --- FUNCIÓN Editar y ACTUALIZAR Galeria fotos Home ---
   // Muestra el formulario de edición
    public function editarFotoHome() {
        if (isset($_GET['id'])) {
            $modelo = new HomeCancha($this->db);
            $foto = $modelo->obtenerPorId($_GET['id']);

            if ($foto) {
                // Configuramos la vista de edición
                $vista_interna = '../app/views/canchas/edit_home.php';
                $titulo_pagina = "Editar Foto del Home";
                $usuario_nombre = $_SESSION['usuario_nombre'];
                require_once '../app/views/dashboards/admin.php';
            } else {
                header("Location: index.php?controller=Canchas&action=index");
            }
        }
    }

    // Procesa el cambio de imagen
    public function actualizarFotoHome() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $modelo = new HomeCancha($this->db);
            
            // Verificamos si subieron una nueva imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                
                // 1. Obtener imagen vieja para borrarla
                $fotoActual = $modelo->obtenerPorId($id);
                
                // 2. Subir nueva imagen
                $carpeta = 'uploads/home_canchas/';
                $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
                $nombreNuevo = uniqid('slider_') . '.' . $ext;
                
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombreNuevo)) {
                    
                    // 3. Borrar archivo viejo físico
                    if ($fotoActual && file_exists($carpeta . $fotoActual['hc_imagen'])) {
                        unlink($carpeta . $fotoActual['hc_imagen']);
                    }

                    // 4. Actualizar Base de Datos
                    $modelo->actualizar($id, $nombreNuevo);
                }
            }
            
            header("Location: index.php?controller=Canchas&action=index#seccion-fotos");
        }
    }


}