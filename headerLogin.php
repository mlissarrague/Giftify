
<form class="" method="post">
  <section>

    <div class="usuario1"><label>Usuario</label><input type="text" name="username" id="email" value= "<?php  echo $usernameDefault ?>" ><br>
      <strong style="color:#f00">
       <?php if(isset($errores["username"])){
      echo $errores["username"];}?></strong>
    </div>
    <div class="contrasena1"><label>Contraseña</label><input type="password" name="password" value="" id="password"><br>
      <strong style="color:#f00"> <?php if(isset($errores["password"])){
        echo $errores["password"];
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
