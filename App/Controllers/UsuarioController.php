<?php

namespace App\Controllers;

use Psr\Http\Message\{ResponseInterface as Response,ServerRequestInterface as Request};
use App\DAO\{UsuariosDAO, ImagensDAO};
use App\Models\UsuarioModel;
use DateTime;
use DateTimeZone;

final class UsuarioController{

    public function getImagenPerfil(Request $request, Response $response, $args): Response{
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);
        $id = $data['id'];
        $upload_imagen = new ImagensDAO();
        $result = $upload_imagen->getImageUsuarioById($id);
        $response = $response->withJson($result);
        return $response;
    }
    public function login(Request $request, Response $response, array $args): Response {
        
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);

        $email = $data['email'];
        $senha = $data['senha'];
  
        $usuario_dao = new UsuariosDAO();
        $usuario = $usuario_dao->getUsuarioByEmail($email);

        if(is_null($usuario))
            return $response->withStatus(404);

        if(!password_verify($senha, $usuario->getSenha()))
            return $response->withStatus(401);

        $response = $response->withJson([
            "id" => $usuario->getId(),
            "nome" => $usuario->getNome(),
            "email" => $usuario->getEmail(),
            "telefone" => $usuario->getTelefone(),
            "tipo_de_conta" => $usuario->getTipoDeConta()
        ]);
        return $response;
    }

    public function allUsuarios(Request $request, Response $response, array $args): Response {
        $usuario_dao = new UsuariosDAO();
        $usuario = $usuario_dao->allUsuarios();
        $response = $response->withJson($usuario);
        // $response = $response->withJson(["menssage" => "True"]);
        return $response;    
    }

    public function inserirUsuario(Request $request, Response $response, array $args): Response {
        $input = file_get_contents('php://input');

        $data = json_decode($input, true);
  
        $usuario_dao = new UsuariosDAO();
        $usuario_model = new UsuarioModel();

        $nome = $data['nome'];
        $email = $data['email'];
        $senha = $data['senha'];
        $telefone = $data['telefone'];

        $usuario = $usuario_dao->getUsuarioByEmail($email);

        if(is_null($usuario)){
            $usuario_model
            ->setNome($nome)
            ->setemail($email)
            ->setsenha(password_hash($senha, PASSWORD_DEFAULT))
            ->setTelefone($telefone);
            $usuario_dao->inserirUsuario($usuario_model);
            $response = $response->withStatus(200);
        }else{
            $response = $response->withStatus(401);
        }
            return $response;
    }
    public function atualizarUsuarioImagen(Request $request, Response $response, array $args): Response {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $id = $data['id'];

        $upload_imagen = new ImagensDAO();

        $time = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

        $result = $upload_imagen->inserirImagenPerfil($id, $data['referencia_imagen'],$time->format('Y-m-d H:i:s'));

        if($result)
            $response = $response->withStatus(200);
        else
            $response = $response->withStatus(403);

        return $response;
    }

    public function atualizarUsuario(Request $request, Response $response, array $args): Response {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $nome = $data['nome'];
        $telefone = $data['telefone'];
        $id = $data['id'];

        $usuario_dao = new UsuariosDAO();
        $usuario_model = new usuarioModel();

        $usuario_model
        ->setNome($nome)
        ->setTelefone($telefone)
        ->setId($id);
        $result = $usuario_dao->atualizarUsuario($usuario_model);

        if ($result)
            $response = $response->withStatus(200);
            return $response;
        
        $response = $response->withStatus(403);
        return $response;
    }
}