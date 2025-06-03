<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= base_url('auth/register') ?>" method="post" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" name="action" value="register">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Registrar Nuevo Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <?php if (session()->getFlashdata('validation_errors')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('validation_errors') ?>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= old('nombre') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono (opcional)</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="<?= old('telefono') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email_register" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email_register" class="form-control" value="<?= old('email') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_register" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password_register" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>