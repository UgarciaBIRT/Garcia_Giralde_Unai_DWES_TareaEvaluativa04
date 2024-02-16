<?php

    require 'HttpResponseGenerator.php';
    require '../models/DAO/FacturaDAO.php';
    require '../models/DTO/FacturaDTO.php';

    class Get{
        
        
        function __construct(){
        }

        function getAll(){
            $jsonDatos = json_decode(file_get_contents('datos.json', true));
            $generador = new HttpResponseGenerator();
            $mensaje = 'Devueltos todos los datos';
            return $generador->generateResponse(201, $jsonDatos, $mensaje);
        }

        function getById($id){
            $jsonDatos = json_decode(file_get_contents('datos.json', true));
            $generador = new HttpResponseGenerator();

            $data = null;
            foreach($jsonDatos->productos as $producto){
                if($producto->id == $id){
                    $data = $producto;
                }
            }

            if($data != null){
                $mensaje = "Devuelto el producto";
                $generador->generateResponse(200, $data, $mensaje);
            }else{
                $mensaje = "No existe el id";
                $generador->generateResponse(400, $data, $mensaje);
            }
        }

        function getAllFacturas(){
            $generador = new HttpResponseGenerator();
            $facturasDAO = new FacturaDAO();

            $data = $facturasDAO->getAll();
            $generador->generateResponse(200, $data, 'Obtenidos los datos correctamente');
        }

        function getAllFacturasById($id){
            $generador = new HttpResponseGenerator();
            $facturasDAO = new FacturaDAO();

            $data = $facturasDAO->getById($id);
            $generador->generateResponse(200, $data, 'Obtenidos los datos correctamente');
        }

    }

?>