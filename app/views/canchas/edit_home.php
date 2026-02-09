<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-dark border-0 pt-4 px-4">
                <h5 class="font-weight-bold mb-1"><i class="fas fa-edit mr-2"></i> Editar Imagen del Carrusel</h5>
                <p class="small text-muted mb-0">Reemplaza la imagen actual por una nueva.</p>
            </div>
            
            <div class="card-body px-4 py-4">
                <form action="index.php?controller=Canchas&action=actualizarFotoHome" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $foto['hc_id'] ?>">

                    <div class="form-group text-center mb-4">
                        <label class="d-block text-muted small font-weight-bold mb-2">IMAGEN ACTUAL</label>
                        <img src="uploads/home_canchas/<?= $foto['hc_imagen'] ?>" 
                             class="img-fluid rounded shadow-sm border" 
                             style="max-height: 200px; object-fit: cover;">
                    </div>

                    <div class="form-group mb-4">
                        <label class="d-block text-muted small font-weight-bold mb-2">SELECCIONAR NUEVA IMAGEN</label>
                        
                        <div class="upload-zone" style="position: relative; border: 2px dashed #ffc107; background: #fffdf5;">
                            <input type="file" id="imagenNueva" name="imagen" required accept="image/*" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                            <i class="fas fa-sync-alt upload-icon text-warning mb-2" style="font-size: 2rem;"></i>
                            <h6 class="font-weight-bold text-dark mb-1" id="upload-text">Clic para reemplazar</h6>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php?controller=Canchas&action=index#seccion-fotos" class="btn btn-light text-muted font-weight-bold">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning font-weight-bold shadow-sm px-4">
                            <i class="fas fa-save mr-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script visual para cambiar texto al seleccionar
    document.getElementById('imagenNueva').addEventListener('change', function(e) {
        if (e.target.files[0]) {
            var fileName = e.target.files[0].name;
            document.getElementById('upload-text').innerText = fileName;
        }
    });
</script>