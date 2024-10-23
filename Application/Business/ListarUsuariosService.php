<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IListarUsuariosService.php";

class ListarUsuariosService implements IListarUsuariosService
{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function listarUsuarios(): array
    {
        return $this->usuarioRepository->getAllUsers();
    }
}