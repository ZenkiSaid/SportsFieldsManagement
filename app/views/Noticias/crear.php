<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark font-weight-bold">Gestión de Noticias</h1>
      </div>
      <div class="col-sm-6 text-right">
        <ol class="breadcrumb float-sm-right bg-transparent p-0">
          <li class="breadcrumb-item"><a href="index.php?controller=Dashboard&action=index">Inicio</a></li>
          <li class="breadcrumb-item"><a href="index.php?controller=Noticias&action=index">Noticias</a></li>
          <li class="breadcrumb-item active">Nueva</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <div class="card card-success card-outline shadow-lg border-0" style="border-radius: 15px;">
          <div class="card-header bg-white py-3 text-center border-bottom-0">
             <h3 class="card-title font-weight-bold text-dark" style="font-size: 1.5rem;">
                 <i class="fas fa-edit text-success mr-2"></i> Publicar Nueva Noticia
             </h3>
          </div>
          
          <form action="index.php?controller=Noticias&action=guardar" method="POST" enctype="multipart/form-data">
            <div class="card-body bg-light">
              
              <div class="form-group mb-4">
                  <label class="font-weight-bold text-dark mb-2">
                      <i class="fas fa-image mr-1"></i> Imagen Destacada
                  </label>
                  
                  <div class="image-upload-area bg-white shadow-sm" style="position: relative; border: 2px dashed #adb5bd; border-radius: 15px; height: 180px; display: flex; align-items: center; justify-content: center; transition: all 0.3s;">
                      
                      <div id="upload-content" class="text-center p-3">
                          <i class="fas fa-cloud-upload-alt fa-3x text-secondary mb-2"></i>
                          <h6 class="font-weight-bold text-dark mb-0">Haz clic aquí para seleccionar imagen</h6>
                          <small class="text-muted">(Formatos: JPG, PNG)</small>
                      </div>

                      <input type="file" name="imagen" id="imagenInput" accept="image/*" required 
                             style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label class="font-weight-bold text-dark small">Fecha Inicio</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0"><i class="far fa-calendar-alt text-success"></i></span>
                            </div>
                            <input type="date" name="fecha_inicio" class="form-control border-left-0" value="<?= date('Y-m-d') ?>" required>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label class="font-weight-bold text-dark small">Fecha Fin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0"><i class="far fa-calendar-times text-danger"></i></span>
                            </div>
                            <input type="date" name="fecha_fin" class="form-control border-left-0" required>
                        </div>
                      </div>
                  </div>
              </div>

              <div class="form-group mt-2">
                <label class="font-weight-bold text-dark small">Descripción / Contenido</label>
                <textarea name="descripcion" class="form-control shadow-sm" rows="5" placeholder="Escribe aquí los detalles del evento..." required style="border-radius: 10px;"></textarea>
              </div>

            </div>
            
            <div class="card-footer bg-white text-right py-4 border-top-0 rounded-bottom">
              <a href="index.php?controller=Noticias&action=index" class="btn btn-light rounded-pill px-4 mr-2 font-weight-bold text-muted">
                  Cancelar
              </a>
              <button type="submit" class="btn btn-success rounded-pill px-5 font-weight-bold shadow hover-effect">
                  <i class="fas fa-check mr-2"></i> Publicar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>

<script>
$(document).ready(function() {
    
    // Efecto Hover visual en el área de carga
    $('.image-upload-area').hover(
        function() { $(this).css('background-color', '#f8f9fa'); },
        function() { $(this).css('background-color', '#ffffff'); }
    );

    // Lógica principal: Cuando se selecciona un archivo
    $('#imagenInput').change(function(e) {
        var fileName = e.target.files[0].name; // Obtiene el nombre "foto.jpg"
        
        // 1. Cambiar el borde a verde sólido
        $('.image-upload-area').css('border', '2px solid #28a745');
        $('.image-upload-area').css('background-color', '#e8f5e9'); // Fondo verde suave
        
        // 2. Reemplazar el icono de nube y texto por el Check y el Nombre
        $('#upload-content').html(`
            <i class="fas fa-check-circle text-success fa-3x mb-2"></i>
            <h5 class="font-weight-bold text-dark mb-0">${fileName}</h5>
            <small class="text-success font-weight-bold">¡Imagen lista para subir!</small>
        `);
    });
});
</script>

<style>
    /* Animación suave para el botón de guardar */
    .hover-effect:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4) !important;
    }
</style>