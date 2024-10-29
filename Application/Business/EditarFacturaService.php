<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IEditarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Exceptions/EntityNotFoundException.php";
class EditarFacturaService implements IEditarFacturaService{

    private $facturaRepository;

    public function __construct(IFacturaRepository $facturaRepository){
        $this->facturaRepository = $facturaRepository;
    }

    public function EditarFactura(FacturaModel $factura){
        $facturaEncontrada = $this->facturaRepository->findFacturaByCodigo($factura->getCodigo());
        if($facturaEncontrada == null){
            throw new EntityNotFoundException("La factura que intenta editar no existe");
        }
        $this->facturaRepository->updateFactura($factura);
    }
    
}