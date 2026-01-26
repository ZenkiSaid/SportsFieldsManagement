<?php

class ReservasController extends Controller {

    public function solicitar() {
        if (!isset($_SESSION['autenticado']) || !$_SESSION['autenticado']) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Cargar opciones
            $canchaModel = new Cancha($this->db);
            $horarioModel = new Horario($this->db);
            $canchas = $canchaModel->getAll();
            $horarios = $horarioModel->getAll();

            $data = [
                'canchas' => $canchas,
                'horarios' => $horarios
            ];

            $this->view('reservas/solicitar', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->procesarSolicitud();
        }
    }

    private function procesarSolicitud() {
        $id_usu = $_SESSION['usuario_id'];
        $id_cancha = $_POST['id_cancha'];
        $fecha = $_POST['fecha'];
        $hora_inicial = $_POST['hora_inicial'];
        $hora_final = $_POST['hora_final'];

        // Calcular duración y valor
        $horas = (strtotime($hora_final) - strtotime($hora_inicial)) / 3600;
        $canchaModel = new Cancha($this->db);
        $cancha = $canchaModel->getById($id_cancha);
        $valor_total = $horas * $cancha['precio_hora'];

        // Verificar disponibilidad
        $reservaModel = new Reserva($this->db);
        if (!$reservaModel->verificarDisponibilidad($id_cancha, $fecha, $hora_inicial, $hora_final)) {
            // Error: no disponible
            header('Location: index.php?controller=Reservas&action=solicitar&msg=no_disponible');
            exit;
        }

        // Subir archivo
        $archivo_pago = null;
        if (isset($_FILES['archivo_pago']) && $_FILES['archivo_pago']['error'] == 0) {
            $extension = pathinfo($_FILES['archivo_pago']['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($extension), ['pdf', 'jpg', 'jpeg', 'png'])) {
                $archivo_pago = uniqid() . '.' . $extension;
                move_uploaded_file($_FILES['archivo_pago']['tmp_name'], 'uploads/' . $archivo_pago);
            }
        }

        // Crear reserva
        $data = [
            'id_usu' => $id_usu,
            'id_cancha' => $id_cancha,
            'fecha' => $fecha,
            'hora_inicial' => $hora_inicial,
            'hora_final' => $hora_final,
            'valor_total' => $valor_total,
            'archivo_pago' => $archivo_pago
        ];

        if ($reservaModel->crear($data)) {
            header('Location: index.php?controller=Dashboard&action=index&msg=exito');
        } else {
            header('Location: index.php?controller=Reservas&action=solicitar&msg=error');
        }
    }
}