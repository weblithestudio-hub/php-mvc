<?php

class Database {

    private static $instance = null;

    private $connection;

    public function __construct(){

        $config = require base_path('config/config.php');

        $dbConfig = $config['database'];

        $host = $dbConfig['host'];
        $dbname = $dbConfig['database'];
        $username = $dbConfig['username'];
        $password = $dbConfig['password'];
        $port = $dbConfig['port'];
        $charset = $dbConfig['charset'];

        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset};port={$port}";

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database failed: " . $e->getMessage());
        }


    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new Database();
        }
    }

    public function getConnection(){
        return $this->connection;
    }

    private function __clone(){}

    public function __wakeup(){}

}