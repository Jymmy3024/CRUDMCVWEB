<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IListarFacturasService.php";

class ListarFacturasService implements IListarFacturaService
{
    private $facturaRepository;

    public function __construct(IFacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function listarFacturas(): array
    {
        return $this->facturaRepository->getAllFacturas();
    }
}