<?php include '../layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Cliente</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- KPIs -->
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $data['horas_alquiladas']; ?></h3>
                            <p>Horas Alquiladas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>$<?php echo number_format($data['valor_pagado'], 2); ?></h3>
                            <p>Valor Pagado</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historial Reciente -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Historial Reciente (Últimos 10 días)</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Cancha</th>
                                        <th>Hora Inicial</th>
                                        <th>Hora Final</th>
                                        <th>Pago</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['historial'] as $reserva): ?>
                                    <tr>
                                        <td><?php echo $reserva['fecha']; ?></td>
                                        <td><?php echo $reserva['nombre_cancha']; ?></td>
                                        <td><?php echo $reserva['hora_inicial']; ?></td>
                                        <td><?php echo $reserva['hora_final']; ?></td>
                                        <td>
                                            <?php if ($reserva['archivo_pago']): ?>
                                                <a href="uploads/<?php echo $reserva['archivo_pago']; ?>" target="_blank">Ver PDF/JPG</a>
                                            <?php else: ?>
                                                No subido
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $reserva['nombre_estado']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../layouts/footer.php'; ?>