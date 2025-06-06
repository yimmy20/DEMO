<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>

        <!-- Mostrar errores de validación -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Mostrar error de credenciales -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <!-- Formulario de login -->
        <form action="<?= site_url('auth/login') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" required />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>

        <!-- Enlace para el registro de un nuevo usuario -->
        <p>¿No tienes cuenta? <a href="<?= site_url('register') ?>">Regístrate aquí</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
