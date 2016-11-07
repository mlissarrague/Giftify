<?php
require_once("soporte.php");
require_once("clases/validadorUsuario.php");
require_once("clases/validadorLogin.php");
$repoUsuarios = $repo->getRepositorioUsuarios();
$errores = [];
$nombreDefault = "";
$emailDefault = "";
$apellidoDefault= "";
$telefonoDefault = "";
$usernameDefault = "";
$usernameLoginDefault = "";
$fechaDefault = "";
if ($auth->estaLogueado()) {

    header("Location:index.php");exit;
}
if (!empty($_POST)) {
  if ($_POST["formulario"] == "registro"){

    //Se envió información
    $errores = [];
    if (empty($errores)){
      $validador = new ValidadorUsuario();
      //Se envió información
      $errores = $validador->validar($_POST, $repo);

      if (empty($errores)){
        //No hay Errores

        //Primero: Lo registro
        $usuario = new Usuario(
        $_POST["name"],
        $_POST["lastname"],
        $_POST["mail"],
        $_POST["telefono"],
        $_POST["password"],
        $_POST["username"],
        strval($_POST["fecha"]),
        $avatarDefault = "imgs/avatar.jpg"
      );
      $usuario->setPassword($_POST["password"]);
      $usuario->guardar($repoUsuarios);

      //Segundo: Lo envio al exito
      header("Location:index.php");exit;

    }
    if (empty($errores["name"])){
      $nombreDefault = $_POST["name"];
    }
    if (empty($errores["lastname"])){
      $apellidoDefault = $_POST["lastname"];
    }
    if (empty($errores["mail"])){
      $emailDefault = $_POST["mail"];
    }
    if (empty($errores["telefono"])){
      $telefonoDefault = $_POST["telefono"];
    }
    if (!isset($errores["username"])){
      $usernameDefault = $_POST["username"];
    }
    if (!isset($errores["fecha"])){
      $fechaDefault = $_POST["fecha"];
    }
  }
}else{
  if ($_POST) {
    $validador = new ValidadorLogin();

    $errores = $validador->validar($_POST, $repo);
    if (empty($errores["username-login"])){
      $usernameLoginDefault = $_POST["username-login"];
    }
    if (empty($errores))
    {
      $usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorUsuario($_POST["username-login"]);
      var_dump($usuario);
      $auth->loguear($usuario);
      if ($validador->estaEnFormulario("recordame"))
      {
        $auth->guardarCookie($usuario);
      }
      header("Location:index.php");exit;
    }
  }
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>registro</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="registro">
  <?php require_once('mainNav.php') ?>
    <div class="container">
        <form id='register' action='' method='post' name="form" >
            <fieldset>
                <legend>
                    <h1>Registro</h1>
                </legend>
                <div class="datos">
                  <div class="nombreApellido">
                    <input type="hidden" name="formulario" value="registro">
                    <div class="primeraColumna">
                        <label>Nombre</label>
                        <br>
                        <input type="text" placeholder="Juan" class="typeText" name="name" value='<?php echo $nombreDefault?>'><br>
                        <strong style="color: #f00">
                        <?php
                        if (isset($errores["name"])) {
                            echo $errores["name"];
                        }
                        ?>
                        </strong>
                    </div>
                    <div class="segundaColumna">
                        <label>Apellido</label>
                        <br>
                        <input type="text" placeholder="Perez" class="typeText" name="lastname" value="<?php echo $apellidoDefault?>">
                        <br>
                        <strong style="color: #f00">
                        <?php if(isset($errores["lastname"])){
                          echo $errores["lastname"];
                        }
                        ?></strong>
                    </div>
                  </div>
                  <div class="mailTelefono">

                    <div class="primeraColumna">
                        <label>Mail</label>
                        <br>
                        <input type="text" placeholder="ejemplo@ejemplo.com" class="typeText" name="mail" value="<?php echo $emailDefault?>">
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["mail"])) {
                            echo $errores["mail"];
                        }
                        ?></strong>
                    </div>
                    <div class="segundaColumna">
                        <label>Telefono</label>
                        <br>
                        <input type="tel" name="telefono" class="typeText" value="<?php echo $telefonoDefault?>"><br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["telefono"])) {
                            echo $errores["telefono"];
                        }
                        ?></strong>
                    </div>
                  </div>
                  <div class="contrasenaConfirm">

                    <div class="primeraColumna">
                        <label>Contraseña</label>
                        <br>
                        <input type="password" class="typeText" placeholder="Contraseña" name="password">
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["password"])) {
                            echo $errores["password"];
                        }
                        ?></strong>
                    </div>
                    <div class="segundaColumna">
                    <label>Confirmar Contraseña</label>
                    <br>
                    <input type="password" class="typeText" placeholder="Contraseña" name="passwordConfirm">
                    <br>
                    <strong style="color: #f00">
                    <?php if (isset($errores["passwordConfirm"])) {
                        echo $errores["passwordConfirm"];
                    }
                    ?></strong>
                  </div>
                </div>
                    <div class="fechasDeNacimiento">
                        <label>Fecha de nacimiento</label>
                          <input type="date" name="fecha" value="<?php echo $fechaDefault?>" class="typeText">
                          <strong style="color: #f00">
                          <?php if (isset($errores["fecha"])) {
                              echo $errores["fecha"];
                          }
                          ?></strong>
                    </div>
                    <div class="">
                        <label>Sexo</label>
                        <br>
                        <input type="radio" name="sexo" value="femenino">
                        <label>Femenino</label>
                        <br>
                        <input type="radio" name="sexo" value="masculino">
                        <label>Masculino</label>
                    </div>
                    <div class="">
                        <label>Nombre de Usuario</label>
                        <br>
                        <input type="text" placeholder="Nombre de usuario" class="typeText" name="username" value="<?php echo $usernameDefault?>">
                        <br>
                        <strong style="color: #f00">
                        <?php if(isset($errores["username"])){
                          echo $errores["username"];
                        }
                        ?></strong>
                    <div class="botones">
                      <br>
                      <button type="submit">Registrarse</button>
                      <button type="reset" name="button"  id="enviar">Borrar</button>
                      <br>
                    </div>
                </div>
                </div>
            </fieldset>
        </form>
    </div>
    <?php require_once('mainFooter.php') ?>
    <script src="js/javascript3.js" charset="utf-8"></script>
</body>

</html>
