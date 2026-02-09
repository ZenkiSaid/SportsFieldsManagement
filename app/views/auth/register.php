<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta | Patos Sport</title>
    <?php include '../app/views/layouts/favicon.php'; ?>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- ESTILOS VISUALES (DISEÑO PROFESIONAL) --- */
        :root {
            --primary: #00c853;
            --primary-hover: #009624;
            --dark-overlay: rgba(0, 0, 0, 0.3);
            --error: #e74c3c;
            --success: #2ecc71;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Fondo de Estadio */
            background: linear-gradient(var(--dark-overlay), var(--dark-overlay)),
                        url('assets/img/home/homval.png') no-repeat center center/cover;
            background-attachment: fixed;
        }

        /* Botón Volver */
        .btn-back {
            position: absolute;
            top: 25px;
            left: 25px;
            color: white;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s;
            z-index: 10;
            font-size: 0.9rem;
        }
        .btn-back:hover { background: var(--primary); color: #000; border-color: var(--primary); }

        /* Tarjeta */
        .register-card {
            background: #ffffff;
            width: 100%;
            max-width: 460px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6);
            margin: 20px;
            position: relative;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Encabezado */
        .card-header {
            background: linear-gradient(135deg, #00c853 0%, #009624 100%);
            padding: 25px;
            text-align: center;
            color: white;
        }
        .card-header h2 { margin: 0; font-size: 1.6rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
        .logo-small { height: 50px; width: auto; margin-top: 10px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)); }

        .card-body { padding: 30px; }

        /* Inputs */
        .form-group { margin-bottom: 18px; }
        .form-label { display: block; font-size: 0.85rem; font-weight: 600; color: #555; margin-bottom: 5px; }
        .input-wrapper { position: relative; }
        
        .form-input {
            width: 100%;
            /* Ajustamos padding derecho para que el texto no choque con el ojo */
            padding: 12px 40px 12px 40px; 
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            background: #f8f9fa;
            box-sizing: border-box;
            transition: 0.3s;
        }
        .form-input:focus { border-color: var(--primary); background: #fff; outline: none; box-shadow: 0 0 0 3px rgba(0, 200, 83, 0.1); }
        
        /* Icono Izquierdo (Candado/Usuario) */
        .input-icon { position: absolute; top: 50%; left: 12px; transform: translateY(-50%); color: #aaa; }

        /* NUEVO: Icono Derecho (Ojo) */
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
            z-index: 5;
            transition: color 0.3s;
        }
        .toggle-password:hover { color: var(--primary); }

        /* Botón Submit */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #ccc;
            color: #666;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: not-allowed;
            transition: 0.3s;
            margin-top: 15px;
            text-transform: uppercase;
        }

        .btn-submit.active {
            background: var(--primary);
            color: white;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 200, 83, 0.3);
        }
        .btn-submit.active:hover { background: var(--primary-hover); transform: translateY(-2px); }

        /* Requisitos */
        .password-requirements {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }

        .req-item {
            font-size: 0.75rem;
            color: #777;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.3s;
        }
        
        .req-item i { font-size: 0.6rem; color: #ccc; transition: all 0.3s; }
        .req-item.valid { color: var(--success); font-weight: 600; }
        .req-item.valid i { color: var(--success); font-size: 0.8rem; }
        .req-item.invalid { color: var(--error); }
        .req-item.invalid i { color: var(--error); }

        .login-footer { text-align: center; margin-top: 25px; font-size: 0.9rem; color: #666; }
        .login-footer a { color: var(--primary); text-decoration: none; font-weight: 700; }
        .login-footer a:hover { text-decoration: underline; }

        .alert { padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 0.9rem; text-align: center; border: 1px solid transparent; }
        .alert-error { background: #ffebee; color: #c62828; border-color: #ffcdd2; }
    </style>
</head>
<body>

    <a href="index.php" class="btn-back"><i class="fas fa-arrow-left"></i> Inicio</a>

    <div class="register-card">
        <div class="card-header">
            <h2>Crear Cuenta</h2>
            <img src="assets/img/minilogo.png" alt="Logo" class="logo-small">
        </div>

        <div class="card-body">
            
            <?php if(isset($_GET['msg']) && $_GET['msg'] == 'exists'): ?>
                <div class="alert alert-error"><i class="fas fa-exclamation-triangle"></i> El usuario o correo ya existe.</div>
            <?php endif; ?>

            <form action="index.php?controller=Auth&action=register" method="POST" id="registerForm">
                
                <div class="form-group">
                    <label class="form-label">Usuario</label>
                    <div class="input-wrapper">
                        <input type="text" name="nombre" class="form-input" placeholder="Ej. JuanPerez" required>
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <input type="email" name="correo" class="form-input" placeholder="tu@email.com" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" class="form-input" placeholder="Tu contraseña segura" required>
                        <i class="fas fa-lock input-icon"></i>
                        <i class="fas fa-eye toggle-password" onclick="toggleVisibility('password', this)"></i>
                    </div>
                    
                    <ul class="password-requirements">
                        <li class="req-item" id="req-len"><i class="fas fa-circle"></i> 8+ Caracteres</li>
                        <li class="req-item" id="req-upper"><i class="fas fa-circle"></i> Mayúscula (A-Z)</li>
                        <li class="req-item" id="req-lower"><i class="fas fa-circle"></i> Minúscula (a-z)</li>
                        <li class="req-item" id="req-num"><i class="fas fa-circle"></i> Número (0-9)</li>
                        <li class="req-item" id="req-spec"><i class="fas fa-circle"></i> Símbolo (!@#$)</li>
                    </ul>
                </div>

                <div class="form-group">
                    <label class="form-label">Confirmar Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-input" placeholder="Repite tu contraseña" required>
                        <i class="fas fa-check-circle input-icon"></i>
                        <i class="fas fa-eye toggle-password" onclick="toggleVisibility('confirm_password', this)"></i>
                    </div>
                    <small id="match-msg" style="display:none; color: #e74c3c; font-size: 0.75rem; margin-top: 5px;">
                        <i class="fas fa-times"></i> Las contraseñas no coinciden
                    </small>
                </div>

                <button type="submit" class="btn-submit" id="submit-btn" disabled>
                    Registrarme
                </button>

                <div class="login-footer">
                    ¿Ya tienes cuenta? <a href="index.php?controller=Auth&action=login">Inicia Sesión</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm_password');
        const submitBtn = document.getElementById('submit-btn');
        const matchMsg = document.getElementById('match-msg');

        const reqs = {
            len: document.getElementById('req-len'),
            upper: document.getElementById('req-upper'),
            lower: document.getElementById('req-lower'),
            num: document.getElementById('req-num'),
            spec: document.getElementById('req-spec')
        };

        // --- FUNCIÓN PARA MOSTRAR/OCULTAR CONTRASEÑA ---
        function toggleVisibility(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // --- LÓGICA DE VALIDACIÓN ---
        function validar() {
            const val = passwordInput.value;
            const confVal = confirmInput.value;

            // 1. Validar Reglas
            const checks = {
                len: val.length >= 8,
                upper: /[A-Z]/.test(val),
                lower: /[a-z]/.test(val),
                num: /[0-9]/.test(val),
                spec: /[!@#$%^&*(),.?":{}|<>]/.test(val)
            };

            // 2. Actualizar UI
            updateUI(reqs.len, checks.len);
            updateUI(reqs.upper, checks.upper);
            updateUI(reqs.lower, checks.lower);
            updateUI(reqs.num, checks.num);
            updateUI(reqs.spec, checks.spec);

            // 3. Verificar Coincidencia
            const match = (val === confVal) && (val.length > 0);
            
            if(confVal.length > 0 && !match) {
                matchMsg.style.display = 'block';
            } else {
                matchMsg.style.display = 'none';
            }

            // 4. Bloquear/Desbloquear Botón
            const allValid = Object.values(checks).every(Boolean);
            
            if (allValid && match) {
                submitBtn.disabled = false;
                submitBtn.classList.add('active');
                submitBtn.innerHTML = 'Registrarme <i class="fas fa-check ml-2"></i>';
            } else {
                submitBtn.disabled = true;
                submitBtn.classList.remove('active');
                submitBtn.innerHTML = 'Complete los requisitos';
            }
        }

        function updateUI(element, isValid) {
            const icon = element.querySelector('i');
            if (isValid) {
                element.classList.add('valid');
                element.classList.remove('invalid');
                icon.className = 'fas fa-check-circle';
            } else {
                element.classList.remove('valid');
                icon.className = 'fas fa-circle';
            }
        }

        passwordInput.addEventListener('keyup', validar);
        confirmInput.addEventListener('keyup', validar);
    </script>

</body>
</html>