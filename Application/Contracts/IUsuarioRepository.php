<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";

interface IUsuarioRepository{
    public function createUser(UsuarioModel $usuario): int;
    public function updateUser(UsuarioModel $usuario);
    public function deleteUser(string $identificacion);
    public function findUserByIdentificacion(string $identificacion) : UsuarioModel;
    public function getAllUsers() : array;
    public function count() :int;
}