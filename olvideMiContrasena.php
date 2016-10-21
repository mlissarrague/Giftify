<?php
require_once'soporte.php';
if ($_POST) {
  $usuario = $_POST["username"];
  $contrasenaNueva = $_POST["password"];
  $usuarioCambio = $repo->getRepositorioUsuarios()->traerUsuarioPorUsuario($usuario);
  $usuarioCambio->setPassword($contrasenaNueva);
  $usuarioCambio->guardar($repo->getRepositorioUsuarios());
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Olvide Mi Contraseña</title>
  </head>
  <body>
    Esta pagina crea un usuario nuevo cada vez que intento cambiar la contraseña
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
