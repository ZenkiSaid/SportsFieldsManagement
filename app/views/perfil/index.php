<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Perfil | Canchas Premium</title>

  <?php include '../app/views/layouts/favicon.php'; ?>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/admin-responsive.css">

  <style>
    /* Ocultar Scrollbar */
    .main-sidebar ::-webkit-scrollbar { width: 0px; background: transparent; }
    .main-sidebar { scrollbar-width: none; -ms-overflow-style: none; }

    /* Diseño Sport */
    .bg-gradient-sport {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%) !important;
        color: white;
    }
    
    .nav-link.active-sport {
        background: linear-gradient(90deg, #28a745 0%, #20c997 100%) !important;
        color: white !important;
        box-shadow: 0 4px 6px rgba(40, 167, 69, 0.4);
        border: none;
    }

    .nav-pills .nav-link:not(.active):hover {
        background-color: rgba(255,255,255,0.05);
        color: #28a745 !important;
        transform: translateX(5px);
        transition: 0.2s;
    }

    .brand-link {
        border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        background-color: #1a1c20 !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0 shadow-sm">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link font-weight-bold text-dark">Mi Perfil</span>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-danger font-weight-bold" href="index.php?controller=Auth&action=logout">
          <i class="fas fa-sign-out-alt mr-1"></i> Salir
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #212529;">
    
    <a href="index.php?controller=Dashboard&action=index" class="brand-link text-center">
      <span class="brand-text font-weight-bold text-white text-uppercase" style="letter-spacing: 1px;">
        <i class="fas fa-futbol text-success mr-2"></i> Pato Sport
      </span>
    </a>

    <div class="sidebar">
      
      <div class="user-panel mt-4 pb-4 mb-4 d-flex justify-content-center border-bottom-0">
        <div class="image text-center w-100">
           <img src="assets/img/minilogo.png" class="img-fluid" style="max-height: 80px;">
           <div class="mt-2 text-white font-weight-bold"><?= explode(' ', $_SESSION['usuario_nombre'] ?? 'Usuario')[0] ?></div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
           
           <li class="nav-item">
               <a href="index.php?controller=Dashboard&action=index" class="nav-link">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>Mi Resumen</p>
               </a>
           </li>

           <li class="nav-item">
               <a href="index.php?controller=Alquiler&action=crear" class="nav-link">
                   <i class="nav-icon fas fa-calendar-plus text-success"></i>
                   <p>Nueva Reserva</p>
               </a>
           </li>

           <li class="nav-item">
               <a href="index.php?controller=Perfil&action=index" class="nav-link active-sport">
                   <i class="nav-icon fas fa-user-cog text-warning"></i>
                   <p>Mi Perfil</p>
               </a>
           </li>

        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper" style="background-color: #f4f6f9;">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold text-dark">
              Configuración de Cuenta
            </h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-6">
            <div class="card shadow-lg border-0" style="border-radius: 12px;">
              <div class="card-header bg-white border-0 py-3">
                <h3 class="card-title font-weight-bold text-dark">
                    <i class="fas fa-edit text-success mr-2"></i> Editar Información
                </h3>
              </div>
              
              <form action="index.php?controller=Perfil&action=guardar" method="POST">
                <div class="card-body">
                  <?php if(isset($_GET['msg'])): ?>
                    <?php if($_GET['msg'] == 'update_ok'): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>¡Éxito!</strong> Perfil actualizado correctamente.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php elseif($_GET['msg'] == 'error'): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Error:</strong> No se pudo actualizar el perfil. Intenta nuevamente.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php endif; ?>
                  <?php endif; ?>

                  <div class="form-group">
                    <label>Nombre Completo</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="nombre" value="<?= htmlspecialchars($usuario['nombre_usu']) ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Correo Electrónico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="correo" value="<?= htmlspecialchars($usuario['correo_usu']) ?>" required>
                    </div>
                  </div>

                  <hr>
                  <p class="text-muted small"><i class="fas fa-lock mr-1"></i> Seguridad</p>

                  <div class="form-group">
                    <label>Nueva Contraseña <small class="text-muted">(Dejar en blanco para no cambiar)</small></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="********">
                    </div>
                  </div>

                </div>
                
                <div class="card-footer bg-white text-right py-3 border-0">
                    <button type="submit" class="btn btn-success font-weight-bold rounded-pill px-4 shadow-sm">
                        <i class="fas fa-save mr-1"></i> Guardar Cambios
                    </button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6">
              <div class="card shadow-sm border-0 bg-gradient-sport" style="border-radius: 12px;">
                  <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-shield-alt fa-4x text-white-50"></i>
                        </div>
                        <h4 class="font-weight-bold">Seguridad de la Cuenta</h4>
                        <p class="text-white-50">
                            Mantén tu información actualizada para asegurar el acceso a tu cuenta y recibir notificaciones importantes sobre tus reservas.
                        </p>
                  </div>
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <footer class="main-footer text-sm">
    <div class="float-right d-none d-sm-inline text-muted">
      Pasión por el deporte
    </div>
    <strong>Copyright &copy; 2026 <a href="#" class="text-success">Canchas Pato's</a>.</strong>
  </footer>
</div>

<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
