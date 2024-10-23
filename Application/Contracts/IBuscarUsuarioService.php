<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";

interface IBuscarUsuarioService{
    public function buscarUsuario(string $identificacion) : UsuarioModel;
}