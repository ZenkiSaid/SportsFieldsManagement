<?php

class Reserva {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getTotalHoras($usuario_id) {
        $query = "SELECT SUM(DATEDIFF(HOUR, hora_inicial, hora_final)) as total_horas FROM reserva WHERE id_usu = ? AND estado IN ('Aprobado', 'Finalizado')";
        $result = $this->db->select($query, [$usuario_id]);
        return $result ? $result[0]['total_horas'] : 0;
    }

    public function getTotalValorPagado($usuario_id) {
        $query = "SELECT SUM(valor_total) as total_valor FROM reserva WHERE id_usu = ? AND estado IN ('Aprobado', 'Finalizado')";
        $result = $this->db->select($query, [$usuario_id]);
        return $result ? $result[0]['total_valor'] : 0;
    }

    public function getHistorialReciente($usuario_id) {
        $query = "SELECT r.fecha, c.nombre_cancha, r.hora_inicial, r.hora_final, r.archivo_pago, e.nombre_estado
                  FROM reserva r
                  JOIN cancha c ON r.id_cancha = c.id_cancha
                  JOIN estado e ON r.id_estado = e.id_estado
                  WHERE r.id_usu = ? AND r.fecha >= DATEADD(DAY, -10, GETDATE())
                  ORDER BY r.fecha DESC";
        return $this->db->select($query, [$usuario_id]);
    }

    public function crear($data) {
        $query = "INSERT INTO reserva (id_usu, id_cancha, fecha, hora_inicial, hora_final, valor_total, archivo_pago, id_estado)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $estado_registrado = 1; // Assume 1 is Registrado
        $params = [
            $data['id_usu'],
            $data['id_cancha'],
            $data['fecha'],
            $data['hora_inicial'],
            $data['hora_final'],
            $data['valor_total'],
            $data['archivo_pago'],
            $estado_registrado
        ];
        return $this->db->insert($query, $params);
    }

    public function verificarDisponibilidad($id_cancha, $fecha, $hora_inicial, $hora_final) {
        $query = "SELECT COUNT(*) as count FROM reserva
                  WHERE id_cancha = ? AND fecha = ? AND id_estado IN (2,3) AND
                  ((hora_inicial < ? AND hora_final > ?) OR (hora_inicial < ? AND hora_final > ?) OR (hora_inicial >= ? AND hora_final <= ?))";
        $result = $this->db->select($query, [$id_cancha, $fecha, $hora_final, $hora_inicial, $hora_inicial, $hora_final, $hora_inicial, $hora_final]);
        return $result[0]['count'] == 0;
    }
}