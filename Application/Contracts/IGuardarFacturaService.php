<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";

interface IGuardarFacturaService{
    public function guardarFactura(FacturaModel $facturaModel) :int;
}