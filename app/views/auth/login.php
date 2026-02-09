<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Patos Sport</title>
    <?php include '../app/views/layouts/favicon.php'; ?>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* --- ESTILOS VISUALES (Igual que Registro) --- */
        :root {
            --primary: #00c853;
            --primary-hover: #009624;
            /* Overlay al 0.3 para que el fondo se vea CLARO como pediste */
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
            background: rgba(255, 255, 255, 0.15);
            padding: 10px 20px;
            border-radius: 30px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.3s;
            z-index: 10;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .btn-back:hover { background: var(--primary); color: #fff; border-color: var(--primary); }

        /* Tarjeta */
        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 420px; /* Un poco más angosta que registro */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            margin: 20px;
            position: relative;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Encabezado */
        .card-header {
            background: linear-gradient(135deg, #00c853 0%, #009624 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        .card-header h2 { margin: 0; font-size: 1.8rem; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; }
        .card-header p { margin: 5px 0 0; font-size: 0.9rem; opacity: 0.9; }
        
        /* LOGO PEQUEÑO */
        .logo-small { height: 60px; width: auto; margin-top: 15px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2)); }

        .card-body { padding: 30px; }

        /* Inputs */
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 0.9rem; font-weight: 600; color: #555; margin-bottom: 8px; }
        .input-wrapper { position: relative; }
        
        .form-input {
            width: 100%;
            padding: 14px 45px 14px 45px; /* Espacio para iconos izq y der */
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 0.95rem;
            background: #f8f9fa;
            box-sizing: border-box;
            transition: 0.3s;
        }
        .form-input:focus { border-color: var(--primary); background: #fff; outline: none; box-shadow: 0 0 0 4px rgba(0, 200, 83, 0.1); }
        
        /* Iconos */
        .input-icon { position: absolute; top: 50%; left: 15px; transform: translateY(-50%); color: #aaa; font-size: 1.1rem; }
        
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #aaa;
            cursor: pointer;
            transition: color 0.3s;
        }
        .toggle-password:hover { color: var(--primary); }

        /* Botón Entrar */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
            box-shadow: 0 5px 15px rgba(0, 200, 83, 0.3);
        }
        .btn-submit:hover { background: var(--primary-hover); transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0, 200, 83, 0.4); }

        /* Footer */
        .login-footer { text-align: center; margin-top: 25px; font-size: 0.9rem; color: #666; }
        .login-footer a { color: var(--primary); text-decoration: none; font-weight: 700; }
        .login-footer a:hover { text-decoration: underline; }

        /* Alertas */
        .alert { padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; text-align: center; border: 1px solid transparent; display: flex; align-items: center; justify-content: center; gap: 10px; }
        .alert-error { background: #ffebee; color: #c62828; border-color: #ffcdd2; }
        .alert-success { background: #e8f5e9; color: #2e7d32; border-color: #c8e6c9; }

        /* Responsive */
        @media (max-width: 480px) {
            .login-card { margin: 15px; border-radius: 20px; }
            .card-header h2 { font-size: 1.5rem; }
        }
    </style>
</head>
<body>

    <a href="index.php?controller=Home&action=index" class="btn-back">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="login-card">
        <div class="card-header">
            <h2>Bienvenido</h2>
            <img src="assets/img/minilogo.png" alt="Logo" class="logo-small">
            <p>Ingresa para reservar tu cancha</p>
        </div>

        <div class="card-body">
            
            <?php if(isset($_GET['msg'])): ?>
                <?php if($_GET['msg'] == 'registrosuccess'): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> ¡Cuenta creada! Ya puedes iniciar sesión.
                    </div>
                <?php elseif($_GET['msg'] == 'error'): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-times-circle"></i> Usuario o contraseña incorrectos.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="index.php?controller=Auth&action=login" method="POST">
                
                <div class="form-group">
                    <label class="form-label">Usuario</label>
                    <div class="input-wrapper">
                        <input type="text" name="nombre_usu" class="form-input" placeholder="Tu usuario" required autocomplete="username">
                        <i class="fas fa-user input-icon"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Contraseña</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" id="password" class="form-input" placeholder="••••••••" required autocomplete="current-password">
                        <i class="fas fa-lock input-icon"></i>
                        <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Iniciar Sesión <i class="fas fa-sign-in-alt ml-2"></i>
                </button>

                <div class="login-footer">
                    ¿No tienes cuenta? <a href="index.php?controller=Auth&action=register">Regístrate aquí</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.querySelector('.toggle-password');
            
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
    </script>

</body>
</html>