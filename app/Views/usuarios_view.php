<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios Registrados</h1>

    <?php if (isset($usuarios) && count($usuarios) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['Id'] ?></td>
                        <td><?= $usuario['Nombre'] ?></td>
                        <td><?= $usuario['Email'] ?></td>
                        <td>
                            <a href="#">Editar</a> | <a href="#">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay usuarios registrados.</p>
    <?php endif; ?>

    <a href="/usuarios/crear">Crear nuevo usuario</a>
</body>
</html>
