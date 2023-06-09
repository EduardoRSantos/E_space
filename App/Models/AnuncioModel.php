<?php

namespace App\Models;


final class AnuncioModel
{

    private $id;
    private $id_usuario;
    private $titulo;
    private $descricao;
    private $preco;
    private $localizacao;
    private $cep;
    private $numero;
    private $quantidade_pessoas;
    private $criado_em;
    private $atualizado_em;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }
    public function getPreco()
    {
        return $this->preco;
    }
    public function setPreco($preco)
    {
        $this->preco = $preco;
        return $this;
    }
    public function getLocalizacao(){
        return $this->localizacao;
    }
    public function setLocalizacao($localizacao){
        $this->localizacao = $localizacao;
        return $this;
    }
    public function getCep()
    {
        return  $this->cep;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
        return $this;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }
    public function getQuantidadePessoas(){
        return $this->quantidade_pessoas;
    }
    public function setQuantidadePessoas($quantidade_pessoas){
        $this->quantidade_pessoas = $quantidade_pessoas;
        return $this;
    }
    public function getCriadoEm()
    {
        return $this->criado_em;
    }
    public function setCriadoEm($criado_em)
    {
        $this->criado_em = $criado_em;
        return $this;
    }
    public function getAtualizadoEm()
    {
        return $this->atualizado_em;
    }
    public function setAtualizadoEm($atualizado_em)
    {
        $this->atualizado_em = $atualizado_em;
        return $this;
    }
}
