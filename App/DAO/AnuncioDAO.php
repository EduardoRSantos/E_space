<?php

namespace App\DAO;

use App\Models\AnuncioModel;

class AnuncioDAO extends Conexao{

    public function __construct(){
        parent::__construct();
    }

    public function allAnuncio(){
        $anuncios = $this->pdo
        ->query("SELECT * FROM anuncios")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }

    public function inserirAnuncio(AnuncioModel $anuncio_model): void {
        $stmt = $this->pdo->prepare("INSERT INTO anuncios
            VALUES
            (
                default,
                :id_usuario,
                :titulo,
                :descricao,
                :price,
                :criado_em,
                :atualizado_em
            )
        ;");
        $stmt->execute([
            'id_usuario' => $anuncio_model->getIdUsuario(),
            'titulo' => $anuncio_model->getTitulo(),
            'descricao' => $anuncio_model->getDescricao(),
            'price' => $anuncio_model->getPrice(),
            'criado_em' => $anuncio_model->getCriadoEm(),
            'atualizado_em' => $anuncio_model->getAtualizadoEm()
        ]);
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
            price = :price,
            atualizado_em = :atualizado_em
            WHERE
            id = :id
        ;");
        $stmt->execute([
            'titulo' => $anuncio_model->getTitulo(),
            'descricao' => $anuncio_model->getDescricao(),
            'price' => $anuncio_model->getPrice(),
            'atualizado_em' => $anuncio_model->getAtualizadoEm(),
            'id' => $anuncio_model->getId()
        ]);
    }
}