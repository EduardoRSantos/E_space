<?php

namespace App\DAO;
use PDO;
abstract class Conexao{
 
    protected $pdo;

    public function __construct(){

        $host = $_ENV["DB_HOST"];
        $port = $_ENV["DB_PORT"];
        $user = $_ENV["DB_USER"];
        $pass = $_ENV["DB_PASS"];
        $dbname = $_ENV["DB_NAME"];

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}