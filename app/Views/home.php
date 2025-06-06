<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <form action="<?= site_url('auth/login') ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Ingresar</button>
    </form>

    <p>¿No tienes cuenta? <a href="<?= site_url('auth/register') ?>">Regístrate aquí</a></p>
</body>
</html>
