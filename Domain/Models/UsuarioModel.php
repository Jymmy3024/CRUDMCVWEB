<?php
class UsuarioModel{
    private string $identificacion;
    private string $nombre;
    private string $email;
    private string $clave;

    public function __construct(string $identificacion, string $nombre, string $email, string $clave = null){
        if($identificacion === null || empty(trim($identificacion))){
            throw new InvalidArgumentException("La identificacion del usuario es requerida");
        }
        if($nombre === null || empty(trim($nombre))){
            throw new InvalidArgumentException("El nombre del usuario es requerido");
        }
        if($email === null ||empty(trim($email))){
            throw new InvalidArgumentException("El email del usuario es requerido");
        }

        $resultadoValidacion = $this->validarClave($clave);
        if(!$resultadoValidacion["resultado"]){
            throw new InvalidArgumentException($resultadoValidacion["mensaje"]);
        }
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
    }

    public function validarClave(string $clave):array{
        if(empty(trim($clave))){
            $message = "La clave del usuario es requerida";
            return array("resultado" => false, "mensaje" => $message);
        }
        if(strlen($clave) < 8){
            $message = "La clave debe tener al menos 8 caracteres";
            return array("resultado" => false, "mensaje" => $message);
        }

        return array("resultado" => true, "mensaje" => "Clave valida");
    }

    public function getIdentificacion():string{
        return $this->identificacion;
    }

    public function setIdentificacion(string $identificacion){
        $this->identificacion = $identificacion;
    }

    public function getNombre():string{
        return $this->nombre;
    }
    
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getClave():string{
        return $this->clave;
    }

    public function setClave(string $clave){
        $this->clave = $clave;
    }
}