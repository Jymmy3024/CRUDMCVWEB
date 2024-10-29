<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Facturas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-10">
                <h2 class="text-center">Listado de Facturas</h2>
            </div>
            <div class="col-2 text-right">
                <a href="index.php?action=createView" class="btn btn-success">Crear Factura</a>
            </div>
        </div>
        
        <table class="table table-striped table-bordered m-4">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Email</th>
                    <th>ID Pedido</th>
                    <th>Fecha Factura</th>
                    <th>Total Factura</th>
                    <th>Método de Pago</th>
                    <th>ID Cliente</th>
                    <th>Descuento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($facturas)) : ?>
                    <?php foreach ($facturas as $factura) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($factura->getCodigo()); ?></td>
                            <td><?php echo htmlspecialchars($factura->getDescripcion()); ?></td>
                            <td><?php echo htmlspecialchars($factura->getEmail()); ?></td>
                            <td><?php echo htmlspecialchars($factura->getIdPedido()); ?></td>
                            <td><?php echo htmlspecialchars($factura->getFechaFactura()->format('Y-m-d H:i:s')); ?></td>
                            <td><?php echo htmlspecialchars(number_format($factura->getTotalFactura(), 2)); ?></td>
                            <td><?php echo htmlspecialchars($factura->getMetodoPago()); ?></td>
                            <td><?php echo htmlspecialchars($factura->getIdCliente()); ?></td>
                            <td><?php echo htmlspecialchars(number_format($factura->getDescuento(), 1)); ?></td>
                            <td>
                                <!-- Botón Editar -->
                                <a href="editar.php?id=<?php echo urlencode($factura->getCodigo()); ?>" class="btn btn-primary btn-sm">Editar</a>
                                
                                <!-- Botón Eliminar -->
                                <a href="eliminar.php?id=<?php echo urlencode($factura->getCodigo()); ?>" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10" class="text-center">No hay facturas registradas</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Incluimos Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>