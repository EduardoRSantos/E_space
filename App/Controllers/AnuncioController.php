<?php


namespace App\Controllers;

use Psr\Http\Message\{ResponseInterface as Response, ServerRequestInterface as Request};
use App\DAO\{AnuncioDAO, ImagensDAO};
use App\Models\AnuncioModel;
use DateTime;
use DateTimeZone;

final class AnuncioController
{

    
    public function anunciosById(Request $request, Response $response, $args): Response{

        $anuncioDAO = new AnuncioDAO();
        $anuncio_destaque0 = $anuncioDAO->anunciosById(19);
        $anuncio_destaque1 = $anuncioDAO->anunciosById(20);
        $anuncio_destaque2 = $anuncioDAO->anunciosById(21);
        $anuncio_destaque3 = $anuncioDAO->anunciosById(22);
        $anuncio_destaque4 = $anuncioDAO->anunciosById(23);
        $anuncio_destaque5 = $anuncioDAO->anunciosById(37);
        

        $body = array_merge($anuncio_destaque0, $anuncio_destaque1, $anuncio_destaque2, $anuncio_destaque3, $anuncio_destaque4, $anuncio_destaque5);

        $response = $response->withJson($body);
        return $response;
    }
    public function anuncioAtualizar(Request $request, Response $response, $args): Response{
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $anuncioDAO = new AnuncioDAO();
        $anuncio_model = new AnuncioModel();
        $time = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $anuncio_model->setId($data['id'])
        ->setTitulo($data['titulo'])
        ->setDescricao($data['descricao'])
        ->setPreco($data['preco'])
        ->setLocalizacao($data['localizacao'])
        ->setCep($data['cep'])
        ->setNumero($data['numero'])
        ->setQuantidadePessoas($data['quantidade_pessoas'])
        ->setAtualizadoEm($time->format('Y-m-d H:i:s'));

        $result = $anuncioDAO->anuncioAtualizar($anuncio_model);
        if($result){
            $response = $response->withStatus(200);
        }else {
            $response = $response->withStatus(404);
        }
        return $response;
    }

    public function deletarAnuncio(Request $request, Response $response, $args): Response{
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $anuncioDAO = new AnuncioDAO();
        $imagensDAO = new ImagensDAO();
        $anuncioDAO->deletarAnuncio($data['id']);
        $imagensDAO->deleteImagensAnuncio($data['id']);
        
        return $response;
    }

    public function getAnuncioUsuario(Request $request, Response $response, $args): Response{
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        $id = $data['id'];

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->getAnuncioUsuario($id);
        $response = $response->withJson($anuncios);
        return $response;
    }

    public function avaliacaoAnuncio(Request $request, Response $response, $args): Response
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $anuncioDAO = new AnuncioDAO();
        $imagensDAO = new ImagensDAO();
        if ($data['avaliacao'] == 'delete') {
            $anuncioDAO->deletarAnuncio($data['id']);
            $imagensDAO->deleteImagensAnuncio($data['id']);
            $response = $response->withStatus(200);
        } else if ($data['avaliacao'] == 'aceitar') {
            $anuncioDAO->avaliacaoAceita($data['id']);
            $response->withStatus(200);
        } else {
            $response = $response->withStatus(404);
        }

        return $response;
    }
    public function pesquisa(Request $request, Response $response, $args): Response
    {
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);
        $pesquisar = $data['pesquisar'];
        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->anuncioPesquisa($pesquisar);
        $response = $response->withJson($anuncios);
        
        return $response;
    }

    public function allAnuncios(Request $request, Response $response, $args): Response
    {

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->allAnuncioAvaliado();
        if (count($anuncios) > 0 && $anuncios[0]['autorizacao'] == 1) {
            $response = $response->withJson($anuncios);
        }
        return $response;
    }
    public function allAnunciosAvaliar(Request $request, Response $response, $args): Response
    {

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->allAnuncioAvaliar();
        if (count($anuncios) > 0 && $anuncios[0]['autorizacao'] == 0) {
            $response = $response->withJson($anuncios);
        }
        return $response;
    }

    public function inserirAnuncios(Request $request, Response $response, $args): Response
    {
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);

        $anuncio_model = new AnuncioModel();
        $anuncioDAO = new AnuncioDAO();
        $upload_imagen = new ImagensDAO();

        $time = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        $id = 0;
        for ($i = 1; $i < count($data); $i++) {
            if ($i == 1) {
                $anuncio_model
                    ->setIdUsuario($data[0]['id_usuario'])
                    ->setTitulo($data[0]['titulo'])
                    ->setDescricao($data[0]['descricao'])
                    ->setpreco($data[0]['preco'])
                    ->setLocalizacao($data[0]['localizacao'])
                    ->setCep($data[0]['cep'])
                    ->setNumero($data[0]['numero'])
                    ->setQuantidadePessoas($data[0]['quantidade_pessoas'])
                    ->setCriadoEm($time->format('Y-m-d H:i:s'))
                    ->setAtualizadoEm($time->format('Y-m-d H:i:s'));
                $id = $anuncioDAO->inserirAnuncio($anuncio_model);
            }
            if ($id == 0) {
                $response = $response->withStatus(403);
                return $response;
            }
            $upload_imagen->inserirImagenAnuncio($id, $data["imagem" . $i], $time->format('Y-m-d H:i:s'));
        }

        $response = $response->withStatus(200);

        return $response;
    }

    

}
