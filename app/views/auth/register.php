<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse - Canchas Premium</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/landinghome.css">
    <style>
        body { 
            margin: 0;
            padding: 0;
            background: #f5f5f5; 
        }
        
        .auth-page { 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 2rem;
            background: url('assets/img/background.webp') center/cover fixed;
            position: relative;
            overflow: hidden;
        }

        /* Background animado opcional */
        .auth-page::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 20% 50%, rgba(0, 255, 136, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(0, 100, 200, 0.05) 0%, transparent 50%);
            top: -50%;
            left: -50%;
            animation: moveBackground 15s ease-in-out infinite;
        }

        @keyframes moveBackground {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(50px, 50px); }
        }
        
        .auth-container { 
            background: #fff; 
            border-radius: 20px; 
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); 
            width: 100%; 
            max-width: 550px; 
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .auth-header {
            background: linear-gradient(135deg, var(--primary) 0%, #00b85f 100%);
            padding: 2rem;
            color: #000;
            text-align: center;
        }

        .auth-header h1 {
            margin: 0 0 0.5rem 0;
            font-size: 1.8rem;
            font-weight: 900;
            text-transform: uppercase;
        }

        .auth-header p {
            margin: 0;
            font-size: 0.95rem;
            opacity: 0.8;
        }

        .auth-content { 
            padding: 3rem 2.5rem;
            position: relative;
        }

        /* Overlay semitransparente para el background */
        .auth-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.95);
            z-index: -1;
        }

        .form-group { 
            margin-bottom: 1.2rem; 
        }

        .form-group label { 
            display: block; 
            margin-bottom: 0.5rem; 
            color: #444; 
            font-weight: 600; 
            font-size: 0.9rem; 
        }

        .form-control { 
            width: 100%; 
            padding: 0.85rem 1rem; 
            border-radius: 10px; 
            border: 1px solid #ddd; 
            outline: none; 
            font-size: 0.95rem; 
            transition: all 0.3s;
            font-family: inherit;
            box-sizing: border-box;
        }

        .form-control:focus { 
            border-color: var(--primary); 
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        }

        .btn-auth { 
            width: 100%; 
            padding: 0.95rem; 
            border-radius: 30px; 
            border: none; 
            background: var(--primary); 
            color: #000; 
            font-weight: 800; 
            font-size: 1rem; 
            cursor: pointer; 
            margin-top: 1.5rem; 
            transition: all 0.3s;
        }

        .btn-auth:hover { 
            background: #00b85f; 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.3);
        }

        .btn-auth:active {
            transform: translateY(0);
        }

        .switch-link { 
            text-align: center; 
            margin-top: 1.5rem; 
            color: #999; 
            font-size: 0.9rem; 
        }

        .switch-link a { 
            color: var(--primary); 
            text-decoration: none; 
            font-weight: 600; 
            cursor: pointer;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }

        .eye-btn { 
            background: transparent; 
            border: none; 
            position: absolute; 
            right: 12px; 
            top: 36px; 
            cursor: pointer; 
            color: #999;
            padding: 5px;
        }

        .eye-btn:hover {
            color: var(--primary);
        }

        .input-wrap { 
            position: relative; 
        }

        .error-msg { 
            color: #e74c3c; 
            font-size: 0.85rem; 
            text-align: center; 
            background: #fadbd8; 
            padding: 0.5rem; 
            border-radius: 8px; 
            margin-bottom: 1rem;
        }

        .success-msg { 
            color: #27ae60; 
            font-size: 0.85rem; 
            text-align: center; 
            background: #d5f4e6; 
            padding: 0.5rem; 
            border-radius: 8px; 
            margin-bottom: 1rem;
        }

        .form-group small {
            display: block;
            margin-top: 0.3rem;
        }

        .back-link {
            text-align: center;
            margin-top: 1rem;
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .home-btn {
            display: inline-block;
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(0, 255, 42, 0.7);
            color: #fff;
            padding: 0.7rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            z-index: 2;
            transition: all 0.3s;
        }

        .home-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-2px);
        }

        .footer-box {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        .strength-item {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
            color: #999;
            transition: color 0.3s;
        }

        .strength-item.completed {
            color: #27ae60;
        }

        .strength-item.completed i {
            color: #27ae60 !important;
        }

        .strength-item.warning {
            color: #f39c12;
        }

        .strength-item.warning i {
            color: #f39c12 !important;
        }

        .btn-auth:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn-auth:not(:disabled):hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        @media (max-width: 480px) {
            .auth-container { width: 95%; }
            .auth-content { padding: 2rem 1.5rem; }
            .auth-header { padding: 1.5rem; }
            .auth-header h1 { font-size: 1.4rem; }
        }
    </style>
</head>
<body>

    <div class="auth-page">
        <a href="index.php?controller=Home&action=index" class="home-btn"><i class="fas fa-arrow-left"></i> Volver al Inicio</a>
        <div class="auth-container">
            <div class="auth-header">
                <h1>Crear Cuenta</h1>
                <p>Regístrate para reservar tus canchas</p>
            </div>

            <div class="auth-content">
                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'exists'): ?>
                    <div class="error-msg"><i class="fas fa-exclamation-circle"></i> El usuario ya existe</div>
                <?php endif; ?>
                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'mismatch'): ?>
                    <div class="error-msg"><i class="fas fa-exclamation-circle"></i> Las contraseñas no coinciden</div>
                <?php endif; ?>
                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                    <div class="success-msg"><i class="fas fa-check-circle"></i> Cuenta creada exitosamente. <a href="index.php?controller=Auth&action=login" style="color: #27ae60; font-weight: 600;">Inicia sesión aquí</a></div>
                <?php endif; ?>
                
                <form action="index.php?controller=Auth&action=register" method="POST">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Nombre de usuario</label>
                        <input class="form-control" type="text" name="nombre_usu" placeholder="Tu nombre de usuario" required autocomplete="username">
                        <small style="color:#999;">Será tu identificador para iniciar sesión</small>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Correo electrónico</label>
                        <input class="form-control" type="email" name="email" placeholder="tu@email.com" required autocomplete="email">
                        <small style="color:#999;">Recibirás un código de verificación</small>
                    </div>

                    <div class="form-group input-wrap">
                        <label><i class="fas fa-lock"></i> Contraseña</label>
                        <input id="reg-password" class="form-control" type="password" name="password" placeholder="Mín. 8 caracteres" required minlength="8" autocomplete="new-password" oninput="validarContraseña()">
                        <button type="button" class="eye-btn" onclick="togglePassword('reg-password')" title="Mostrar contraseña">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- Indicador de fortaleza de contraseña -->
                    <div id="password-strength" style="margin-bottom: 1.2rem;">
                        <div style="font-size: 0.85rem; color: #666; margin-bottom: 0.5rem;">Requisitos:</div>
                        <div class="strength-item" id="strength-length">
                            <i class="fas fa-circle" style="color: #ccc; margin-right: 0.5rem;"></i>
                            <span>Mínimo 8 caracteres</span>
                        </div>
                        <div class="strength-item" id="strength-upper">
                            <i class="fas fa-circle" style="color: #ccc; margin-right: 0.5rem;"></i>
                            <span>Mayúsculas (A-Z)</span>
                        </div>
                        <div class="strength-item" id="strength-lower">
                            <i class="fas fa-circle" style="color: #ccc; margin-right: 0.5rem;"></i>
                            <span>Minúsculas (a-z)</span>
                        </div>
                        <div class="strength-item" id="strength-number">
                            <i class="fas fa-circle" style="color: #ccc; margin-right: 0.5rem;"></i>
                            <span>Números (0-9)</span>
                        </div>
                        <div class="strength-item" id="strength-special">
                            <i class="fas fa-circle" style="color: #ccc; margin-right: 0.5rem;"></i>
                            <span>Caracteres especiales (!@#$%^&*)</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label><i class="fas fa-lock"></i> Confirmar contraseña</label>
                        <input id="confirm-password" class="form-control" type="password" name="password_confirm" placeholder="••••••••" required autocomplete="new-password">
                    </div>

                    <button class="btn-auth" type="submit" id="submit-btn" disabled><i class="fas fa-check"></i> Crear cuenta</button>
                </form>

                <div class="back-link">
                    <a href="index.php?controller=Auth&action=login"><i class="fas fa-arrow-left"></i> Volver a Iniciar Sesión</a>
                </div>

                <div class="footer-box">
                    <i class="fas fa-lock"></i> Contraseña mínimo 6 caracteres | <i class="fas fa-user"></i> Usuario único
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id){
            const el = document.getElementById(id);
            if(!el) return;
            el.type = el.type === 'password' ? 'text' : 'password';
        }

        function validarContraseña() {
            const password = document.getElementById('reg-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const submitBtn = document.getElementById('submit-btn');
            
            // Validaciones
            const checks = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*()_+\-=\[\]{};:'",.​<>?\/\\|`~]/.test(password)
            };

            // Actualizar indicadores
            actualizarIndicador('strength-length', checks.length);
            actualizarIndicador('strength-upper', checks.upper);
            actualizarIndicador('strength-lower', checks.lower);
            actualizarIndicador('strength-number', checks.number);
            actualizarIndicador('strength-special', checks.special);

            // Verificar si todas las condiciones se cumplen
            const todosCompletos = Object.values(checks).every(check => check === true);
            const coinciden = password === confirmPassword && password.length > 0;

            // Habilitar/deshabilitar botón
            submitBtn.disabled = !(todosCompletos && coinciden);
        }

        function actualizarIndicador(elementId, cumple) {
            const elemento = document.getElementById(elementId);
            if (!elemento) return;
            
            const icono = elemento.querySelector('i');
            elemento.classList.remove('completed', 'warning');
            
            if (cumple) {
                elemento.classList.add('completed');
                icono.className = 'fas fa-check-circle';
            } else {
                icono.className = 'fas fa-circle';
            }
        }

        // Validar cuando se escriba en confirmar contraseña
        document.getElementById('confirm-password').addEventListener('input', validarContraseña);

        // Inicializar
        validarContraseña();
    </script>
</body>
</html>
