<?php

require __DIR__ . '/../jwt/vendor/autoload.php';

use Firebase\JWT\JWT;
// use Firebase\JWT\Key;
$pass = $_REQUEST["senha"];

if ($pass == "123") {
  $expire_claim = time() + 60;

  $key = 'chave-de-exemplo'; // chave que seria a forma de assinar o token, garantindo que as info do payload n foram alteradas
  $payload = [
    "sub" => "123456789", // claim reserverd -> de quem pertende o token(id do user)
    "name" => "Nathan", // claim public -> informações do usuário autenticado na aplicação
    "role" => "admin", // cliam public -> info do usuário autenticado na aplicação
    "exp" => $expire_claim
  ];

  http_response_code(200);

  $token = JWT::encode($payload, $key, 'HS256');
  $token = json_encode(
    array("message" => "login com sucesso",
          "token" => $token,
          "expireAt" => $expire_claim
    ));

  echo "<h1>Login com Sucesso!</h1>";
  echo "<h4>bem vindo {$_REQUEST['usuario']}</h4>";
  echo "token de acesso gerado pelo jwt: <br>";
  echo $token;
  // $decoded = JWT::decode($token, new Key($key,'HS256'));
} else {
  http_response_code(401);
  $_REQUEST["error"] = "usuário inválido";
  require_once("./index.php");
}
