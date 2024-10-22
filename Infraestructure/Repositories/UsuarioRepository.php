<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Entities/UsuarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Business/Contracts/IUsuarioRepository.php";
class UsuarioRepository implements IUsuarioRepository
{
    public function getAll()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->getAll();
        return $usuarios;
    }

    public function getById($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->getById($id);
        return $usuario;
    }

    public function insert(UsuarioEntity $usuario)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->insert($usuario);
    }

    public function update(UsuarioEntity $usuario)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->update($usuario);
    }

    public function delete($id)
    {
        $usuarioModel = new UsuarioModel();
        $usuarioModel->delete($id);
    }
}
?>
