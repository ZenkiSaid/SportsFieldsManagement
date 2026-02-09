<?php
// app/controllers/NoticiasController.php
require_once '../app/models/Noticia.php';

class NoticiasController extends Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['autenticado']) || $_SESSION['usuario_rol'] != 'Administrador') {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

    public function index() {
        $modelo = new Noticia($this->db);
        $noticias = $modelo->obtenerTodas();
        
        $vista_interna = '../app/views/noticias/index.php';
        $titulo_pagina = "Gestión de Noticias";
        $usuario_nombre = $_SESSION['usuario_nombre'];
        require_once '../app/views/dashboards/admin.php';
    }

    public function crear() {
        $vista_interna = '../app/views/noticias/crear.php';
        $titulo_pagina = "Nueva Noticia";
        $usuario_nombre = $_SESSION['usuario_nombre'];
        require_once '../app/views/dashboards/admin.php';
    }

    // --- GUARDAR ---
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modelo = new Noticia($this->db);
            
            // 1. Procesar Imagen
            $nombre_imagen = ''; 
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                // Subimos la imagen y obtenemos solo el nombre (ej: noticia_123.jpg)
                $nombre_imagen = $this->subirImagen($_FILES['imagen']);
                if (!$nombre_imagen) {
                    echo "<script>alert('Error al subir la imagen. Verifica permisos de carpeta.'); window.history.back();</script>";
                    return;
                }
            }

            // 2. Guardar en BD (Sin título, ya que tu BD no tiene esa columna)
            if ($modelo->guardar($nombre_imagen, $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['descripcion'])) {
                header("Location: index.php?controller=Noticias&action=index&msg=save_ok");
            } else {
                echo "<script>alert('Error al guardar en BD'); window.history.back();</script>";
            }
        }
    }

    public function editar() {
        if (isset($_GET['id'])) {
            $modelo = new Noticia($this->db);
            $noticia = $modelo->obtenerPorId($_GET['id']);
            
            if ($noticia) {
                $vista_interna = '../app/views/noticias/editar.php';
                $titulo_pagina = "Editar Noticia";
                $usuario_nombre = $_SESSION['usuario_nombre'];
                require_once '../app/views/dashboards/admin.php';
            } else {
                header("Location: index.php?controller=Noticias&action=index");
            }
        }
    }

    // --- ACTUALIZAR ---
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $modelo = new Noticia($this->db);
            $id = $_POST['id'];
            
            // 1. Obtener imagen actual (solo el nombre)
            $noticiaActual = $modelo->obtenerPorId($id);
            $nombre_final = $noticiaActual['not_imagen'];

            // 2. Si sube nueva imagen, la reemplazamos
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $nuevo_nombre = $this->subirImagen($_FILES['imagen']);
                if ($nuevo_nombre) {
                    $nombre_final = $nuevo_nombre;
                    // Opcional: Aquí podrías borrar la imagen vieja del servidor
                }
            }

            if ($modelo->actualizar($id, $nombre_final, $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['descripcion'])) {
                header("Location: index.php?controller=Noticias&action=index&msg=update_ok");
            } else {
                echo "<script>alert('Error al actualizar'); window.history.back();</script>";
            }
        }
    }

    public function eliminar() {
        if (isset($_GET['id'])) {
            $modelo = new Noticia($this->db);
            // Aquí también podrías borrar el archivo físico antes de borrar el registro
            $modelo->eliminar($_GET['id']);
            header("Location: index.php?controller=Noticias&action=index&msg=delete_ok");
        }
    }

    // --- FUNCIÓN PRIVADA CORREGIDA ---
    private function subirImagen($archivo) {
        // 1. Definir carpeta correcta (coincide con el Home)
        // La ruta es relativa al index.php que está en public/
        $carpeta_destino = 'uploads/noticias/';
        
        // 2. Crear carpeta si no existe
        if (!file_exists($carpeta_destino)) {
            mkdir($carpeta_destino, 0777, true);
        }
        
        // 3. Generar nombre único
        $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
        $nombre_archivo = uniqid('news_') . '.' . $extension;
        $ruta_destino = $carpeta_destino . $nombre_archivo;

        // 4. Mover y retornar SOLO EL NOMBRE
        if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
            return $nombre_archivo; // Retornamos "news_123.jpg" para guardar en BD
        }
        return false;
    }
}