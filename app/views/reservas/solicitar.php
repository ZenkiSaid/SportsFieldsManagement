<?php include '../layouts/header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Solicitar Arrendamiento</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de Reserva</h3>
                        </div>
                        <div class="card-body">
                            <form action="index.php?controller=Reservas&action=solicitar" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id_cancha">Cancha</label>
                                    <select class="form-control" id="id_cancha" name="id_cancha" required>
                                        <option value="">Seleccione una cancha</option>
                                        <?php foreach ($data['canchas'] as $cancha): ?>
                                            <option value="<?php echo $cancha['id_cancha']; ?>" data-precio="<?php echo $cancha['precio_hora']; ?>">
                                                <?php echo $cancha['nombre_cancha']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                                <div class="form-group">
                                    <label for="hora_inicial">Hora Inicial</label>
                                    <select class="form-control" id="hora_inicial" name="hora_inicial" required>
                                        <option value="">Seleccione hora inicial</option>
                                        <?php foreach ($data['horarios'] as $horario): ?>
                                            <option value="<?php echo $horario['hora']; ?>"><?php echo $horario['hora']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hora_final">Hora Final</label>
                                    <select class="form-control" id="hora_final" name="hora_final" required>
                                        <option value="">Seleccione hora final</option>
                                        <?php foreach ($data['horarios'] as $horario): ?>
                                            <option value="<?php echo $horario['hora']; ?>"><?php echo $horario['hora']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="valor_hora">Valor de Hora</label>
                                    <input type="text" class="form-control" id="valor_hora" name="valor_hora" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="archivo_pago">Pago (PDF o JPG/PNG)</label>
                                    <input type="file" class="form-control" id="archivo_pago" name="archivo_pago" accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="index.php?controller=Dashboard&action=index" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.getElementById('id_cancha').addEventListener('change', calcularValor);
document.getElementById('hora_inicial').addEventListener('change', calcularValor);
document.getElementById('hora_final').addEventListener('change', calcularValor);

function calcularValor() {
    var canchaSelect = document.getElementById('id_cancha');
    var precio = canchaSelect.options[canchaSelect.selectedIndex].getAttribute('data-precio');
    var horaInicial = document.getElementById('hora_inicial').value;
    var horaFinal = document.getElementById('hora_final').value;

    if (precio && horaInicial && horaFinal) {
        var horas = (new Date('1970-01-01T' + horaFinal) - new Date('1970-01-01T' + horaInicial)) / 3600000;
        var valor = horas * precio;
        document.getElementById('valor_hora').value = '$' + valor.toFixed(2);
    }
}
</script>

<?php include '../layouts/footer.php'; ?>