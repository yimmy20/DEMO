

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Página de Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        header {
            position: fixed;
            top: 0;
            right: 0;
            padding: 10px 20px;
            z-index: 1000;
        }
        .btn-group {
            gap: 10px;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px; /* espacio para header */
        }
    </style>
</head>
<body>

<header>
    <div class="btn-group">
        <!-- Abrir modal login -->
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
            Iniciar Sesión
        </button>

        <!-- Abrir modal registro -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#registerModal">
            Registrarse
        </button>
    </div>
</header>

<main>
    <div class="text-center">
        <h1>Bienvenido a Nuestra Aplicación</h1>
        <p class="lead">Por favor, inicia sesión o regístrate para continuar.</p>
    </div>
</main>

<!-- Modal Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('auth/login') ?>" method="post" autocomplete="off">
        <?= csrf_field() ?>
        <input type="hidden" name="action" value="login" />
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">

          <?php if (isset($validation) && $this->request->getPost('action') === 'login'): ?>
              <div class="alert alert-danger">
                  <?= $validation->listErrors() ?>
              </div>
          <?php endif; ?>

          <?php if (isset($error) && $this->request->getPost('action') === 'login'): ?>
              <div class="alert alert-danger"><?= esc($error) ?></div>
          <?php endif; ?>

          <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required />
          </div>

          <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" name="password" id="password" class="form-control" required />
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Registro -->
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
