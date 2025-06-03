<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Login & Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center">Iniciar Sesión</h3>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Mensajes de éxito -->
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Mensajes de error -->
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Errores de validación -->
                        <?php if (session()->getFlashdata('validation_errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('validation_errors') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/login') ?>" method="post">
                            <?= csrf_field() ?>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?= old('email') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="mb-0">¿No tienes cuenta? <a href="<?= base_url('/register') ?>">Regístrate aquí</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= esc($error) ?></div>
                    <?php endif; ?>

                    <?php if (isset($success_register)): ?>
                        <div class="alert alert-success"><?= esc($success_register) ?></div>
                    <?php endif; ?>

                    <form action="<?= site_url('auth/login') ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <input type="hidden" name="action" value="login" />

                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required />
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>

                    <hr />

                    <div class="text-center">
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#registerModal">
                            ¿No tienes cuenta? Regístrate aquí
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal Registro -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('auth/register') ?>" method="post" autocomplete="off">
      <?= csrf_field() ?>
      <input type="hidden" name="action" value="register" />
        <div class="modal-header">
          <h5 class="modal-title" id="registerModalLabel">Registrar Nuevo Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

            <?php if (isset($validation_register)): ?>
                <div class="alert alert-danger">
                    <?= $validation_register->listErrors() ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?= set_value('nombre') ?>" required />
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono (opcional)</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="<?= set_value('telefono') ?>" />
            </div>

            <div class="mb-3">
                <label for="email_register" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email_register" class="form-control" value="<?= set_value('email') ?>" required />
            </div>

            <div class="mb-3">
                <label for="password_register" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password_register" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">Confirmar contraseña</label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" required />
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success w-100">Registrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
