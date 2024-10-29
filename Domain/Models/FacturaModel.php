<?php
class FacturaModel{
    private string $codigo;
    private string $descripcion;
    private string $email;
    private string $clave;
    private string $idPedido;
    private DateTime $fechaFactura;
    private float $totalFactura;
    private string $metodoPago;
    private string $idCliente;  
    private float $descuento;

    public function __construct(string $codigo, string $descripcion, string $email, string $clave = null, string $idPedido,
    DateTime $fechaFactura, float $totalFactura, string $metodoPago, string $idCliente, float $descuento = 0.0){
        if($codigo === null || empty(trim($codigo))){
            throw new InvalidArgumentException("El codigo del usuario es requerida");
        }
        if($idPedido === null || $idPedido <=0){
            throw new InvalidArgumentException("El id del pedido es requerido");
        }
        if($email === null ||empty(trim($email))){
            throw new InvalidArgumentException("El email del usuario es requerido");
        }
        if($totalFactura === null || $totalFactura <=0){
            throw new InvalidArgumentException("El total de la factura es requerido");
        }

        if($idCliente === null || $idCliente <=0){
            throw new InvalidArgumentException("El id del cliente es requerido");
        }

        $resultadoValidacion = $this->validarClave($clave);
        if(!$resultadoValidacion["resultado"]){
            throw new InvalidArgumentException($resultadoValidacion["mensaje"]);
        }
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->email = $email;
        $this->clave = $clave;
        $this->idPedido = $idPedido;
        $this->fechaFactura = $fechaFactura;
        $this->totalFactura = $totalFactura;
        $this->metodoPago = $metodoPago;
        $this->idCliente = $idCliente;
        $this->descuento = $descuento;
    }

    public function validarClave(string $clave):array{
        if(empty(trim($clave))){
            $message = "La clave de la factura es requerida";
            return array("resultado" => false, "mensaje" => $message);
        }
        if(strlen($clave) < 8){
            $message = "La clave debe tener al menos 8 caracteres";
            return array("resultado" => false, "mensaje" => $message);
        }

        return array("resultado" => true, "mensaje" => "Clave valida");
    }

    public function getCodigo():string{
        return $this->codigo;
    }

    public function setCodigo(string $codigo){
        $this->codigo = $codigo;
    }

    public function getDescripcion():string{
        return $this->descripcion;
    }
    
    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
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

    public function getIdPedido():string{
        return $this->idPedido;
    }

    public function setIdPedido(int $idPedido){ 
        $this->idPedido = $idPedido;
    }

    public function getFechaFactura():DateTime{
        return $this->fechaFactura;
    }

    public function setFechaFactura(DateTime $fechaFactura){
        $this->fechaFactura = $fechaFactura;
    }

    public function getTotalFactura():float{
        return $this->totalFactura;
    }

    public function setTotalFactura(float $totalFactura){  
        $this->totalFactura = $totalFactura;
    }   

    public function getMetodoPago():string{
        return $this->metodoPago;
    }   

    public function setMetodoPago(string $metodoPago){
        $this->metodoPago = $metodoPago;
    }

    public function getIdCliente():string{
        return $this->idCliente;
    }

    public function setIdCliente(int $idCliente){
        $this->idCliente = $idCliente;
    }

    public function getDescuento():float{
        return $this->descuento;
    }

    public function setDescuento(float $descuento){
        $this->descuento = $descuento;
    }

}