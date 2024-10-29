<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IGuardarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Exceptions/EntityPreexistingException.php";

class GuardarFacturaService implements IGuardarFacturaService
{
    private $facturaRepository;

    public function __construct(IFacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function guardarFactura(FacturaModel $factura) : int
    {
        try{
            return $this->facturaRepository->createFactura($factura);
        }catch(EntityPreexistingException $e)
        {
            throw $e;
        }
        
        
    }
}
?>

