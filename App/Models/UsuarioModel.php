<?php

namespace App\Models;

final class UsuarioModel {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $nascimento;
    
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome): self {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail(): string {
        return $this->email;
    }
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    public function getSenha(): string {
        return $this->senha;
    }
    public function setSenha(string $senha): self {
        $this->senha = $senha;
        return $this;
    }
    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone): self {
        $this->telefone = $telefone;
        return $this;
    }

    public function getNascimento(){
        return $this->nascimento;
    }

    public function setNascimento($nascimento): self {
        $this->nascimento = $nascimento;
        return $this;
    }
}