<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Listado de Usuarios</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)) : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario->getIdentificacion()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getNombre()); ?></td>
                            <td><?php echo htmlspecialchars($usuario->getEmail()); ?></td>
                            <td>
                                <!-- Botón Editar -->
                                <a href="editar.php?id=<?php echo urlencode($usuario->getIdentificacion()); ?>" class="btn btn-primary btn-sm">Editar</a>
                                
                                <!-- Botón Eliminar -->
                                <a href="eliminar.php?id=<?php echo urlencode($usuario->getIdentificacion()); ?>" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Incluimos Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>