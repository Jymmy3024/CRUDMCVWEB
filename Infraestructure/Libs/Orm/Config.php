<?php
require_once __DIR__."/php-activerecord/ActiveRecord.php";
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Entities");
    $cfg->set_connections(array(
        'development' => 'mysql://root:@localhost/bd_crud_mvc'));
});