
<form class="" method="post">
  <section>
<input type="hidden" name="formulario" value="login">
    <div class="usuario1"><label>Usuario</label><input type="text" name="username-login" id="email" value= "<?php  echo $usernameLoginDefault ?>" ><br>
      <strong style="color:#f00">
       <?php if(isset($errores["username-login"])){
      echo $errores["username-login"];}?></strong>
    </div>
    <div class="contrasena1"><label>Contraseña</label><input type="password" name="password-login" value="" id="password"><br>
      <strong style="color:#f00"> <?php if(isset($errores["password-login"])){
        echo $errores["password-login"];
      }?></strong>
    </div>
      <button type="submit" name="button">Ingresar</button>
    </section>
    <section>

      <div class="recordarme">
      <b>Recordame</b>
      <input name="recordame" type="checkbox" value="true">
    </div>
      <a href="olvideMiContrasena.php">Olvide Mi Contraseña</a>
    </section>
</form>
