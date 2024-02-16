<?php

class FacturaDTO implements JsonSerializable{
    private $idFactura;
    private $idCliente;
    private $metodoPago;
    private $total;
    

    public function __construct($idFactura, $idCliente, $metodoPago, $total) {
        $this->idFactura = $idFactura;
        $this->idCliente = $idCliente;
        $this->metodoPago = $metodoPago;
        $this->total = $total;
    }

    public function jsonSerialize():mixed{
        return get_object_vars($this);
    }

    public function getIdFactura() {
        return $this->idFactura; 
    }
    public function getIdCliente() {
        return $this->idCliente; 
    }
    public function getMetodoPago() {
        return $this->metodoPago; 
    }
    public function getTotal() {
        return $this->total; 
    }

}

?>