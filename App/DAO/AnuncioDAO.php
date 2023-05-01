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
        GROUP BY anuncios.id
		HAVING anuncios.titulo LIKE '%$pesquisar%' OR
        anuncios.cep  LIKE '%$pesquisar%' OR 
        anuncios.preco  LIKE '%$pesquisar%' OR
        anuncios.localizacao  LIKE '%$pesquisar%' OR
        quantidade_pessoas LIKE '%$pesquisar%' &&
        autorizacao = 1;")
        ->fetchAll(\PDO::FETCH_ASSOC);
        return $anuncios;
    }
    public function getAnuncioUsuario($id): array{
        $stmt = $this->pdo
        ->prepare("SELECT anuncios.*, usuarios.nome, usuarios.telefone, GROUP_CONCAT(imagens_de_anuncios.path SEPARATOR ';') AS imagens
        FROM anuncios
        JOIN usuarios ON anuncios.id_usuario = usuarios.id
        JOIN imagens_de_anuncios ON anuncios.id = imagens_de_anuncios.id_anuncio
        WHERE id_usuario = :id
        GROUP BY anuncios.id");
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $usuarios;
    }
    public function allAnuncioAvaliado(): array{
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
    public function allAnuncioAvaliar(): array{
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

    public function deletarAnuncio($id): void{
        $stmt = $this->pdo->prepare("DELETE FROM anuncios
            where
            id = :id;      
        ");
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
    
    public function avaliacaoAceita($id): void{
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