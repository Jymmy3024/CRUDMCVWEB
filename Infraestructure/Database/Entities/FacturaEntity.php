<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Libs/Orm/Config.php";

class FacturaEntity extends ActiveRecord\Model{
     static string $table_name = 'facturas';
     static string $primary_key = 'codigo'; 
}