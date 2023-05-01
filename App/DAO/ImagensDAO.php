<?php

namespace App\DAO;

class ImagensDAO extends Conexao {

    public function __construct(){
        parent::__construct();
    }


    public function deleteImagensAnuncio($id_anuncio){
        $stmt = $this->pdo->prepare("DELETE FROM imagens_de_anuncios
        where
        id_anuncio = :id;      
    ");
    $stmt->bindParam('id', $id_anuncio);
    $stmt->execute();
    }
    public function inserirImagenPerfil($id_usuario, $path, $data_upload): bool{
        $stmt = $this->pdo->prepare("INSERT INTO imagens_de_usuarios
            VALUES
            (
                null,
                :id_usuario,
                :path,
                :data_upload
            )
        ;");
        $result = $stmt->execute([
            'id_usuario' => $id_usuario,
            'path' => $path,
            'data_upload' => $data_upload
        ]);
        if($result)
            return true;
            
        return false;
    }

    public function inserirImagenAnuncio($id_anuncio, $path, $data_upload): bool{
        $stmt = $this->pdo->prepare("INSERT INTO imagens_de_anuncios
        VALUES
        (
            null,
            :id_usuario,
            :path,
            :data_upload
        )
    ;");
    $result = $stmt->execute([
        'id_usuario' => $id_anuncio,
        'path' => $path,
        'data_upload' => $data_upload
    ]);
    if($result)
        return true;
        
    return false;
    }

    public function getImageUsuarioById($id_usuario): array{
        $stmt = $this->pdo->prepare("SELECT * FROM imagens_de_usuarios WHERE id_usuario = :id_usuario ORDER BY id DESC LIMIT 1;");
        $stmt->bindParam('id_usuario',$id_usuario);
        $stmt->execute();
        $imagem = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        return $imagem;
    }

    public function getImageAnuncioById($id_anuncio): array{
        $stmt = $this->pdo->prepare("SELECT * FROM imagens_de_anuncios WHERE id_anuncio = :id_anuncio;");
        $stmt->bindParam('id_anuncio',$id_anuncio);
        $stmt->execute();
        $imagem_anuncio = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        return $imagem_anuncio;
    }

}

