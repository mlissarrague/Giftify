<?php
	require_once("soporte.php");
	require_once("clases/validadorLogin.php");
	//
	// if ($auth->estaLogueado()) {
	// 	header("Location:index.php");exit;
	// }
	$errores = [];
	$usernameDefault="";
	if ($_POST) {

		$validador = new ValidadorLogin();

		$errores = $validador->validar($_POST, $repo);
		if (empty($errores["username"])){
			$usernameDefault = $_POST["username"];
		}
		if (empty($errores))
		{
			$usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorUsuario($_POST["username"]);
			var_dump($usuario);
			$auth->loguear($usuario);
			if ($validador->estaEnFormulario("recordame"))
			{
				$auth->guardarCookie($usuario);
			}
			header("Location:index.php");exit;
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta charset="utf-8">
    <title>Giftify</title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- <script src="js/javascript2.js" charset="utf-8"></script> -->
		<script src="carrusel/jquery-3.1.1.min.js"></script>
		<script src="carrusel/owl.carousel.js"></script>
		<script src="carrusel/carrusel.js"></script>
		<link rel="stylesheet" href="carrusel/owl-carousel/owl.theme.css">
		<link rel="stylesheet" href="carrusel/carrusel.css">
</head>
<body class="home">

    <div class="contenedor">
			<?php
				require("funciones.php");
			?>
			<header>
					<section class="header">
							<article class="logo">
									<img src="imgs/logo2.png" alt="logo" />
							</article>
							<div class="menus">
									<article>
											<nav class="second-nav">
												<div class="">
													<?php
													if ($auth->estaLogueado()){
														include_once 'headerLogueado.php'	;
													}else {
														include_once'headerLogin.php';
													}
													?>
												</div>
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
            <img src="imgs/banner1.jpg" alt="banner" />
        </section>
        <section class="categorias">
          <div class="herhim">
            <article class="her">

              <img src="imgs/her.jpg" alt="" class="imgcategorias" />
                <div class="textocate">

                <h2>Her</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <button type="button" name="button">Shop now!</button>
              </div>
            </article>
            <article class="him">
              <img src="imgs/him.jpg" alt=""  class="imgcategorias"/>
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
              <img src="imgs/kids.jpg" alt="" class="imgcategorias" />
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
					<body>
				    <!-- <img src="assets/armadura.jpg" alt="" /> -->
				    <div id="owl-demo" class="owl-carousel">
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
				    <div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>
						<div class="item"><img class="lazyOwl" data-src="imgs/regalo.jpg" alt="Lazy Owl Image"></div>

				  </div>
        </section>
        <?php require_once('mainFooter.php'); ?>
    </div>

</body>

</html>
