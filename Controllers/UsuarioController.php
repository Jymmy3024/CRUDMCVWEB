<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IGuardarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IBuscarUsuarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Domain/Models/UsuarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Database/Entities/UsuarioEntity.php";

class UsuarioController{
    private $usuarioRepository;

    public function __construct(IUsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function actionExecute(): void
    {
        $accion = $_REQUEST["action"];
        switch ($accion) {
            case "guardar":
                $this->guardarUsuario();
                break;
            case "buscar":
                //$this->buscarUsuario();
                break;
            default:
                break;
        }
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
            header("Location: ../Views/Forms/Usuarios/Create.php?message=$message");
        }catch(Exception $e){
            $message = $e->getMessage();
            header("Location: ../Views/Forms/Usuarios/Create.php?message=$message");
        }
    }

}