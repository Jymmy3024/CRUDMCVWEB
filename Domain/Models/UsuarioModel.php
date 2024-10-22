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
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
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
}