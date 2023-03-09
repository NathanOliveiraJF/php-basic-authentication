<?php

require __DIR__ . '/../jwt/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'chave-de-exemplo'; // chave que seria a forma de assinar o token, garantindo que as info do payload n foram alteradas
$payload = [
  "sub" => "123456789", // claim reserverd -> de quem pertende o token(id do user)
  "name" => "Nathan", // claim public -> informações do usuário autenticado na aplicação
  "role" => "admin" // cliam public -> info do usuário autenticado na aplicação
];

$token = JWT::encode($payload, $key, 'HS256');
$decoded = JWT::decode($token, new Key($key,'HS256'));

print_r($token);
