<?php
	require("funciones.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Bienvenidos a mi sitio
	<?php if (estaLogueado()) { ?>
		Sos un capo por estar en mi sitio <?= traerUsuarioLogueado()["username"] ?>
		<a href="logout.php">Log Out</a>
	<?php } else { ?>
		<?php header("Location:index.php");exit;
		 ?>
	<?php } ?>
</body>
</html>
