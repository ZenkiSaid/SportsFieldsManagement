<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../app/views/layouts/favicon.php'; ?>
    <title>Canchas Premium - Reserva tu Cancha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/landinghome.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
             <img src="assets/img/minilogo.png" alt="Logo" class="mi-logo-img">
                <span>Patos Sport</span>
            </div>
            <div class="menu-toggle" id="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>  
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#canchas">Canchas</a></li>
                <li><a href="#noticias">Noticias</a></li>
                <li><a href="#agenda">Agenda</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="index.php?controller=Auth&action=login" class="btn-login">Iniciar Sesión</a></li>
                <li><a href="index.php?controller=Auth&action=register" class="btn-login">Registrarse</a></li>
            </ul>
        </div>
    </nav>

    <section class="hero" id="inicio">
        <div class="hero-content">
            <p class="hero-subtitle">¡Reserva tu cancha sintética!</p>
            <h1>Futbol en estado puro<br><span style="color: var(--primary)">Día y Noche</span></h1>
            <p>Disfruta de instalaciones profesionales, iluminación LED y el mejor ambiente deportivo. Organiza tu partido de fútbol 7 o fútbol 9 hoy mismo.</p>
            <a href="index.php?controller=Auth&action=register" class="btn-primary">Reservar Ahora <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="features">
        <h2 class="section-title">La Experiencia Premium</h2>
        <div class="features-grid">
            
            <div class="feature-card">
                <i class="fas fa-calendar-check"></i>
                <h3>Reserva Online</h3>
                <p>Olvídate de las llamadas. Sistema de reservas automático 24/7 desde tu celular.</p>
            </div>

            <div class="feature-card">
                <i class="fas fa-tshirt"></i>
                <h3>Equipamiento Completo</h3>
                <p>Incluimos balones profesionales y chalecos limpios totalmente gratis con tu reserva. ¡Solo preocúpate por jugar!</p>
            </div>

            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Instalaciones Top</h3>
                <p>Lo mejor para ti . Nuestras canchas sintéticas están siempre en perfecto estado para que disfrutes el juego.</p>
            </div>

            <div class="feature-card">
                <i class="fas fa-utensils"></i>
                <h3>Snack Bar & Bebidas</h3>
                <p>Contamos con una amplia variedad de snacks, bebidas y comida para recuperar energías después del partido.</p>
            </div>

        </div>
    </section>

    <section class="canchas-gallery" id="canchas">
        <p class="section-subtitle">Conoce nuestras instalaciones</p>
        <h2 class="section-title dark">NUESTRAS CANCHAS</h2>
        
        <div class="slider-container">
            
            <?php if (!empty($sliderCanchas)): ?>
                <?php foreach($sliderCanchas as $foto): ?>
                    <div class="mySlides fade">
                        <img src="uploads/home_canchas/<?= $foto['hc_imagen'] ?>" alt="Cancha Patos Dinámica" style="width:100%">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="mySlides fade" style="display: block;">
                    <img src="assets/img/home/cancha1.png" alt="Cancha Patos Foto Default" style="width:100%">
                </div>
            <?php endif; ?>
            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        

        <div class="cancha-info-detalle">
            <h3>Cancha Patos</h3>
            <p>
                Diseñada para el alto rendimiento. Nuestra cancha principal ofrece una experiencia de juego superior gracias a su 
                <strong>césped sintético</strong>. 
                Garantizamos un rebote natural, menor impacto físico y un entorno seguro para disfrutar del mejor fútbol.
            </p>
            
            <div class="features-list">
                <span><i class="fas fa-lightbulb"></i> Iluminación LED Antideslumbrante</span>
                <span><i class="fas fa-cloud-rain"></i> Drenaje Pluvial Avanzado</span>
                <span><i class="fas fa-ruler-combined"></i> Medidas Reglamentarias (F7 / F9)</span>
                <span><i class="fas fa-parking"></i> Parqueadero Privado</span>
            </div>
        </div>
    </section>

   <section id="noticias" style="padding: 5rem 0; background-color: #111; border-top: 1px solid #333;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 class="section-title" style="color: white; text-transform: uppercase; font-size: 2.5rem; margin-bottom: 10px;">
                    Noticias <span style="color: var(--primary);">Pato Sport</span>
                </h2>
                <p style="color: #888;">Entérate de nuestros próximos eventos y promociones.</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
                
                <?php if (isset($noticias) && !empty($noticias)): ?>
                    <?php foreach ($noticias as $noti): ?>
                        <div class="news-card" style="background: #1a1a1a; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.5); transition: transform 0.3s; border: 1px solid #333;">
                            
                            <div style="height: 200px; overflow: hidden; position: relative;">
                                <?php if(!empty($noti['not_imagen'])): ?>
                                    <img src="uploads/noticias/<?= $noti['not_imagen'] ?>" alt="Noticia" style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;">
                                <?php else: ?>
                                    <div style="width: 100%; height: 100%; background: #333; display: flex; align-items: center; justify-content: center; color: #555;">
                                        <i class="fas fa-image fa-3x"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <div style="position: absolute; top: 15px; left: 15px; background: var(--primary); color: #000; padding: 5px 12px; border-radius: 5px; font-weight: bold; font-size: 0.85rem; box-shadow: 0 2px 5px rgba(0,0,0,0.3);">
                                    <i class="far fa-calendar-alt"></i> <?= date('d M', strtotime($noti['not_fecha_inicio'])) ?>
                                </div>
                            </div>

                            <div style="padding: 20px;">
                                <p style="color: #ddd; font-size: 1rem; line-height: 1.5; margin-bottom: 20px; min-height: 60px;">
                                    <?= htmlspecialchars($noti['not_descripcion']) ?>
                                </p>

                                <div style="border-top: 1px solid #333; padding-top: 15px; font-size: 0.9rem; color: #888;">
                                    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                        <span><i class="fas fa-play text-success" style="color: #28a745; margin-right: 5px;"></i> Inicia:</span>
                                        <span style="color: #fff;"><?= date('d/m/Y', strtotime($noti['not_fecha_inicio'])) ?></span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between;">
                                        <span><i class="fas fa-stop text-danger" style="color: #dc3545; margin-right: 5px;"></i> Finaliza:</span>
                                        <span style="color: #fff;"><?= date('d/m/Y', strtotime($noti['not_fecha_fin'])) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 50px; background: #1a1a1a; border-radius: 10px; color: #666;">
                        <i class="far fa-newspaper fa-3x" style="margin-bottom: 15px; opacity: 0.5;"></i>
                        <p>No hay noticias publicadas por el momento.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <section id="agenda" style="background: #0a0a0acf; padding: 6rem 2rem; border-top: 1px solid #333;">
        <div class="container" style="max-width: 1000px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.5rem; color: white; text-transform: uppercase; font-weight: 900; margin-bottom: 0.5rem;">
                    Reserva de <span style="color: var(--primary);">Canchas</span>
                </h2>
                <p style="color: #888;">Consulta los horarios ocupados. Solo se muestran las reservas confirmadas.</p>
            </div>

            <div style="background: #151515; border-radius: 15px; padding: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.5); overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; min-width: 600px; color: #fff;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--primary);">
                            <th style="text-align: left; padding: 1.2rem; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Fecha</th>
                            <th style="text-align: left; padding: 1.2rem; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Horario</th>
                            <th style="text-align: left; padding: 1.2rem; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Cancha</th>
                            <th style="text-align: right; padding: 1.2rem; color: var(--primary); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($agenda) && !empty($agenda)): ?>
                            <?php foreach ($agenda as $partido): ?>
                                <?php 
                                    $fechaObj = new DateTime($partido['alq_fecha']);
                                    $horaIni = substr($partido['alq_hora_ini'], 0, 5);
                                    $horaFin = substr($partido['alq_hora_fin'], 0, 5);
                                ?>
                                <tr style="border-bottom: 1px solid #333;">
                                    <td data-label="Fecha" style="padding: 1.2rem; font-weight: 600;">
                                        <i class="far fa-calendar-alt" style="color: #666; margin-right: 8px;"></i>
                                        <?= $fechaObj->format('d/m/Y') ?>
                                    </td>
                                    <td data-label="Horario" style="padding: 1.2rem;">
                                        <span style="background: #222; padding: 5px 12px; border-radius: 4px; font-size: 0.9rem; border: 1px solid #333;">
                                            <?= $horaIni ?> - <?= $horaFin ?>
                                        </span>
                                    </td>
                                    <td data-label="Cancha" style="padding: 1.2rem; color: #ccc;">
                                        <?= htmlspecialchars($partido['can_nombre']) ?>
                                    </td>
                                    <td data-label="Estado" style="padding: 1.2rem; text-align: right;">
                                        <span style="color: #000; background: var(--primary); font-weight: 800; font-size: 0.75rem; padding: 4px 12px; border-radius: 20px; text-transform: uppercase;">
                                            OCUPADO
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" style="padding: 4rem; text-align: center; color: #666;">
                                    <i class="far fa-calendar-check" style="font-size: 3rem; margin-bottom: 1rem; color: #333;"></i>
                                    <p>No hay reservas aprobadas próximas.</p>
                                    <p style="color: var(--primary);">¡La cancha está libre para ti!</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

 <footer class="footer" id="contacto">
        <div class="footer-container">
            <div class="footer-col">
                <h3>Canchas Premium</h3>
                <p class="owner-tag">
                    <i class="fas fa-user-tie"></i> Prop. Milton Montaluisa
                </p>
                <p class="footer-desc">
                    El mejor espacio deportivo para disfrutar con amigos y familia en el Valle.
                </p>
            </div>
            <div class="footer-col">
                <h4>Contacto y Ubicación</h4>
                <div class="contact-row">
                    <i class="fas fa-phone-alt"></i>
                    <span>098 457 7224</span>
                </div>
                <div class="contact-btn-area">
                    <a href="https://maps.app.goo.gl/2dPURPXLbCVnn1de7" target="_blank" class="map-btn">
                        <i class="fas fa-map-marked-alt"></i> Ver Ubicación en Maps
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Síguenos</h4>
                <div class="social-links">
                    <a href="https://vm.tiktok.com/ZMDkhc2pL/" target="_blank" class="social-btn tiktok" title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/593984577224" target="_blank" class="social-btn whatsapp" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="#" class="social-btn facebook" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-btn instagram" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2026 Canchas Premium. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slides[slideIndex-1].style.display = "block";  
        }
        // Script para el Menú Responsivo
        const menuToggle = document.getElementById('mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        if(menuToggle) {
            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }                    

    </script>

   
</body>
</html>