<?php


namespace App\Controllers;

use Psr\Http\Message\{ResponseInterface as Response,ServerRequestInterface as Request};
use App\DAO\{AnuncioDAO, UploadImagensDAO};
use App\Models\AnuncioModel;
use DateTime;
use DateTimeZone;

final class AnuncioController{
    
    public function allAnuncios(Request $request, Response $response, $args): Response{

        $anuncioDAO = new AnuncioDAO();
        $upload_imagen = new UploadImagensDAO();
        $anuncios = $anuncioDAO->allAnuncio();
        $response = $response->withJson($anuncios);
        return $response;

    }

    public function inserirAnuncios(Request $request, Response $response, $args): Response{
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);

        $anuncio_model = new AnuncioModel();
        $anuncioDAO = new AnuncioDAO();
        $time = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
 
        $anuncio_model
        ->setIdUsuario($data['id_usuario'])
        ->setTitulo($data['titulo'])
        ->setDescricao($data['descricao'])
        ->setpreco($data['preco'])
        ->setLocalizacao($data['localizacao'])
        ->setCep($data['cep'])
        ->setNumero($data['numero'])
        ->setQuantidadePessoas($data['quantidade_pessoas'])
        ->setCriadoEm($time->format('Y-m-d H:i:s'))
        ->setAtualizadoEm($time->format('Y-m-d H:i:s'));

        $anuncioDAO->inserirAnuncio($anuncio_model);

        $response = $response->withStatus(200);

        return $response;
        
    }

    public function getAnuncioById(Request $request, Response $response, $args): Response{
        $data = $request->getParsedBody();

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->getAnuncioById($data['id']);
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

    public function atualizarAnuncio(Request $request, Response $response, $args): Response{
        $data = $request->getParsedBody();
        $anuncioDAO = new AnuncioDAO();
        $anuncio_model = new AnuncioModel();
        $time = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        
        $anuncio_model
        ->setId($data['id'])
        ->setTitulo($data['titulo'])
        ->setDescricao($data['descricao'])
        ->setpreco($data['preco'])
        ->setAtualizadoEm($time->format('Y-m-d H:i:s'));

        $anuncioDAO->atualizarAnuncio($anuncio_model);
        $response = $response->withJson(['menssage' => 'sucess']);
        return $response;
    }

}