<?php
include_once'funciones.php';
if($_POST){
  $username = $_POST["username"];
  $newPassword = $_POST["password"];
  cambiarPassword($newPassword);
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Olvide Mi Contraseña</title>
  </head>
  <body>
    <form class=""  method="post">
      <label>Usuario</label>
      <input type="text" name="username" value=""><br>
      <label>Nueva Contraseña</label>
      <input type="password" name="password" value=""><br>
      <label>Confirmar Nueva Contraseña</label>
      <input type="password" name="name" value=""><br>
      <button type="submit" name="button">Cambiar</button>
    </form>
  </body>
</html>
