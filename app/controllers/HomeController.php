<?php
// app/controllers/HomeController.php

require_once '../app/models/Alquiler.php'; 
require_once '../app/models/Noticia.php'; // <--- NUEVO: Importar modelo Noticia
require_once '../app/models/HomeCancha.php'; // Importar
class HomeController extends Controller {
    
    public function index() {
       // 2. CONECTAR A LA BASE DE DATOS
        $alquilerModel = new Alquiler($this->db);
        $noticiaModel = new Noticia($this->db); // <--- NUEVO: Instanciar Noticia
        $homeCanchaModel = new HomeCancha($this->db); // <--- NUEVO: Instanciar modelo del slider
        // 3. OBTENER DATOS
        // 2. Obtener la agenda pública (RF-PUB-02)
        $agenda = $alquilerModel->obtenerAgendaPublica();

        // Noticias para la sección nueva (ESTO ES LO QUE FALTA)
        $noticias = $noticiaModel->obtenerActivas(); // <--- NUEVO: Traer noticias de la BD
        $sliderCanchas = $homeCanchaModel->obtenerTodas(); // <--- NUEVO: Traer las fotos de la BD
        // 3. Cargar la vista enviando los datos
        $this->view('home/index', [
            'agenda' => $agenda,
            'noticias' => $noticias, // <--- NUEVO: Pasar la variable a la vista
            'sliderCanchas' => $sliderCanchas // <--- NUEVO: Pasar las fotos a la vista
        ]);
    }
}