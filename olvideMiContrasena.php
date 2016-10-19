<?php
require_once'clases/repositorioUsuarios.php';
if ($_POST) {
  $usuario = $_POST["username"];
  $usuarioACambiar = $this->traerUsuarioPorUsuario($usuario);
  var_dump($usuarioACambiar);exit;
}


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Olvide Mi Contraseña</title>
  </head>
  <body>
    <!-- <?php require_once'mainNav.php' ?> -->
    <form class=""  method="post">
      <label>Usuario</label>
      <input type="text" name="username" value=""><br>
      <label>Nueva Contraseña</label>
      <input type="password" name="password" value=""><br>
      <label>Confirmar Nueva Contraseña</label>
      <input type="password" name="name" value=""><br>
      <button type="submit" name="submit">Cambiar</button>
    </form>
    <!-- <?php require_once'mainFooter.php' ?> -->
  </body>
</html>
