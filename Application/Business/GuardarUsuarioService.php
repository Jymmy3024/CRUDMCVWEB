<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/Application/Contracts/IGuardarUsuarioService.php";

class GuardarUsuarioService implements IGuardarUsuarioService
{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function guardarUsuario(UsuarioModel $usuario) : int
    {
        $this->usuarioRepository->createUser($usuario);
        return $this->usuarioRepository->count();
    }
}
?>

