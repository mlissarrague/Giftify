<?php
	session_start();
	session_destroy();
	setcookie("usuarioLogueado","", -1);
	header("Location:index.php");exit;
?>
