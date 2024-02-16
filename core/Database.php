<?php

ini_set('display_errors', 'On');

class Database{

    private static $database;
    private $connection;
    private $config = [];

    private function __construct(){
        $this->config = $this->obtenerConfiguracion();
        $this->connection = $this->connect();
    }

    private function obtenerConfiguracion(){
        $json_file = file_get_contents('../config/db-conf.json');
        $config = json_decode($json_file, true);

        return $config;
    }

    private function connect(){
        $db = new PDO("mysql:host=".$this->config['host'].";dbname=".$this->config['db_name'].";charset=utf8",
            $this->config['user'],
            $this->config['password']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public static function getInstance(){
        if (!self::$database){
            self::$database = new self();
        }

        return self::$database;
    }

    public function getConnection(){
        return $this->connection;
    }

}

?>