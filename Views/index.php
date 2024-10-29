<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Repositories/FacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Controllers/FacturaController.php";
$facturaRepository = new FacturaRepository(); 
$controller = new FacturaController($facturaRepository);

    $accion = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "listar";
        switch ($accion) {
            case "listar":
                $controller->listarFacturas();
                break;
            case "guardar":
                $controller->guardarFactura();
                break;
            case "createView":
                $controller->createView();
                break;
            case "cargarFormulario":
                $codigoFactura = isset($_REQUEST["codigoFactura"]) ? $_REQUEST["codigoFactura"] : "";
                $controller->cargarFormulario($codigoFactura);
                break;
            case "editar":
                $controller->editarFactura();
                break;
            case "eliminar":
                $codigoFactura = isset($_REQUEST["codigoFactura"]) ? $_REQUEST["codigoFactura"] : "";
                $controller->eliminarFactura($codigoFactura);
            default:
                $controller->listarFacturas();
                break;
        }