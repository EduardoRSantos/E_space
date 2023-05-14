<?php

$host = getenv('E_SPACE_HOST');
$port = getenv('E_SPACE_PORT');
$user = getenv('E_SPACE_USER');
$pass = getenv('E_SPACE_PASSWORD');
$dbname = getenv('E_SPACE_DBNAME');

$dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

$pdo = new PDO($dsn, $user, $pass);
$pdo->setAttribute(
    \PDO::ATTR_ERRMODE,
    \PDO::ERRMODE_EXCEPTION
);


$anuncios = $pdo
        ->query("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        GROUP BY anuncios.id
        HAVING autorizacao = 1
        ORDER BY anuncios.id DESC")
        ->fetchAll(\PDO::FETCH_ASSOC);
var_dump($anuncios);