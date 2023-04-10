<?php



use function src\{SlimConfiguration};
use App\Controllers\{UsuarioController, AnuncioController};


$app = new \Slim\App();

// ==============================================================================

$app->get('/', UsuarioController::class . ':allUsuarios');
$app->post('/login', UsuarioController::class . ':login');
$app->post('/cadastro/usuario', UsuarioController::class . ':inserirUsuario');
$app->put('/atualizar/usuario', UsuarioController::class . ':atualizarUsuario');

// ==============================================================================

$app->get('/anuncios', AnuncioController::class . ':allAnuncios');
$app->get('/cadastrar/anuncios', AnuncioController::class . ':inserirAnuncios');
$app->post('/anuncios/usuario', AnuncioController::class . ':getAnuncioById');
$app->delete('/delete/anuncio' , AnuncioController::class . ':deletarAnuncio');
$app->put('/atualizar/anuncio', AnuncioController::class . ':atualizarAnuncio');

// ==============================================================================

$app->run();