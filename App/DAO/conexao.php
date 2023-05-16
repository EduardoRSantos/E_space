<?php

namespace App\DAO;

use PDO;

abstract class Conexao
{

    protected $pdo;

    public function __construct()
    {

        $host = "mysql.espace.kinghost.net";
        $port = "3306";
        $user = "espace";
        $pass = "espace2710";
        $dbname = "espace";

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}
