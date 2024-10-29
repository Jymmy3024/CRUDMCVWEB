<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h2 class="text-center">Editar Factura</h2>
        <div class="m-3">
            
            <?php if(($_GET["ErrorMessage"] ?? null) != null): ?>
                <div class="alert alert-danger p-3 text-center">
                    <span><?php echo $_GET["ErrorMessage"] ?? '' ?></span>
                </div>
            <?php endif; ?>
        </div>
        <form action="index.php?" method="POST" class="m-3 p-3 col-12">
            <div class="form-group m-3">
                <label for="codigo" class="fw-bold">Código</label>
                <input type="text" class="form-control" id="codigo" 
                    value="<?php echo htmlspecialchars($factura->getCodigo()); ?>" name="codigo" readonly="true" required>
            </div>
            <div class="form-group m-3">
                <label for="descripcion" class="fw-bold">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" 
                       value="<?php echo htmlspecialchars($factura->getDescripcion()); ?>" required>
            </div>
            <div class="form-group m-3">
                <label for="email" class="fw-bold">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo htmlspecialchars($factura->getEmail()); ?>" required>
            </div>
            <div class="form-group m-3">
                <label for="clave" class="fw-bold">Clave</label>
                <input type="password" class="form-control" id="clave" name="clave" 
                       value="<?php echo htmlspecialchars($factura->getClave()); ?>" required>
            </div>
            <div class="form-group m-3">
                <label for="idPedido" class="fw-bold">ID Pedido</label>
                <input type="text" class="form-control" id="idPedido" name="idPedido" 
                       value="<?php echo htmlspecialchars($factura->getIdPedido()); ?>" required readonly="true">
            </div>
            <div class="form-group m-3">
                <label for="fechaFactura" class="fw-bold">Fecha de Factura</label>
                <input type="date" class="form-control" id="fechaFactura" name="fechaFactura" 
                       value="<?php echo $factura->getFechaFactura()->format('Y-m-d'); ?>" required readonly="true">
            </div>
            <div class="form-group m-3">
                <label for="totalFactura" class="fw-bold">Total de la Factura</label>
                <input type="number" class="form-control" id="totalFactura" name="totalFactura" 
                       step="0.01" value="<?php echo htmlspecialchars($factura->getTotalFactura()); ?>" required>
            </div>
            <div class="form-group m-3">
                <label for="metodoPago" class="fw-bold">Método de Pago</label>
                <select class="form-control" id="metodoPago" name="metodoPago" required>
                    <option value="">Selecciona un método de pago</option>
                    <option value="Tarjeta" <?php echo $factura->getMetodoPago() == 'Tarjeta' ? 'selected' : ''; ?>>Tarjeta</option>
                    <option value="Efectivo" <?php echo $factura->getMetodoPago() == 'Efectivo' ? 'selected' : ''; ?>>Efectivo</option>
                    <option value="Transferencia" <?php echo $factura->getMetodoPago() == 'Transferencia' ? 'selected' : ''; ?>>Transferencia</option>
                </select>
            </div>
            <div class="form-group m-3">
                <label for="idCliente" class="fw-bold">ID Cliente</label>
                <input type="text" class="form-control" id="idCliente" name="idCliente" 
                       value="<?php echo htmlspecialchars($factura->getIdCliente()); ?>" required readonly="true">
            </div>
            <div class="form-group m-3">
                <label for="descuento" class="fw-bold">Descuento</label>
                <input type="number" class="form-control" id="descuento" name="descuento" 
                       step="0.01" value="<?php echo htmlspecialchars($factura->getDescuento()); ?>">
            </div>
            <div class="form-group mt-3">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success" name="action" value="editar">Editar Factura</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Incluimos Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 
