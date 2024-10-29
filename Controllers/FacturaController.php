<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IGuardarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Business/GuardarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IBuscarFacturaService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IListarFacturasService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Business/ListarFacturasService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Database/Entities/FacturaEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Repositories/FacturaRepository.php";

class FacturaController{
    private $facturaRepository;

    public function __construct(IFacturaRepository $facturaRepository)
    {
        $this->facturaRepository = $facturaRepository;
    }

    public function createView(){
        require_once '../Views/Forms/Facturas/create.php';
    }
    
    public function guardarFactura(): void
    {
        try{
            $fechaIni = DateTime::createFromFormat("Y-m-d H:i:s",$_POST["fechaFactura"]. " ".date("H:i:s"));
            $codigo = $_POST["codigo"];
            $descripcion = $_POST["descripcion"];
            $email = $_POST["email"];
            $clave = $_POST["clave"];
            $idPedido = $_POST["idPedido"];
            $fechaFactura = $fechaIni;
            $totalFactura = $_POST["totalFactura"];
            $metodoPago = $_POST["metodoPago"];
            $idCliente = $_POST["idCliente"];
            $descuento = $_POST["descuento"];

            $facturaModel = new FacturaModel($codigo, $descripcion, $email, $clave
                                            ,$idPedido, $fechaFactura, $totalFactura, $metodoPago,
                                        $idCliente, $descuento);
            $guardarFacturaService = new GuardarFacturaService($this->facturaRepository);
            $total = $guardarFacturaService->guardarFactura($facturaModel);
            $message = "Factura guardada correctamente. Total = $total";
            header("Location: ../Views/Forms/Facturas/create.php?message=$message");
        }catch(Exception $e){
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Facturas/create.php?ErrorMessage=$message");
        }
    }

    public function listarFacturas()
    {
        $listarFacturasService = new ListarFacturasService($this->facturaRepository);
        $facturas = $listarFacturasService->listarFacturas();
        require_once '../Views/Forms/Facturas/listar.php';
    }

}
