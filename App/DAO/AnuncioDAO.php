<?php

namespace App\DAO;

use App\Models\AnuncioModel;

class AnuncioDAO extends Conexao{

    public function __construct(){
        parent::__construct();
    }

    public function anuncioPesquisa($pesquisa){
        $anuncios = $this->pdo
        ->query("SELECT * FROM anuncios as a 
        inner join 
        usuarios as u 
        on a.id_usuario = u.id
        WHERE
        titulo LIKE '%$pesquisa%' OR
        preco LIKE '%$pesquisa%' OR
        localizacao LIKE '%$pesquisa%' OR
        cep LIKE '%$pesquisa%'
        ;")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }
    public function allAnuncio(){
        $anuncios = $this->pdo
        ->query("SELECT * FROM anuncios as a inner join usuarios as u on a.id_usuario = u.id GROUP BY a.id DESC;")
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
                :atualizado_em
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
}