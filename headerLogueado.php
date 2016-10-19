<?php if ($auth->estaLogueado()) { ?>
	Sos un capo por estar en mi sitio <?php echo traerUsuarioLogueado()["name"]." ".traerUsuarioLogueado()["lastname"] ?>
	<a href="logout.php">Log Out</a>
<?php } else { ?>
	<?php header("Location:index.php");exit;
	 ?>
<?php } ?>
