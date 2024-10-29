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

    public function findFacturaByCodigo(string $identificacion): FacturaModel
    {
        try {
            $factura = FacturaEntity::find($identificacion);
            $facturaModel = EntityToModel::factura_entity_to_model($factura);
            return $facturaModel;
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario con identificación $identificacion no existe.");
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
            $facturaModel = $this->findFacturaByCodigo($factura->getCodigo());
            $facturaEntities = EntityToModel::factura_model_to_entity($facturaModel);
            $facturaEntities->save();
        } catch (EntityNotFoundException $e) {
            $message = "El usuario con cedula " . $factura->getCodigo() . " no existe.";
            throw new EntityNotFoundException($message);
        }
    }

    public function deleteFactura(string $identificacion)
    {
        try {
            $facturaModel = $this->findFacturaByCodigo($identificacion);
            $facturaEntities = EntityToModel::factura_model_to_entity($facturaModel);
            $facturaEntities->delete();
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario que desea eliminar con la indentificacion $identificacion no existe.");
        }
    }
    public function count(): int
    {
        return FacturaEntity::count();
    }
}
