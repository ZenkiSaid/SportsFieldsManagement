<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email - Canchas Premium</title>
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
            max-width: 500px; 
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
            font-size: 1.5rem; 
            font-weight: 900; 
            margin-bottom: 1rem; 
            color: #111;
        }

        .auth-sub { 
            text-align: center; 
            color: #666; 
            margin-bottom: 2rem; 
            font-size: 0.95rem; 
        }

        .verification-icon {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .verification-icon i {
            font-size: 3rem;
            color: var(--primary);
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
            text-align: center;
            letter-spacing: 2px;
            font-weight: 600;
        }

        .form-control:focus { 
            border-color: var(--primary); 
            box-shadow: 0 0 0 3px rgba(0, 255, 136, 0.1);
        }

        .btn-auth { 
            width: 100%; 
            padding: 1rem; 
            background: var(--primary); 
            color: #000; 
            border: none; 
            border-radius: 10px; 
            font-weight: 900; 
            cursor: pointer; 
            font-size: 0.95rem; 
            transition: all 0.3s;
            text-transform: uppercase;
        }

        .btn-auth:hover:not(:disabled) { 
            background: #00e08a;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 255, 136, 0.2);
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

        .back-link {
            text-align: center;
            margin-top: 1rem;
        }

        .back-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .home-btn {
            display: inline-block;
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(0, 0, 0, 0.7);
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

        .timer {
            text-align: center;
            color: #f39c12;
            font-weight: 600;
            margin-top: 1rem;
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
                <h1>Verificar Email</h1>
                <p>Ingresa el código que enviamos</p>
            </div>

            <div class="auth-content">
                <div class="verification-icon">
                    <i class="fas fa-envelope-open"></i>
                </div>

                <p style="text-align: center; color: #666; margin-bottom: 2rem;">
                    Hemos enviado un código de verificación a tu correo electrónico. 
                    Por favor ingresa el código de 8 caracteres.
                </p>

                <!-- DEBUGGING: Mostrar código en desarrollo (ELIMINAR EN PRODUCCIÓN) -->
                <?php if(isset($_SESSION['codigo_verificacion'])): ?>
                    <div style="background: #fffacd; border-left: 4px solid #f39c12; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center;">
                        <p style="margin: 0; color: #f39c12; font-weight: 600;">🔧 DESARROLLO - Código de Prueba:</p>
                        <p style="margin: 0.5rem 0 0 0; color: #333; font-size: 1.2rem; font-weight: bold; font-family: monospace; letter-spacing: 3px;">
                            <?php echo $_SESSION['codigo_verificacion']; ?>
                        </p>
                        <p style="margin: 0.5rem 0 0 0; color: #999; font-size: 0.8rem;">
                            (Copia y pega este código arriba)
                        </p>
                    </div>
                <?php endif; ?>

                <p style="text-align: center; color: #666; margin-bottom: 2rem;">

                <?php if(isset($_GET['msg']) && $_GET['msg'] == 'codigoincorrecto'): ?>
                    <div class="error-msg"><i class="fas fa-exclamation-circle"></i> Código incorrecto o expirado</div>
                <?php endif; ?>

                <form action="index.php?controller=Auth&action=verificaremail" method="POST">
                    <div class="form-group">
                        <label><i class="fas fa-key"></i> Código de Verificación</label>
                        <input class="form-control" type="text" name="codigo" placeholder="XXXXXXXX" required maxlength="8" autocomplete="off">
                        <small style="display: block; margin-top: 0.5rem; color: #999; text-align: center;">Revisa tu email si no ves el código</small>
                    </div>

                    <button class="btn-auth" type="submit"><i class="fas fa-check"></i> Verificar Código</button>
                </form>

                <div class="back-link">
                    <a href="index.php?controller=Auth&action=register"><i class="fas fa-arrow-left"></i> Volver al registro</a>
                </div>

                <div class="footer-box">
                    <i class="fas fa-info-circle"></i> El código expira en 10 minutos
                </div>
            </div>
        </div>
    </div>

    <script>
        // Focus en el input de código
        document.addEventListener('DOMContentLoaded', function() {
            const codigoInput = document.querySelector('input[name="codigo"]');
            if (codigoInput) {
                codigoInput.focus();
                // Solo permitir caracteres alfanuméricos
                codigoInput.addEventListener('input', function() {
                    this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
                });
            }
        });
    </script>
</body>
</html>
