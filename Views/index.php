<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Application/Contracts/IUsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Infraestructure/Repositories/UsuarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/crudmvcweb/Controllers/UsuarioController.php";
$usuarioRepository = new UsuarioRepository(); 
$controller = new UsuarioController($usuarioRepository);

    $accion = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "listar";
        switch ($accion) {
            case "listar":
                $controller->listarUsuarios();
                break;
            case "guardar":
                $controller->guardarUsuario();
                break;
            default:
                $controller->listarUsuarios();
                break;
        }