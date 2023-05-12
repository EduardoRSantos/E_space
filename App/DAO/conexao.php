<?php

namespace App\DAO;
use PDO;
abstract class Conexao{
 
    protected $pdo;

    public function __construct(){

        $host = "containers-us-west-147.railway.app";
        $port = "6602";
        $user = "root";
        $pass = "IpCJ3MdhZrQBSa7wyTi5";
        $dbname = "railway";

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}