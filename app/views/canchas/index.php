<div class="row">
    
    <div class="col-md-4">
        <div class="card card-success card-outline shadow-lg border-0">
            <div class="card-header bg-white border-bottom-0 pt-4 text-center">
                <div class="bg-gradient-success rounded-circle d-inline-flex justify-content-center align-items-center mb-3 shadow-sm" style="width: 60px; height: 60px;">
                    <i class="fas fa-futbol fa-2x text-white"></i>
                </div>
                <h5 class="font-weight-bold text-dark">Nueva Cancha</h5>
                <p class="text-muted small">Registra un nuevo espacio deportivo</p>
            </div>
            
            <form action="index.php?controller=Canchas&action=guardar" method="POST">
                <div class="card-body pt-0">
                    
                    <div class="form-group">
                        <label class="font-weight-bold small text-secondary">Nombre / Identificador</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="fas fa-signature text-success"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control bg-light border-left-0" name="nombre" placeholder="Ej: Cancha Sintética A" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold small text-secondary">Precio por Hora ($)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-light border-right-0">
                                    <i class="fas fa-dollar-sign text-success"></i>
                                </span>
                            </div>
                            <input type="number" step="0.01" class="form-control bg-light border-left-0" name="precio" placeholder="0.00" required>
                        </div>
                    </div>

                </div>

                <div class="card-footer bg-white border-0 pt-0 pb-4">
                    <button type="submit" class="btn btn-success btn-block shadow-sm font-weight-bold">
                        <i class="fas fa-plus-circle mr-1"></i> Registrar Cancha
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-outline card-secondary shadow-lg border-0">
            <div class="card-header bg-white border-bottom-0 pt-4">
                <h3 class="card-title font-weight-bold text-dark">
                    <i class="fas fa-list text-secondary mr-2"></i> Canchas Disponibles
                </h3>
            </div>
            
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle">
                    <thead class="bg-light text-uppercase text-secondary text-xs">
                        <tr>
                            <th class="pl-4 border-0" style="width: 10%;">ID</th>
                            <th class="border-0" style="width: 40%;">Nombre de la Cancha</th>
                            <th class="border-0" style="width: 25%;">Precio / Hora</th>
                            <th class="border-0 text-center" style="width: 25%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($canchas)): ?>
                            <?php foreach ($canchas as $cancha): ?>
                            <tr>
                                <td class="pl-4 text-muted font-weight-bold">
                                    #<?= $cancha['can_id'] ?>
                                </td>
                                
                                <td class="font-weight-bold text-dark">
                                    <i class="fas fa-map-marker-alt text-success mr-2"></i>
                                    <?= htmlspecialchars($cancha['can_nombre']) ?>
                                </td>

                                <td>
                                    <span class="badge badge-light border text-success font-weight-bold px-3 py-2" style="font-size: 1em;">
                                        $ <?= number_format($cancha['can_precio_hora'], 2) ?>
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="btn-group shadow-sm">
                                        <a href="index.php?controller=Canchas&action=editar&id=<?= $cancha['can_id'] ?>" class="btn btn-white btn-sm border-right" title="Editar">
                                            <i class="fas fa-pen text-primary"></i>
                                        </a>
                                        <button onclick="confirmarEliminar(<?= $cancha['can_id'] ?>)" class="btn btn-white btn-sm text-danger" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="far fa-futbol fa-3x mb-3 text-gray-300"></i><br>
                                    No hay canchas registradas.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--ADMIN FOTOS LOGICA PARA HOME  -->

<style>
    /* Zona de carga moderna */
    .upload-zone {
        border: 2px dashed #dbe2e8;
        border-radius: 12px;
        background: #f8f9fa;
        padding: 40px 20px;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        cursor: pointer;
    }
    .upload-zone:hover {
        border-color: #17a2b8; /* Color Info */
        background: #eefbfc;
    }
    .upload-zone input[type="file"] {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        opacity: 0; cursor: pointer;
    }
    .upload-icon {
        font-size: 3rem;
        color: #adb5bd;
        margin-bottom: 15px;
        transition: transform 0.3s;
    }
    .upload-zone:hover .upload-icon {
        transform: translateY(-5px);
        color: #17a2b8;
    }
    
    /* Tabla Estilizada */
    .img-preview-card {
        width: 120px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }
    .img-preview-card:hover { transform: scale(1.05); }
    
    .table-modern td { vertical-align: middle !important; }
</style>

<div class="row mt-5 mb-4 align-items-center">
    <div class="col"><hr class="border-secondary opacity-50"></div>
    <div class="col-auto">
        <h4 class="text-dark font-weight-bold m-0" style="letter-spacing: -0.5px;">
            <i class="fas fa-photo-video text-info mr-2"></i> Galería del Home
        </h4>
    </div>
    <div class="col"><hr class="border-secondary opacity-50"></div>
</div>

<div class="row" id="seccion-fotos">
    
    <div class="col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 pt-4 px-4">
                <h5 class="font-weight-bold text-dark mb-1">Nueva Imagen</h5>
                <p class="text-muted small mb-0">Sube fotos para el carrusel principal.</p>
            </div>
            
            <div class="card-body px-4">
                <form action="index.php?controller=Canchas&action=guardarFotoHome" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group mb-4">
                        <div class="upload-zone">
                            <input type="file" id="imagenHome" name="imagen" required accept="image/*">
                            <i class="fas fa-cloud-upload-alt upload-icon"></i>
                            <h6 class="font-weight-bold text-dark mb-1" id="upload-text">Haz clic o arrastra aquí</h6>
                            <p class="small text-muted mb-0">Formato JPG o PNG (Horizontal)</p>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info btn-block font-weight-bold shadow-sm py-2">
                        <i class="fas fa-plus-circle mr-2"></i> Agregar al Slider
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom pt-4 px-4 pb-3">
                <h5 class="card-title font-weight-bold text-dark m-0">Imágenes Activas</h5>
            </div>
            
            <div class="card-body p-0 table-responsive">
                <table class="table table-hover table-modern mb-0">
                    <thead class="bg-light text-uppercase small text-muted">
                        <tr>
                            <th class="pl-4" style="width: 40%;">Vista Previa</th>
                            <th style="width: 30%;">Detalle</th>
                            <th class="text-right pr-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($fotosHome)): ?>
                            <?php foreach($fotosHome as $foto): ?>
                            <tr>
                                <td class="pl-4 py-3">
                                    <img src="uploads/home_canchas/<?= $foto['hc_imagen'] ?>" 
                                         class="img-preview-card" alt="Slider Home">
                                </td>
                                <td>
                                    <span class="badge badge-success px-3 py-2 rounded-pill">
                                        <i class="fas fa-check-circle mr-1"></i> Visible
                                    </span>
                                </td>
                                <td class="text-right pr-4">
                                    <a href="index.php?controller=Canchas&action=editarFotoHome&id=<?= $foto['hc_id'] ?>" 
                                        class="btn btn-outline-warning btn-sm rounded-circle shadow-sm mr-1" 
                                        style="width: 35px; height: 35px; padding-top: 6px;"
                                        title="Editar / Reemplazar">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <a href="index.php?controller=Canchas&action=eliminarFotoHome&id=<?= $foto['hc_id'] ?>" 
                                        class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" 
                                        style="width: 35px; height: 35px; padding-top: 6px;"
                                        onclick="return confirm('¿Quitar esta imagen del carrusel?')"
                                        title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="far fa-images fa-3x mb-3 opacity-50"></i>
                                        <p class="font-weight-bold mb-1">Tu galería está vacía</p>
                                        <small>Sube una imagen a la izquierda para comenzar.</small>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('imagenHome').addEventListener('change', function(e) {
        if (e.target.files[0]) {
            var fileName = e.target.files[0].name;
            document.getElementById('upload-text').innerText = fileName;
            document.querySelector('.upload-icon').classList.remove('fa-cloud-upload-alt');
            document.querySelector('.upload-icon').classList.add('fa-check-circle', 'text-success');
        }
    });
</script>

<!-- Aqui termina el admin fotos para home -->

<script>
    function confirmarEliminar(id) {
        Swal.fire({
            title: '¿Eliminar cancha?',
            text: "Cuidado: Si hay reservas pasadas en esta cancha, podría generar error.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#f8f9fa',
            confirmButtonText: '<i class="fas fa-trash"></i> Eliminar',
            cancelButtonText: '<span class="text-dark">Cancelar</span>'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `index.php?controller=Canchas&action=eliminar&id=${id}`;
            }
        })
    }
</script>

