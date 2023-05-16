<?php

$host = "mysql.espace.kinghost.net";
$port = "3306";
$user = "espace";
$pass = "espace2710";
$dbname = "espace";


$dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(
    \PDO::ATTR_ERRMODE,
    \PDO::ERRMODE_EXCEPTION
);

$user = $pdo
    ->query("SELECT * FROM usuarios")
    ->fetchAll(\PDO::FETCH_ASSOC);

var_dump($user);
