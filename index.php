<?php

if (!isset($_SERVER['PHP_AUTH_USER'])) {
  // header('WWW-Authenticate: Basic realm="My Realm"');
  header('WWW-Authenticate: Basic realm="Test auth"');
  header('HTTP/1.0 401 Unauthorized');
  echo 'Texto enviado caso o usuario clique no botao cancelar';
  exit;
} else {
  echo "<p> Ola, {$_SERVER['PHP_AUTH_USER']}.</p>";
  echo "<p> Voce digitou, {$_SERVER['PHP_AUTH_PW']} como sua senha.</p>";
}

?>
