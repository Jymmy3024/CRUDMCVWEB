<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Agregar Nuevo Usuario</h2>
        <div class="m-3">
            <?php if(($_GET["message"] ?? null) != null):?>
                <div class="alert alert-success p-3 text-center" ><span><?php echo $_GET["message"] ?? '' ?></span></div>
            <?php elseif(($_GET["ErrorMessage"] ?? null) != null): ?>
                    <div class="alert alert-danger p-3 text-center" ><span><?php echo $_GET["ErrorMessage"] ?? '' ?></span></div>
            <?php endif; ?>
        </div>
        <form action="../../../Controllers/UsuarioController.php" method="POST" class="m-3">
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password"> Clave</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="form-group" >
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success" name="action" value="guardar">Guardar Usuario</button>
                    </div>
                    <div class="col text-right">
                        <a href="../../../Controllers/UsuarioController.php?action=listar" class="btn btn-secondary">Lista de usuarios</a>
                    </div>
                </div>
            </div>
            
        </form>
        
    </div>

    <!-- Incluimos Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
