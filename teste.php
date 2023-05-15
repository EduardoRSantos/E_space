<?php

require_once './App/DAO/conexao.php';

use App\DAO\Conexao;

class teste extends Conexao{

    public function __construct(){
      parent::__construct();
    }



public function teste123(){
$anuncios = $this->pdo
        ->query("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        GROUP BY anuncios.id
        HAVING autorizacao = 1
        ORDER BY anuncios.id DESC")
        ->fetchAll(\PDO::FETCH_ASSOC);
var_dump($anuncios);
}

}

$teste = new teste();
$teste->teste123();