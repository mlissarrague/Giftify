<?php
	require("funciones.php");
	if (estaLogueado()) {
		header("Location:inicio.php");exit;
	}
	$errores = [];
	$usernameDefault ="";
	if ($_POST) {

		$errores = validarLogin();

		if (empty($errores))
		{

			$usuario = traerUsuarioPorUsuario($_POST["username"]);
			loguear($usuario);
			if (estaEnFormulario("recordame"))
			{
				guardarCookie($usuario);
			}
			header("Location:inicio.php");exit;
		}
  if (!isset($errores["username"])){
      $usernameDefault = $_POST["username"];
  }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <title>Giftify</title>
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="home">

    <div class="contenedor">

        <header>
            <section class="header">
                <article class="logo">
                    <img src="../imgs/logo2.png" alt="logo" />
                </article>
                <div class="menus">
                    <article>
                        <nav class="second-nav">
                          <div class=""style="color: #f00">


                          </div>
                          <form class="" method="post">
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
                                Recordame
                          			<input name="recordame" type="checkbox" value="true">
                          </form>
                        </nav>
                    </article>

                    <span class="ion-navicon-round" style="color: 000"></span>
                    <nav class="main-nav">
                        <img src="" alt="" />

                        <ul class="nav-resp">
                            <li><a href="#">Home</a></li>
                            <li><a href="registro2.php">Registrarse</a></li>
                            <li><a href="#">Store</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li>
                                <input type="text" name="name" value="">
                                <button type="button" name="button" class="sbutton">Search</button>
                            </li>
                        </ul>
                    </nav>
                </div>
                </article>
            </section>

        </header>
        <!-- banner -->
        <section class="banner">
            <img src="../imgs/banner1.jpg" alt="banner" />
        </section>
        <section class="categorias">
          <div class="herhim">
            <article class="her">

              <img src="../imgs/her.jpg" alt="" class="imgcategorias" />
                <div class="textocate">

                <h2>Her</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <button type="button" name="button">Shop now!</button>
              </div>
            </article>
            <article class="him">
              <img src="../imgs/him.jpg" alt=""  class="imgcategorias"/>
                <div class="textocate">

                <h2>Him</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <button type="button" name="button">Shop now!</button>
              </div>
            </article>
          </div>
            <article class="kids">
              <img src="../imgs/kids.jpg" alt="" class="imgcategorias" />
                <div class="textocate">

                <h2>Kids</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <button type="button" name="button">Shop now!</button>
              </div>
            </article>
        </section>
        <!-- banner2 -->
        <section class="banner2">

        </section>
        <?php require_once('mainFooter.php'); ?>
    </div>
    <script src="../js/javascript2.js" charset="utf-8"></script>
</body>

</html>
