<?php

class factura {

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

    public function getIdFactura() {
        return $this->idFactura; 
    }
    public function setIdFactura($factura){
        $this->factura = $factura;
    }
    public function getIdCliente() {
        return $this->idCliente; 
    }
    public function setTipo($idCliente){
        $this->idCliente = $idCliente;
    }
    public function getMetodoPago() {
        return $this->metodoPago; 
    }
    public function setMetodoPago($metodoPago){
        $this->metodoPago = $metodoPago;
    }
    public function getTotal() {
        return $this->total; 
    }
    public function setTotal($total){
        $this->total = $total;
    }

    public function __toString(){
        return "".$this->idFactura." ".$this->idCliente." ".$this->metodoPago." ".$this->total;
    }

}

?>