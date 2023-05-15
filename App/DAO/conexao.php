<?php

namespace App\DAO;
use PDO;
abstract class Conexao{
 
    protected $pdo;

    public function __construct(){

        $host = getenv('E_SPACE_HOST');
        $port = getenv('E_SPACE_PORT');
        $user = getenv('E_SPACE_USER');
        $pass = getenv('E_SPACE_PASSWORD');
        $dbname = getenv('E_SPACE_DBNAME');

        // $host = getenv('E_SPACE_HOST');
        // $port = getenv('E_SPACE_PORT');
        // $user = getenv('E_SPACE_USER');
        // $pass = "";
        // $dbname = getenv('E_SPACE_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}