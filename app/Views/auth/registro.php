<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>

        <!-- Mostrar errores de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form action="<?= site_url('auth/register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= old('nombre') ?>" required />
            </div>

            <div class="mb-3">
                <label for="email_register" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email_register" value="<?= old('email') ?>" required />
            </div>

            <div class="mb-3">
                <label for="password_register" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password_register" required />
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" required />
            </div>

            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <!-- Enlace para volver al login -->
        <p>¿Ya tienes cuenta? <a href="<?= site_url('login') ?>">Inicia sesión aquí</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

