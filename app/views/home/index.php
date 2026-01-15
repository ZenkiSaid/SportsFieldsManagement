<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canchas Premium - Reserva tu Cancha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/landinghome.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-icon"></div>
                <span>Canchas Premium</span>
            </div>
            <ul class="nav-links">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#canchas">Canchas</a></li>
                <li><a href="#campeonatos">Campeonatos</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="index.php?controller=Auth&action=login" class="btn-login">Iniciar Sesión</a></li>
                <li><a href="index.php?controller=Auth&action=register" class="btn-login">Registrarse</a></li>
            </ul>
        </div>
    </nav>

    <section class="hero" id="inicio">
        <div class="hero-content">
            <p class="hero-subtitle">¡Reserva tu cancha sintética en el Valle!</p>
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
                <i class="fas fa-trophy"></i>
                <h3>Ligas Competitivas</h3>
                <p>Organizamos los mejores torneos con premios en efectivo y estadísticas en vivo.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-shield-alt"></i>
                <h3>Instalaciones Top</h3>
                <p>Césped sintético FIFA Quality, chalecos limpios y balones profesionales.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-video"></i>
                <h3>Partidos Grabados</h3>
                <p>Revive tus mejores jugadas con nuestro sistema de cámaras (Servicio opcional).</p>
            </div>
        </div>
    </section>

    <section class="canchas-gallery" id="canchas">
        <p class="section-subtitle">Conoce nuestras instalaciones</p>
        <h2 class="section-title dark">NUESTRAS CANCHAS</h2>
        
        <div class="gallery-list">
            
            <div class="cancha-row">
                <div class="cancha-img-wrapper">
                    <span class="cancha-label">La Favorita</span>
                    <img src="assets/img/home/cancha1.jpg" alt="Cancha Estadio">
                </div>
                <div class="cancha-info-wrapper">
                    <h3 class="cancha-title">Cancha A - Estadio</h3>
                    <p class="cancha-desc">
                        Nuestra cancha principal diseñada para fútbol 9. Cuenta con graderías para 200 personas y es el escenario principal de nuestras finales de campeonato. El césped es de última generación (60mm).
                    </p>
                    <div class="cancha-specs">
                        <div class="spec-item"><i class="fas fa-ruler-combined"></i> Medidas: 45m x 25m</div>
                        <div class="spec-item"><i class="fas fa-users"></i> Capacidad: 9 vs 9</div>
                        <div class="spec-item"><i class="fas fa-lightbulb"></i> Iluminación: LED 500 Lux</div>
                        <div class="spec-item"><i class="fas fa-shoe-prints"></i> Césped: Monofilamento</div>
                    </div>
                    <a href="index.php?controller=Auth&action=register" class="btn-reserve-small">Ver Disponibilidad</a>
                </div>
            </div>

            <div class="cancha-row">
                <div class="cancha-img-wrapper">
                    <span class="cancha-label">Entrenamiento</span>
                    <img src="assets/img/home/cancha2.jpg" alt="Cancha Técnica">
                </div>
                <div class="cancha-info-wrapper">
                    <h3 class="cancha-title">Cancha B - Técnica</h3>
                    <p class="cancha-desc">
                        Ideal para partidos rápidos de 7 vs 7. Es la preferida para entrenamientos tácticos y partidos entre amigos entre semana. Mantiene la misma calidad de superficie que la cancha principal.
                    </p>
                    <div class="cancha-specs">
                        <div class="spec-item"><i class="fas fa-ruler-combined"></i> Medidas: 35m x 18m</div>
                        <div class="spec-item"><i class="fas fa-users"></i> Capacidad: 7 vs 7</div>
                        <div class="spec-item"><i class="fas fa-stopwatch"></i> Marcador Digital</div>
                        <div class="spec-item"><i class="fas fa-wifi"></i> Zona WiFi</div>
                    </div>
                    <a href="index.php?controller=Auth&action=register" class="btn-reserve-small">Ver Disponibilidad</a>
                </div>
            </div>

            <div class="cancha-row">
                <div class="cancha-img-wrapper">
                    <span class="cancha-label">Indoor / Lluvia</span>
                    <img src="assets/img/home/cancha3.jpg" alt="Cancha Techada">
                </div>
                <div class="cancha-info-wrapper">
                    <h3 class="cancha-title">Cancha C - Techada</h3>
                    <p class="cancha-desc">
                        No dejes que la lluvia suspenda tu partido. Nuestra cancha techada ofrece protección total contra el clima, con ventilación natural para evitar el exceso de calor. Perfecta para fútbol rápido 5 vs 5.
                    </p>
                    <div class="cancha-specs">
                        <div class="spec-item"><i class="fas fa-ruler-combined"></i> Medidas: 28m x 15m</div>
                        <div class="spec-item"><i class="fas fa-users"></i> Capacidad: 5 vs 5</div>
                        <div class="spec-item"><i class="fas fa-umbrella"></i> 100% Cubierta</div>
                        <div class="spec-item"><i class="fas fa-music"></i> Audio Integrado</div>
                    </div>
                    <a href="index.php?controller=Auth&action=register" class="btn-reserve-small">Ver Disponibilidad</a>
                </div>
            </div>

        </div>
    </section>

    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <h2>+500</h2>
                <p>Partidos Mensuales</p>
            </div>
            <div class="stat-item">
                <h2>3</h2>
                <p>Canchas Pro</p>
            </div>
            <div class="stat-item">
                <h2>+50</h2>
                <p>Torneos Realizados</p>
            </div>
            <div class="stat-item">
                <h2>100%</h2>
                <p>Seguridad</p>
            </div>
        </div>
    </section>

    <section class="campeonatos" id="campeonatos">
        <h2 class="section-title">Torneos en Curso</h2>
        <div class="campeonatos-grid">
            <div class="campeonato-card">
                <div class="campeonato-header">
                    <i class="fas fa-trophy"></i>
                    <h3>Liga de Verano 2026</h3>
                    <p>Fase de Grupos</p>
                </div>
                <div class="campeonato-body">
                    <h4><i class="fas fa-list-ol"></i> Tabla General</h4>
                    <ul class="team-list">
                        <li><span>1.</span> Águilas FC <span style="margin-left:auto; color:white">13 pts</span></li>
                        <li><span>2.</span> Tigres United <span style="margin-left:auto; color:white">11 pts</span></li>
                        <li><span>3.</span> Leones FC <span style="margin-left:auto; color:white">10 pts</span></li>
                        <li><span>4.</span> Dragones <span style="margin-left:auto; color:white">8 pts</span></li>
                    </ul>
                </div>
            </div>

            <div class="campeonato-card">
                <div class="campeonato-header" style="background: linear-gradient(135deg, #0d2818 0%, #000 100%);">
                    <i class="fas fa-bolt"></i>
                    <h3>Copa Relámpago</h3>
                    <p>Inscripciones Abiertas</p>
                </div>
                <div class="campeonato-body">
                    <h4><i class="fas fa-info-circle"></i> Detalles</h4>
                    <ul class="team-list">
                        <li><i class="fas fa-calendar"></i> Inicio: 15 de Febrero</li>
                        <li><i class="fas fa-users"></i> Cupos: 4 equipos restantes</li>
                        <li><i class="fas fa-dollar-sign"></i> Premio: $1000 USD</li>
                        <li><i class="fas fa-clock"></i> Sábados 8:00 PM</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="contacto">
        <div class="footer-content">
            <h3>Canchas Premium</h3>
            <p>Tu pasión por el fútbol merece el mejor escenario.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <p style="margin-top: 3rem; font-size: 0.8rem; opacity: 0.5;">© 2026 Canchas Premium. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>