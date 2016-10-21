<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosJSON extends RepositorioUsuarios {

		public function traerTodosLosUsuarios() {

	        $usuarios = [];

	        //1: Me traigo todo el archivo
	        $archivoUsuarios = file_get_contents("usuarios.json");

	        //2: Lo divido por lineas
	        $usuariosJSON = explode("\n", $archivoUsuarios);

	        //3: Borro la linea vacía del final
	        $cantidadUsuarios = count($usuariosJSON);
	        $elUltimo = $cantidadUsuarios - 1;

	        unset($usuariosJSON[$elUltimo]);

	        //4: Recorro mis lineas y las paso a arrays
	        foreach ($usuariosJSON as $usuarioJSON) {
	        	$usuarioArray = json_decode($usuarioJSON, true);

	        	$usuario = new Usuario(
	        		$usuarioArray["name"],
							$usuarioArray["lastname"],
	        		$usuarioArray["email"],
	        		$usuarioArray["telefono"],
							$usuarioArray["password"],
							$usuarioArray["username"],
							$usuarioArray["fecha"]
	        	);

	            $usuarios[] = $usuario;
	        }

	        return $usuarios;
	    }

	    public function traerProximoUsuario() {
	        //1: Me traigo todo el archivo
	        $archivoUsuarios = file_get_contents("usuarios.json");

	        //2: Lo divido por lineas
	        $usuariosJSON = explode("\n", $archivoUsuarios);

	        //3: Obtengo indice último usuario
	        $cantidadUsuarios = count($usuariosJSON);
	        $elUltimo = $cantidadUsuarios - 2;

	        if ($elUltimo < 0) {
	            return 1;
	        }

	        //4: Traigo el último usuario
	        $ultimoUsuario = $usuariosJSON[$elUltimo];

	        $ultimoUsuario = json_decode($ultimoUsuario, true);

	        return $ultimoUsuario["username"] + 1;
	    }

	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getUsername() == null) {
	    		$usuario->setUsername($this->traerProximoUsuario());
	    	}

	    	$usuarioJSON = json_encode($usuario->toArray());

	    	file_put_contents("usuarios.json", $usuarioJSON . "\n", FILE_APPEND);
	    }
	}
