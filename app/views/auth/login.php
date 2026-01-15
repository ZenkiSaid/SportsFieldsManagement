<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Canchas Premium</title>
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

        .auth-title { 
            text-align: center; 
            font-size: 1.8rem; 
            font-weight: 900; 
            margin-bottom: 0.3rem; 
            color: #111;
        }

        .auth-sub { 
            text-align: center; 
            color: #999; 
            margin-bottom: 2rem; 
            font-size: 0.95rem; 
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
            margin-top: 0.8rem; 
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
                <h1>Iniciar Sesión</h1>
                <p>Accede a tu cuenta de Canchas Premium</p>
            </div>

            <div class="auth-content">
                    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'registrosuccess'): ?>
                        <div style="background: #d5f4e6; border-left: 4px solid var(--primary); padding: 1rem; border-radius: 8px; margin-bottom: 1rem; color: #27ae60; text-align: center;">
                            <i class="fas fa-check-circle"></i> <strong>Cuenta creada exitosamente.</strong><br>
                            <span style="font-size: 0.9rem;">Ahora puedes iniciar sesión</span>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'error'): ?>
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> Usuario o contraseña incorrectos</div>
                    <?php endif; ?>
                    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'required'): ?>
                        <div class="error-msg"><i class="fas fa-exclamation-circle"></i> Por favor completa todos los campos</div>
                    <?php endif; ?>
                    
                    <form action="index.php?controller=Auth&action=login" method="POST">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> Usuario o Correo</label>
                            <input class="form-control" type="text" name="nombre_usu" placeholder="Tu usuario o correo electrónico" required autocomplete="username">
                        </div>
                        <div class="form-group input-wrap">
                            <label><i class="fas fa-lock"></i> Contraseña</label>
                            <input id="login-password" class="form-control" type="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                            <button type="button" class="eye-btn" onclick="togglePassword('login-password')" title="Mostrar contraseña">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <button class="btn-auth" type="submit"><i class="fas fa-sign-in-alt"></i> Ingresar a mi Espacio</button>
                    </form>
                    <div class="switch-link">¿No tienes cuenta? <a href="index.php?controller=Auth&action=register">Regístrate aquí</a></div>
                    <div class="footer-box">
                        <i class="fas fa-shield-alt"></i> Tu información está segura y protegida
                    </div>
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
        
        // Tab switching
        document.getElementById('tab-login').addEventListener('click', function(){
            document.getElementById('panel-login').style.display='block';
            document.getElementById('panel-register').style.display='none';
            this.classList.add('active');
            document.getElementById('tab-register').classList.remove('active');
            window.scrollTo(0, 0);
        });
        
        document.getElementById('tab-register').addEventListener('click', function(){
            document.getElementById('panel-login').style.display='none';
            document.getElementById('panel-register').style.display='block';
            this.classList.add('active');
            document.getElementById('tab-login').classList.remove('active');
            window.scrollTo(0, 0);
        });
    </script>
</body>
</html>
