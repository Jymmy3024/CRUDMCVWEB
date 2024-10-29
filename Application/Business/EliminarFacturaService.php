<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IEliminarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Exceptions/EntityNotFoundException.php";

class EliminarFacturaService implements IEliminarFacturaService
{
    private $facturaRepository;

    public function __construct(IFacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function eliminarFactura(string $codigo): void
    {
        $factura = $this->facturaRepository->findFacturaByCodigo($codigo);

        if ($factura === null) {
            throw new EntityNotFoundException("Factura no encontrada");
        }

        $this->facturaRepository->deleteFactura($codigo);
    }
}
