<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IBuscarFacturaService.php";

class BuscarFacturaService implements IBuscarFacturaService{
    private $facturaRepository;
    public function __construct(IFacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function buscarFactura(string $codigo): FacturaModel
    {
        return $this->facturaRepository->findFacturaByCodigo($codigo);
    }
}