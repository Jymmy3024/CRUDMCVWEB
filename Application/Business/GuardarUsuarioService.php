<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Exceptions/EntityPreexistingException.php";

class GuardarUsuarioService implements IGuardarUsuarioService
{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function guardarUsuario(UsuarioModel $usuario) : int
    {
        try{
            return $this->usuarioRepository->createUser($usuario);
        }catch(EntityPreexistingException $e)
        {
            throw $e;
        }
        
        
    }
}
?>

