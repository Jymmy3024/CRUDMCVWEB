<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";

interface IUsuarioRepository{
    public function create(UsuarioModel $usuario): int;
    public function update(UsuarioModel $usuario);
    public function delete($id);
    public function find($id);
    public function findAll();
    public function findByEmail($email);
}