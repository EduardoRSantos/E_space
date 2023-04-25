<?php


namespace App\Controllers;

use Psr\Http\Message\{ResponseInterface as Response, ServerRequestInterface as Request};
use App\DAO\{AnuncioDAO, UploadImagensDAO};
use App\Models\AnuncioModel;
use DateTime;
use DateTimeZone;

final class AnuncioController
{
    public function pesquisa(Request $request, Response $response, $args): Response
    {
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);

        $pesquisa = $data['pesquisa'];
        $anuncioDAO = new AnuncioDAO();

        $anuncios = $anuncioDAO->anuncioPesquisa($pesquisa);
        $response = $response->withJson($anuncios);
        return $response;
    }

    public function allAnuncios(Request $request, Response $response, $args): Response
    {

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->allAnuncio();
        $response = $response->withJson($anuncios);
        return $response;
    }

    public function inserirAnuncios(Request $request, Response $response, $args): Response
    {
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);

        $anuncio_model = new AnuncioModel();
        $anuncioDAO = new AnuncioDAO();
        $upload_imagen = new UploadImagensDAO();

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
            if ($id == 0){
                $response = $response->withStatus(403);
                return $response;
            }
            $upload_imagen->inserirImagenAnuncio($id, $data["imagem" . $i], $time->format('Y-m-d H:i:s'));
        }

        $response = $response->withStatus(200);

        return $response;
    }

    public function getAnuncioById(Request $request, Response $response, $args): Response
    {
        $data = $request->getParsedBody();

        $anuncioDAO = new AnuncioDAO();
        $anuncios = $anuncioDAO->getAnuncioById($data['id']);
        $response = $response->withJson($anuncios);
        return $response;
    }

    public function deletarAnuncio(Request $request, Response $response, $args): Response
    {
        $data = $request->getParsedBody();
        $anuncioDAO = new AnuncioDAO();
        $anuncioDAO->deletarAnuncio($data['id']);
        $response = $response->withJson(['menssage' => 'sucess']);
        return $response;
    }

    public function atualizarAnuncio(Request $request, Response $response, $args): Response
    {
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
