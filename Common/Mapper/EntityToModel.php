<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Database/Entities/UsuarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
class EntityToModel{
    public static function usuario_entity_to_model(UsuarioEntity $usuario_entity): UsuarioModel{
        $usuario_model = new UsuarioModel(
            $usuario_entity->identificacion,
            $usuario_entity->nombre,
            $usuario_entity->email,
            $usuario_entity->clave
        );
        return $usuario_model;
    }

    public static function usuario_model_to_entity(UsuarioModel $usuario_model): UsuarioEntity{
        $usuario_entity = new UsuarioEntity();
        $usuario_entity->identificacion = $usuario_model->getIdentificacion();
        $usuario_entity->nombre = $usuario_model->getNombre();
        $usuario_entity->email = $usuario_model->getEmail();
        $usuario_entity->clave = $usuario_model->getClave();

        return $usuario_entity;
    }
}
