<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/SlimConfiguration.php';
require_once __DIR__ . '/../env_.php';

use function src\{SlimConfiguration};
use App\Controllers\{UsuarioController, AnuncioController};


$app = new \Slim\App(SlimConfiguration());

// ==============================================================================

$app->get('/imagem', UsuarioController::class . ':getImagenPerfil');

// ==============================================================================

$app->get('/usuarios', UsuarioController::class . ':allUsuarios');
$app->post('/login', UsuarioController::class . ':login');
$app->post('/cadastro/usuario', UsuarioController::class . ':inserirUsuario');
$app->post('/atualizar/usuario/imagen', UsuarioController::class . ':atualizarUsuarioImagen');
$app->put('/atualizar/usuario', UsuarioController::class . ':atualizarUsuario');

// // ==============================================================================

$app->post('/anuncios/avaliacao', AnuncioController::class . ':avaliacaoAnuncio');
$app->get('/anuncios/avaliar', AnuncioController::class . ':allAnunciosAvaliar');
$app->get('/anuncios', AnuncioController::class . ':allAnuncios');
$app->post('/cadastrar/anuncios', AnuncioController::class . ':inserirAnuncios');
$app->get('/anuncios/pesquisa' , AnuncioController::class . ':pesquisa');
$app->get('/anuncios/usuario', AnuncioController::class . ':getAnuncioUsuario');


$app->put('/anuncios/atualizar', AnuncioController::class . ':anuncioAtualizar');
$app->post('/anuncios/delete', AnuncioController::class . ':deletarAnuncio');


// ==============================================================================

$app->run();