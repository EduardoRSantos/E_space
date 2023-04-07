<?php

use function src\{SlimConfiguration};
use App\Controllers\UsuarioController;

$app = new \Slim\App(SlimConfiguration());

// ==============================================

$app->get('/', UsuarioController::class . ':allUsuarios');
$app->post('/login', UsuarioController::class . ':login');
$app->post('/cadastro', UsuarioController::class . ':inserirUsuario');
$app->put('/atualizar', UsuarioController::class . ':atualizarUsuario');

// ==============================================


$app->run();