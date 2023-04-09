<?php

namespace App\Controllers;

use Psr\Http\Message\{ResponseInterface as Response,ServerRequestInterface as Request};
use App\DAO\AnuncioDAO;
use App\Models\AnuncioModel;
use DateTime;

final class AnuncioController{

    public function allAnuncios(Request $request, Response $response, $args): Response{

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->allAnuncio();
        $response = $response->withJson($anuncios);
        return $response;

    }

    public function inserirAnuncios(Request $request, Response $response, $args): Response{
        $data = $request->getParsedBody();
        $anuncio_model = new AnuncioModel();
        $anuncioDAO = new AnuncioDAO();
        $time = new DateTime();
 
        $anuncio_model
        ->setIdUsuario($data['id_usuario'])
        ->setTitulo($data['titulo'])
        ->setDescricao($data['descricao'])
        ->setprice($data['price'])
        ->setCriadoEm($time->format('Y-m-d H:i:s'))
        ->setAtualizadoEm($time->format('Y-m-d H:i:s'));

        $anuncioDAO->inserirAnuncio($anuncio_model);

        $response = $response->withJson(['menssge' => "sucess"]);

        return $response;
    }

    public function getAnuncioById(Request $request, Response $response, $args): Response{
        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->getAnuncioById(3);
        $response = $response->withJson($anuncios);
        return $response;
    }

    public function deletarAnuncio(Request $request, Response $response, $args): Response{
        $data = $request->getParsedBody();
        $anuncioDAO = new AnuncioDAO();
        $anuncioDAO->deletarAnuncio($data['id']);
        $response = $response->withJson(['menssage' => 'sucess']);
        return $response;
    }

}