<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IBuscarUsuarioService.php";

class BuscarUsuarioService implements IBuscarUsuarioService{
    private $usuarioRepository;
    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function buscarUsuario(string $identificacion): UsuarioModel
    {
        return $this->usuarioRepository->findUserByIdentificacion($identificacion);
    }
}