<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Libs/Orm/Config.php";

class UsuarioEntity extends ActiveRecord\Model{
    public static $table_name = "Usuarios";
    public static $primary_key = "identificacion";
}