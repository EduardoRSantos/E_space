<?php

namespace src;

use Tuupola\Middleware\JwtAuthentication;

function jwtAuth(): JwtAuthenication{
    return new JwtAuthentication([
        'secret' => getenv('JWT_SECRET_KEY'),
        'attribute' => 'jwt'
    ]);
}