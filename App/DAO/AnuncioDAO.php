<?php

namespace App\DAO;

use App\Models\AnuncioModel;

class AnuncioDAO extends Conexao{

    public function __construct(){
        parent::__construct();
    }

    public function anuncioPesquisa($pesquisar){
        $anuncios = $this->pdo
        ->query("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        WHERE autorizacao = 1
        GROUP BY anuncios.id
		HAVING anuncios.titulo LIKE '%$pesquisar%' OR
        anuncios.cep  LIKE '%$pesquisar%' OR 
        anuncios.preco  LIKE '%$pesquisar%' OR
        anuncios.localizacao  LIKE '%$pesquisar%' OR
        quantidade_pessoas LIKE '%$pesquisar%' OR
        autorizacao = 1;")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }
    public function allAnuncioAvaliado(){
        $anuncios = $this->pdo
        ->query("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        GROUP BY anuncios.id
        HAVING autorizacao = 1
        ORDER BY anuncios.id DESC")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }
    public function allAnuncioAvaliar(){
        $anuncios = $this->pdo
        ->query("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        GROUP BY anuncios.id
        HAVING autorizacao = 0
        ORDER BY anuncios.id DESC")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }

    public function inserirAnuncio(AnuncioModel $anuncio_model): int {
        $stmt = $this->pdo->prepare("INSERT INTO anuncios
            VALUES
            (
                null,
                :id_usuario,
                :titulo,
                :descricao,
                :preco,
                :localizacao,
                :cep,
                :numero,
                :quantidade_pessoas,
                :criado_em,
                :atualizado_em,
                0
            )
        ;");
        $result = $stmt->execute([
            'id_usuario' => $anuncio_model->getIdUsuario(),
            'titulo' => $anuncio_model->getTitulo(),
            'descricao' => $anuncio_model->getDescricao(),
            'preco' => $anuncio_model->getPreco(),
            'localizacao' => $anuncio_model->getLocalizacao(),
            'cep' => $anuncio_model->getCep(),
            'numero' => $anuncio_model->getNumero(),
            'quantidade_pessoas' => $anuncio_model->getQuantidadePessoas(),
            'criado_em' => $anuncio_model->getCriadoEm(),
            'atualizado_em' => $anuncio_model->getAtualizadoEm()
        ]);
        $id = 0;
        if($result)
            $id = $this->pdo->lastInsertId();

        return $id;
    }

    public function getAnuncioById($id_usuario): array{
        $stmt = $this->pdo->prepare("SELECT * FROM anuncios 
            Where 
            id_usuario = :id_usuario;
        ");
        $stmt->bindParam('id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    public function deletarAnuncio($id): void{
        $stmt = $this->pdo->prepare("DELETE FROM anuncios
            where
            id = :id;      
        ");
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
    public function atualizarAnuncio(AnuncioModel $anuncio_model): void{
        $stmt = $this->pdo->prepare("UPDATE anuncios
            SET 
            titulo = :titulo, 
            descricao = :descricao,
            preco = :preco,
            atualizado_em = :atualizado_em
            WHERE
            id = :id
        ;");
        $stmt->execute([
            'titulo' => $anuncio_model->getTitulo(),
            'descricao' => $anuncio_model->getDescricao(),
            'preco' => $anuncio_model->getPreco(),
            'atualizado_em' => $anuncio_model->getAtualizadoEm(),
            'id' => $anuncio_model->getId()
        ]);
    }
    public function avaliacaoAceita($id){
        $stmt = $this->pdo->prepare("UPDATE anuncios
            SET
            autorizacao = 1
            WHERE
            id = :id
        ");
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
}