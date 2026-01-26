<?php

class DashboardController extends Controller {
    
    public function index() {
        // Verificar que el usuario esté autenticado
        if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $rol = $_SESSION['usuario_rol'] ?? 2; // default cliente

        if ($rol == 1) {
            $this->view('dashboards/admin');
        } elseif ($rol == 2) {
            $this->cliente();
        } elseif ($rol == 3) {
            $this->view('dashboards/organizador');
        } else {
            $this->view('dashboards/cliente');
        }
    }

    public function cliente() {
        $usuario_id = $_SESSION['usuario_id'];

        // Calcular KPIs
        $reservaModel = new Reserva($this->db);
        $horas_alquiladas = $reservaModel->getTotalHoras($usuario_id);
        $valor_pagado = $reservaModel->getTotalValorPagado($usuario_id);

        // Historial reciente (últimos 10 días)
        $historial = $reservaModel->getHistorialReciente($usuario_id);

        $data = [
            'horas_alquiladas' => $horas_alquiladas,
            'valor_pagado' => $valor_pagado,
            'historial' => $historial
        ];

        $this->view('dashboards/cliente', $data);
    }
}
