<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Libs/Orm/Config.php";

class UsuarioEntity extends ActiveRecord\Model{
     static string $table_name = 'usuarios';
     static string $primary_key = 'identificacion'; 
}