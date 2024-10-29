<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/FacturaModel.php";

interface IBuscarFacturaService{
    public function buscarFactura(string $identificacion) : FacturaModel;
}