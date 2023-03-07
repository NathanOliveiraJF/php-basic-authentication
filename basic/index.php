<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
  // Vai solicitar para o usuário inserir nome e senha(abre um alert)
  header('WWW-Authenticate: Basic realm="Test auth"');
  // vai responder primeiramente para o usuário 401 afim de solicitar as credenciais
  header('HTTP/1.0 401 Unauthorized');
  echo 'Texto enviado caso o usuario clique no botao cancelar';
  exit;
} else {
  // Caso o usuário realizar a autenticação ou seja enviar no header da solicitação usuario:senha em base64, 
 // "PHP_AUTH_USER" -> Quando efetuado autenticação http está variável estará definida com o username fornecida pelo usuario
  // dessa forma vai cair nesse else caso seja autenticado
  echo "<p> Ola, {$_SERVER['PHP_AUTH_USER']}.</p>";
  echo "<p> Voce digitou, {$_SERVER['PHP_AUTH_PW']} como sua senha.</p>";
}

?>
