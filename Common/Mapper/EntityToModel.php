<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Database/Entities/FacturaEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";
class EntityToModel{
    public static function factura_entity_to_model(FacturaEntity $factura_entity): FacturaModel{
        $factura_model = new FacturaModel(
            $factura_entity->codigo,
            $factura_entity->descripcion,
            $factura_entity->email,
            $factura_entity->clave,
            $factura_entity->idPedido,
            $factura_entity->fechaFactura,
            $factura_entity->totalFactura,
            $factura_entity->metodoPago,
            $factura_entity->idCliente,
            $factura_entity->descuento       
        );
        return $factura_model;
    }

    public static function factura_model_to_entity(FacturaModel $factura_model): FacturaEntity{
        $factura_entity = new FacturaEntity();
        $factura_entity->codigo = $factura_model->getCodigo();
        $factura_entity->descripcion = $factura_model->getDescripcion();
        $factura_entity->email = $factura_model->getEmail();
        $factura_entity->clave = $factura_model->getClave();
        $factura_entity->idPedido = $factura_model->getIdPedido();
        $factura_entity->fechaFactura = $factura_model->getFechaFactura();
        $factura_entity->totalFactura = $factura_model->getTotalFactura();
        $factura_entity->metodoPago = $factura_model->getMetodoPago();
        $factura_entity->idCliente = $factura_model->getIdCliente();
        $factura_entity->descuento = $factura_model->getDescuento();
        return $factura_entity;
    }
}
