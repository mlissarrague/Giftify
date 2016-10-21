<?php
	require_once("validador.php");
	require_once("repositorio.php");

	class ValidadorUsuario extends Validador {
		public function validar(Array $datos, Repositorio $repo) {

			$repoUsuarios = $repo->getRepositorioUsuarios();

			$errores = [];
	        if (empty(trim($datos["name"]))){
	            $errores["name"] = "Ingrese un nombre";
	        }
					if(trim(empty($_POST["lastname"]))){
		        $errores["lastname"] = "Ingrese un apellido valido";
		      }
	        if (empty(trim($datos["mail"]))){
	            $errores["mail"] = "Por favor ingrese mail";
	        }
	        elseif (!filter_var($datos["mail"], FILTER_VALIDATE_EMAIL)) {
	            $errores["mail"] = "Por favor ingrese un mail correcto";
	        }
	        elseif ($repoUsuarios->existeElMail($datos["mail"])){
	            $errores["mail"] = "El mail ya esta registrado";
	        }
					if (trim(empty($_POST["telefono"]))) {
		        $errores["telefono"] = "Debe ingresar un telefono";
		      }
					if ($_POST["password"] !== $_POST["passwordConfirm"]){
						$errores["passwordConfirm"] = "Las contraseñas no coinciden";
					}
					if(trim(empty($_POST["username"]))){
						$errores["username"] = "Ingrese un usuario";
					}
					elseif (existeElUsuario($_POST["username"])){
							$errores["username"] = "El usuario ya existe";
					}
					if (trim(empty($_POST["password"]))){
							$errores["password"] = "Ingrese una contraseña";
					}
					elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $_POST["password"])) {
						$errores["password"] = "Debe tener al menos un numero,<br> una letra, no contener<br> caracteres especiales y <br>estar entre 8 y 30 caracteres";
					}
	        return $errores;
		}
	}
