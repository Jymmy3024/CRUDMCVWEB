<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";

interface IEditarFacturaService
{
    public function EditarFactura(FacturaModel $factura);
}