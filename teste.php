<?php

require_once './App/DAO/conexao.php';

use App\DAO\Conexao;

class teste extends Conexao{

    public function __construct(){
      parent::__construct();
    }



public function teste123(): array{
$anuncios = $this->pdo
        ->query("SELECT * FROM usuarios;")
        ->fetchAll(\PDO::FETCH_ASSOC);
return $anuncios;
}

}

$teste = new teste();
$anuncio = $teste->teste123();
var_dump($anuncio);