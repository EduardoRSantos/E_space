<?php

namespace App\Models;


final class AnuncioModel{
    private $id_usuario;
    private $titulo;
    private $descricao;
    private $price;
    private $criado_em;
    private $atualizado_em;

    public function getIdUsuario(): int{
        return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario): self{
        $this->id_usuario = $id_usuario;
        return $this;
    }

    public function getTitulo(): string{
        return $this->titulo;
    }
    public function setTitulo($titulo): self{
        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }
    public function setDescricao($descricao): self{
        $this->descricao = $descricao;
        return $this;
    }
    
}