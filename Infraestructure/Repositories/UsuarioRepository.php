<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Infraestructure/Database/Entities/UsuarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Common/Mapper/EntityToModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Exceptions/EntityNotFoundException.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crudmvcweb/Application/Exceptions/ENtityPreexistingException.php";
class UsuarioRepository implements IUsuarioRepository
{
    public function getAllUsers(): array
    {
        try {
            $usuariosEntities = UsuarioEntity::all();
            $usuariosModels = [];
            foreach ($usuariosEntities as $usuarioEntity) {
                $usuariosModels[] = EntityToModel::usuario_entity_to_model($usuarioEntity);
            }

            return $usuariosModels;
        } catch (Exception $e) {
            throw new Exception("No hay usuarios registrados: ".$e->getMessage());
        }
    }

    public function findUserByIdentificacion(string $identificacion): UsuarioModel
    {
        try {
            $usuario = UsuarioEntity::find($identificacion);
            $usuarioModel = EntityToModel::usuario_entity_to_model($usuario);
            return $usuarioModel;
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario con identificación $identificacion no existe.");
        }
    }

    public function createUser(UsuarioModel $usuario): int
    {
        try {
            $user = $this->findUserByIdentificacion($usuario->getIdentificacion());
            if ($user) {
                throw new EntityPreexistingException("El usuario con la indentificación " . $usuario->getIdentificacion() . " ya existe.");
            }
        } catch (EntityNotFoundException $e) {
            $usuarioEntity = EntityToModel::usuario_model_to_entity($usuario);
            $usuarioEntity->save();
            return $this->count();
        } catch (EntityPreexistingException $e) {
            throw $e;
        }
    }

    public function updateUser(UsuarioModel $usuario)
    {
        try {
            $usuarioModel = $this->findUserByIdentificacion($usuario->getIdentificacion());
            $usuarioEntity = EntityToModel::usuario_model_to_entity($usuarioModel);
            $usuarioEntity->save();
        } catch (EntityNotFoundException $e) {
            $message = "El usuario con cedula " . $usuario->getIdentificacion() . " no existe.";
            throw new EntityNotFoundException($message);
        }
    }

    public function deleteUser(string $identificacion)
    {
        try {
            $userModel = $this->findUserByIdentificacion($identificacion);
            $usuarioEntity = EntityToModel::usuario_model_to_entity($userModel);
            $usuarioEntity->delete();
        } catch (Exception $e) {
            throw new EntityNotFoundException("El usuario que desea eliminar con la indentificacion $identificacion no existe.");
        }
    }
    public function count(): int
    {
        return UsuarioEntity::count();
    }
}
