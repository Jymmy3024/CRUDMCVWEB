<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Business/GuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IBuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IListarUsuariosService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Business/ListarUsuariosService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Database/Entities/UsuarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Repositories/UsuarioRepository.php";

class UsuarioController{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function guardarUsuario(): void
    {
        try{
            $identificacion = $_POST["identificacion"];
            $nombre = $_POST["nombre"];
            $email = $_POST["email"];
            $clave = $_POST["clave"];

            $usuarioModel = new UsuarioModel($identificacion, $nombre, $email, $clave);
            $guardarUsuarioService = new GuardarUsuarioService($this->usuarioRepository);
            $total = $guardarUsuarioService->guardarUsuario($usuarioModel);
            $message = "Usuario guardado correctamente. Total = $total";
            header("Location: ../Views/Forms/Usuarios/create.php?message=$message");
        }catch(Exception $e){
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Usuarios/create.php?ErrorMessage=$message");
        }
    }

    public function index(){
        header("Location: ../Views/Forms/Usuarios/create.php");
    }

    public function listarUsuarios()
    {
        $listarUsuariosService = new ListarUsuariosService($this->usuarioRepository);
        $usuarios = $listarUsuariosService->listarUsuarios();
        require_once '../Views/Forms/Usuarios/listar.php';
    }

}
