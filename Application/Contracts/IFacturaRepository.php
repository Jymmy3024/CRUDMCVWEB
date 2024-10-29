<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";

interface IFacturaRepository{
    public function createFactura(FacturaModel $factura): int; 
    public function updateFactura(FacturaModel $factura);
    public function deleteFactura(string $codigo);
    public function findFacturaByCodigo(string $codigo) : FacturaModel;
    public function getAllFacturas() : array;
    public function count() :int;
}