<?php

class Usuario {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    /**
     * Registra un nuevo usuario con email
     */
    public function registrar($nombre_usu, $email, $password) {
        if (empty($nombre_usu) || empty($email) || empty($password)) {
            return ['success' => false, 'message' => 'Campos requeridos'];
        }

        if (strlen($nombre_usu) < 3) {
            return ['success' => false, 'message' => 'El usuario debe tener al menos 3 caracteres'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Email inválido'];
        }

        // Validar contraseña fuerte
        $validacion = $this->validarContraseña($password);
        if (!$validacion['fuerte']) {
            return ['success' => false, 'message' => implode(', ', $validacion['recomendaciones'])];
        }

        // Verificar usuario único
        $query = "SELECT COUNT(*) as count FROM usuario WHERE nombre_usu = ? OR correo_usu = ?";
        $result = $this->db->select($query, [$nombre_usu, $email]);
        
        if ($result && $result[0]['count'] > 0) {
            return ['success' => false, 'message' => 'Usuario o email ya existe'];
        }

        // Encriptar contraseña
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Insertar usuario
        $query = "INSERT INTO usuario (nombre_usu, correo_usu, password_usu) VALUES (?, ?, ?)";
        $result = $this->db->insert($query, [$nombre_usu, $email, $password_hash]);

        if ($result) {
            return ['success' => true, 'message' => 'Usuario registrado'];
        }
        
        return ['success' => false, 'message' => 'Error al registrar'];
    }

    /**
     * Valida contraseña fuerte
     */
    public function validarContraseña($password) {
        $recomendaciones = [];
        $fuerte = true;

        if (strlen($password) < 8) {
            $recomendaciones[] = 'Mínimo 8 caracteres';
            $fuerte = false;
        }

        if (!preg_match('/[A-Z]/', $password)) {
            $recomendaciones[] = 'Agregar mayúsculas';
            $fuerte = false;
        }

        if (!preg_match('/[a-z]/', $password)) {
            $recomendaciones[] = 'Agregar minúsculas';
            $fuerte = false;
        }

        if (!preg_match('/[0-9]/', $password)) {
            $recomendaciones[] = 'Agregar números';
            $fuerte = false;
        }

        if (!preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'",.<>?\/\\|`~]/', $password)) {
            $recomendaciones[] = 'Agregar caracteres especiales';
            $fuerte = false;
        }

        return ['fuerte' => $fuerte, 'recomendaciones' => $recomendaciones];
    }



    /**
     * Autentica un usuario con usuario o correo
     */
    public function autenticar($nombre_usu_o_correo, $password) {
        if (empty($nombre_usu_o_correo) || empty($password)) {
            return ['success' => false, 'usuario' => null];
        }

        // Buscar por nombre de usuario O por correo
        $query = "SELECT id_usu, nombre_usu, password_usu, id_rol FROM usuario WHERE nombre_usu = ? OR correo_usu = ?";
        $result = $this->db->select($query, [$nombre_usu_o_correo, $nombre_usu_o_correo]);

        if (!$result || count($result) === 0) {
            return ['success' => false, 'usuario' => null];
        }

        $usuario = $result[0];

        // Verificar contraseña
        if (password_verify($password, $usuario['password_usu'])) {
            return [
                'success' => true,
                'usuario' => [
                    'id_usu' => $usuario['id_usu'],
                    'nombre_usu' => $usuario['nombre_usu'],
                    'id_rol' => $usuario['id_rol']
                ]
            ];
        }

        return ['success' => false, 'usuario' => null];
    }
}
