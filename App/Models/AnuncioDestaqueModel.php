<?php

namespace App\Models;


final class AnuncioDestaqueModel
{

    private $titulo;
    private $preco;
    private $imgUrl;

    public function __construct(){
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getImgUrl(){
        return $this->imgUrl;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
        return $this;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
        return $this;
    }
    public function setImgUrl($imgUrl) {
        $this->imgUrl = $imgUrl;
        return $this;
    }

}