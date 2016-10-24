
<div class="logueado">

<?php if ($auth->estaLogueado()) { ?>
	<img src="<?php echo traerUsuarioLogueado()["avatarDefault"] ?>" alt="" />
	<a href="#"class="ion-ios-cart"></a>
	<strong class="nombreLogueado"> <?php echo traerUsuarioLogueado()["name"]." ".traerUsuarioLogueado()["lastname"] ?></strong>
	<a href="logout.php">Log Out</a>
<?php } else { ?>
	<?php header("Location:index.php");exit;
	 ?>
<?php } ?>
</div>
