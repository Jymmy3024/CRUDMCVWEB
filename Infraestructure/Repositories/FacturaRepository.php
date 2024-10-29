<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Domain/Models/FacturaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Infraestructure/Database/Entities/FacturaEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Contracts/IFacturaRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Common/Mapper/EntityToModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Exceptions/EntityNotFoundException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Exceptions/ENtityPreexistingException.php";
class FacturaRepository implements IFacturaRepository
{
    public function getAllFacturas(): array
    {
        try {
            $facturaEntities = FacturaEntity::all();
            $facturaModels = [];
            foreach ($facturaEntities as $facturaEntity) {
                $facturaModels[] = EntityToModel::factura_entity_to_model($facturaEntity);
            }

            return $facturaModels;
        } catch (Exception $e) {
            throw new Exception("No hay usuarios registrados: ".$e->getMessage());
        }
    }

    public function findFacturaByCodigo(string $codigo): FacturaModel
    {
        try {
            $factura = FacturaEntity::find($codigo);
            $facturaModel = EntityToModel::factura_entity_to_model($factura);
            return $facturaModel;
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario con identificación $codigo no existe.");
        }
    }

    public function createFactura(FacturaModel $factura): int
    {
        try {
            $factura = $this->findFacturaByCodigo($factura->getCodigo());
            if ($factura) {
                throw new EntityPreexistingException("El usuario con la indentificación " . $factura->getCodigo() . " ya existe.");  
            }
            return 0;
        } catch (EntityNotFoundException $e) {
            $facturaEntities = EntityToModel::factura_model_to_entity($factura);
            $facturaEntities->save();
            return $this->count();
        } catch (EntityPreexistingException $e) {
            throw $e;
        }
    }

    public function updateFactura(FacturaModel $factura)
    {
        try {
            $facturaEntity = FacturaEntity::find($factura->getCodigo());
            $facturaEntity->descripcion = $factura->getDescripcion();
            $facturaEntity->email = $factura->getEmail();
            $facturaEntity->clave = $factura->getClave();
            $facturaEntity->idPedido = $factura->getIdPedido();
            $facturaEntity->fechaFactura = $factura->getFechaFactura();
            $facturaEntity->totalFactura = $factura->getTotalFactura();
            $facturaEntity->metodoPago = $factura->getMetodoPago();
            $facturaEntity->idCliente = $factura->getIdCliente();
            $facturaEntity->descuento = $factura->getDescuento();
            $facturaEntity->save();
        } catch (EntityNotFoundException $e) {
            $message = "El usuario con cedula " . $factura->getCodigo() . " no existe.";
            throw new EntityNotFoundException($message);
        }
    }

    public function deleteFactura(string $codigo)
    {
        try {
            $facturaModel = $this->findFacturaByCodigo($codigo);
            $facturaEntities = EntityToModel::factura_model_to_entity($facturaModel);
            $facturaEntities->delete();
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario que desea eliminar con la indentificacion $codigo no existe.");
        }
    }
    public function count(): int
    {
        return FacturaEntity::count();
    }
}
