<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark font-weight-bold">
            <i class="fas fa-newspaper text-secondary mr-2"></i> Gestión de Noticias
        </h1>
        <p class="text-muted small mb-0">Administra las novedades visibles en el Home.</p>
      </div>
      <div class="col-sm-6 text-right">
        <a href="index.php?controller=Noticias&action=crear" class="btn btn-success btn-lg shadow-sm font-weight-bold rounded-pill px-4">
            <i class="fas fa-plus mr-2"></i> Nueva Noticia
        </a>
      </div>
    </div>
  </div>
</div>

<div class="content">
  <div class="container-fluid">

        <?php if(isset($_GET['msg'])): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                <?php 
                    if($_GET['msg']=='save_ok') echo "¡La noticia ha sido publicada con éxito!";
                    if($_GET['msg']=='update_ok') echo "La noticia se actualizó correctamente.";
                    if($_GET['msg']=='delete_ok') echo "Noticia eliminada del sistema.";
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <div class="card card-outline card-success shadow-lg border-0">

            <div class="card-header bg-white py-3">
                <div class="card-tools w-100">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 mb-2 mb-md-0">
                            <h3 class="card-title text-secondary font-weight-bold">
                                <i class="fas fa-newspaper mr-2"></i>Publicaciones
                            </h3>
                        </div>
                        <div class="col-12 col-md-8 text-right">
                            <div class="input-group input-group-sm float-right search-box-responsive" style="width: 100%; max-width: 250px;">
                                <input type="text" id="tableSearch" class="form-control" placeholder="Buscar noticias...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle text-nowrap table-mobile-responsive">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-center" style="width: 10%;">Imagen</th>
                            <th style="width: 40%;">Descripción</th>
                            
                            <th class="text-center">Vigencia</th>
                            <th class="text-center">Estado</th>
                            <th class="text-right" style="padding-right: 25px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($noticias)): ?>
                            <?php foreach($noticias as $noti): 
                                // Tu lógica original intacta
                                $hoy = date('Y-m-d');
                                $activa = ($noti['not_fecha_fin'] >= $hoy);
                            ?>
                            <tr>
                                <td class="text-center" data-label="Imagen">
                                    <?php if($noti['not_imagen']): ?>
                                        <img src="uploads/noticias/<?= $noti['not_imagen'] ?>" 
                                            class="rounded shadow-sm" 
                                            style="width: 70px; height: 70px; object-fit: cover; border: 2px solid #fff;">
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted mx-auto" 
                                            style="width: 70px; height: 70px;">
                                            <i class="fas fa-image fa-2x"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td data-label="Descripción">
                                    <div class="text-left" style="white-space: normal;"> 
                                        <p class="font-weight-bold mb-1 text-dark" style="line-height: 1.3;">
                                            <?= substr($noti['not_descripcion'], 0, 70) . (strlen($noti['not_descripcion']) > 70 ? '...' : '') ?>
                                        </p>
                                        <span class="badge badge-light border text-muted">ID: #<?= $noti['not_id'] ?></span>
                                    </div>
                                </td>

                                <td class="text-center" data-label="Vigencia">
                                    <div class="d-flex flex-column align-items-end-mobile justify-content-center">
                                        <small class="text-success font-weight-bold mb-1">
                                            <i class="fas fa-play mr-1"></i> <?= date('d/m/Y', strtotime($noti['not_fecha_inicio'])) ?>
                                        </small>
                                        <small class="text-danger font-weight-bold">
                                            <i class="fas fa-stop mr-1"></i> <?= date('d/m/Y', strtotime($noti['not_fecha_fin'])) ?>
                                        </small>
                                    </div>
                                </td>

                                <td class="text-center" data-label="Estado">
                                    <?php if($activa): ?>
                                        <span class="badge badge-success px-3 py-2 rounded-pill shadow-sm">
                                            <i class="fas fa-check-circle mr-1"></i> Activa
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary px-3 py-2 rounded-pill">
                                            <i class="fas fa-history mr-1"></i> Finalizada
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-right" style="padding-right: 25px;" data-label="Acciones">
                                    <div class="btn-group shadow-sm">
                                        <a href="index.php?controller=Noticias&action=editar&id=<?= $noti['not_id'] ?>" 
                                        class="btn btn-outline-warning btn-sm rounded-circle mr-1" 
                                        title="Editar" style="width: 35px; height: 35px; padding-top: 6px;">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="index.php?controller=Noticias&action=eliminar&id=<?= $noti['not_id'] ?>" 
                                        class="btn btn-outline-danger btn-sm rounded-circle" 
                                        onclick="return confirm('¿Estás seguro de eliminar esta noticia? No se podrá recuperar.')" 
                                        title="Eliminar" style="width: 35px; height: 35px; padding-top: 6px;">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="far fa-newspaper fa-3x mb-3 text-light-gray"></i>
                                    <p>No hay noticias registradas en el sistema.</p>
                                    <a href="index.php?controller=Noticias&action=crear" class="btn btn-sm btn-primary">Crear la primera</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-footer bg-white border-top-0 clearfix">
                <small class="text-muted float-left mt-2">Mostrando <?= count($noticias ?? []) ?> registros</small>
            </div>

        </div> 
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var searchInput = document.getElementById("tableSearch");
    searchInput.addEventListener("keyup", function() {
        var value = this.value.toLowerCase();
        var rows = document.querySelectorAll("table tbody tr");
        
        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.indexOf(value) > -1 ? "" : "none";
        });
    });
});
</script>

<style>
    /* Estilos extra para pulir detalles */
    .table td { vertical-align: middle !important; }
    .badge { font-size: 0.85rem; font-weight: 600; }
    .btn-outline-warning:hover { color: #fff; }
    .card-outline.card-success { border-top: 3px solid #28a745; }
</style>