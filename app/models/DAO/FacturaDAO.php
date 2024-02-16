<?php

require '../../core/Database.php';
require '../DTO/FacturaDTO.php';

class FacturaDAO{
    
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getById($id){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM facturas WHERE idFactura = ".$id;
        $statement = $connection->query($query);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $facturaDTO = new FacturaDTO(
            $result['idFactura'],
            $result['idCliente'],
            $result['metodoPago'],
            $result['total']
        );
        return $facturaDTO;
    }
    
    public function getAll(){
        $connection = $this->db->getConnection();
        $query = "SELECT * FROM facturas";
        $statement = $connection->query($query);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $facturasDTO = array();

        for($i = 0; $i<count($result); $i++){
            $fila = $result[$i];

            $facturaDTO = new FacturaDTO(
                $fila['idFactura'],
                $fila['idCliente'],
                $fila['metodoPago'],
                $fila['total']
            );
            $facturasDTO[]=$facturaDTO;
        }

        return $facturasDTO;
    }
    public function insert($factura){
        $connection = $this->db->getConnection();
        $query = "INSERT INTO facturas (idFactura, idCliente, metodoPago, total) VALUES (".$factura->getIdFactura().", ".$factura->getIdCliente().", ".$factura->getMetodoPago().", ".$factura->getTotal().")";
        $statement = $connection->prepare($query);
        $statement ->execute();
    }
    public function update($factura){
        $connection = $this->db->getConnection();
        $query = "UPDATE facturas SET idCliente = ".$factura->getIdCliente().", metodoPago = ".$factura->getMetodoPago().", total = ".$factura->getTotal()." WHERE idFactura = ".$factura->getIdFactura();
        $statement = $connection->prepare($query);
        $statement ->execute();
    }
    public function delete($id){
        $connection = $this->db->getConnection();
        $query = "DELETE FROM facturas SET WHERE idFactura = ".$id;
        $statement = $connection->prepare($query);
        $statement ->execute();
    }
}

?>