<?php
  $error = $_REQUEST["error"];
?>

<html>
  <head>
    <title>login</title>
  </head>
  <body>
    <h1>Login de usuario</h1>
    <?php
      if($error) {
        echo "<p>Login inválido</p>";
      }
    ?>
    <form action="authenticate.php" method="post">
      <input placeholder="usuario"  name="usuario"/>
      <input type="password" placeholder="senha"  name="senha"/>
      <input type="submit" value="enviar"/>
    </form>
    <p>usuario: qualquer um, senha: 123</p>
  </body>

</html>
