<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";

interface IGuardarUsuarioService{
    public function guardarUsuario(UsuarioModel $usuario) :int;
}