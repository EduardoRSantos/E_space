<?php

namespace App\DAO;

class UploadImagensDAO extends Conexao {

    public function __construct(){
        parent::__construct();
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
        $stmt = $this->pdo->prepare("INSERT INTO imagens_de_anucios
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

    public function getImageById($id_usuario): array{
        $stmt = $this->pdo->prepare("SELECT * FROM imagens_de_usuarios WHERE id_usuario = :id_usuario ORDER BY id DESC LIMIT 1;");
        $stmt->bindParam('id_usuario',$id_usuario);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
        return $result;
    }



}

