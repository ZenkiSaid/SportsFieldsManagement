<?php
// app/controllers/HomeController.php

// Nos aseguramos de extender (heredar) del Controller base
class HomeController extends Controller {
    
    public function index() {
        // Carga el archivo visual que pegaste en views/home/index.php
        $this->view('home/index');
    }
}