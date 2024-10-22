<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/Domain/Models/UsuarioModel.php";

interface IGuardarUsuarioService{
    public function guardarUsuario(UsuarioModel $usuario) :int;
}