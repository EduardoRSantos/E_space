<?php

namespace App\DAO;
use App\Models\UsuarioModel;

class UsuariosDAO extends Conexao{

    public function __construct(){
        parent::__construct();

    }



    
    public function getUsuarioByEmail(string $email): ?UsuarioModel{
        $stmt = $this->pdo->prepare('SELECT 
            id,
            nome,
            email,
            senha,
            telefone
            FROM usuarios
            where email = :email
        ');
        $stmt->bindParam('email',$email);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if(count($usuarios) === 0)
            return null;
        $usuario = new UsuarioModel();
        $usuario->setId($usuarios[0]['id'])
            ->setNome($usuarios[0]['nome'])
            ->setEmail($usuarios[0]['email'])
            ->setSenha($usuarios[0]['senha'])
            ->setTelefone($usuarios[0]['telefone']);
        return $usuario;

    }

    public function allUsuarios(): array{
        $user = $this->pdo
            ->query("SELECT * FROM usuarios")
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function inserirUsuario(UsuarioModel $user): void{
        $stmt = $this->pdo
        ->prepare('INSERT INTO usuarios VALUES(
            null,
            :nome,
            :email,
            :senha,
            :telefone
        );');
        $stmt->execute([
            'nome' => $user->getNome(),
            'senha' => $user->getSenha(),
            'email' => $user->getEmail(),
            'telefone' => $user->getTelefone()
        ]);   
    }

    public function atualizarUsuario(UsuarioModel $user): void {
        $stmt = $this->pdo
        ->prepare('UPDATE usuarios SET
            nome = :nome,
            telefone = :telefone
            WHERE id = :id;
        ');
        $stmt->execute([
            'nome' => $user->getNome(),
            'telefone' => $user->getTelefone(),
            'id' => $user->getId()
        ]);
    }
}