<?php

require __DIR__ . '/../jwt/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = 'chave-de-exemplo';

$payload = [
  "sub" => "123456789",  // id do user
  "name" => "Nathan",
  "role" => "admin"
];

$token = JWT::encode($payload, $key, 'HS256');
$decoded = JWT::decode($token, new Key($key,'HS256'));

print_r($token);
