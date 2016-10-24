<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorLogin extends Validador {
		public function Validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];

	        if (empty(trim($datos["username-login"]))){
	            $errores["username-login"] = "Por favor ingrese usuario";
	        }
	        if (empty(trim($datos["password-login"]))){
	            $errores["password-login"] = "Por favor ingrese password";
	        }
	        if (!$repoUsuarios->existeElUsuario($datos["username-login"])){
	            $errores["username-login"] = "El usuario no existe";
	        }
	        else {
	            $usuario = $repoUsuarios->traerUsuarioPorUsuario($datos["username-login"]);

	            if (!password_verify($datos["password-login"], $usuario->getPassword())) {
	                $errores["password-login"] ="La contrasena es incorrecta";
	            }
	        }
	        return $errores;
		}
	}
