<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/SlimConfiguration.php';
require_once __DIR__ . '/../env_.php';

use function src\{SlimConfiguration};
use App\Controllers\{UsuarioController, AnuncioController};


$app = new \Slim\App(SlimConfiguration());

// ==============================================================================

$app->get('/usuarios', UsuarioController::class . ':allUsuarios');
$app->post('/login', UsuarioController::class . ':login');
$app->post('/cadastro/usuario', UsuarioController::class . ':inserirUsuario');
$app->put('/atualizar/usuario', UsuarioController::class . ':atualizarUsuario');

// // ==============================================================================

$app->get('/anuncios', AnuncioController::class . ':allAnuncios');
$app->post('/cadastrar/anuncios', AnuncioController::class . ':inserirAnuncios');
$app->post('/anuncios/usuario', AnuncioController::class . ':getAnuncioById');
$app->delete('/delete/anuncio' , AnuncioController::class . ':deletarAnuncio');
$app->put('/atualizar/anuncio', AnuncioController::class . ':atualizarAnuncio');

// ==============================================================================

$app->run();