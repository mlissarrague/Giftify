<?php
	require_once("repositorioUsuarios.php");

	class RepositorioUsuariosSQL extends RepositorioUsuarios {

		private $conn;

		public function __construct(PDO $conn) {
			$this->conn = $conn;
		}

		public function traerTodosLosUsuarios() {

			$usuarios = [];

			$sql = "SELECT * FROM usuarios";

			$query = $this->conn->prepare($sql);
			$query->execute();


			$usuariosArrays = $query->fetchAll(PDO::FETCH_ASSOC);

	        foreach ($usuariosArrays as $usuarioArray) {

	        	$usuario = new Usuario(
	        		$usuarioArray["ID"],
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


	    public function guardar(Usuario $usuario) {
	    	if ($usuario->getId() == null) {
	    		$sql = "INSERT into usuarios(ID,name,lastname,email,telefono,password,username,fecha) values (default, :name, :lastname, :email, :telefono, :password, :username, :fecha)";
	    	}


	    	$query = $this->conn->prepare($sql);

	    	$query->bindValue(":name", $usuario->getName(), PDO::PARAM_STR);
	    	$query->bindValue(":lastname", $usuario->getLastname(), PDO::PARAM_STR);
	    	$query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
	    	$query->bindValue(":telefono", $usuario->getTelefono(), PDO::PARAM_INT);
	    	$query->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);
	    	$query->bindValue(":username", $usuario->getUsername(), PDO::PARAM_STR);
	    	$query->bindValue(":fecha", $usuario->getFecha(), PDO::PARAM_STR);

	    	if ($usuario->getId() != null) {
	    		$query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
	    	}

	    	$query->execute();

	    	if ($usuario->getId() == null) {
	    		$usuario->setId($this->conn->lastInsertId());
	    	}

	    }

	    public function traerUsuarioPorEmail($email) {
	        $sql = "SELECT * FROM usuarios WHERE email = :email";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":email", $email, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
	        		$usuarioArray["id"],
							$usuarioArray["name"],
							$usuarioArray["lastname"],
	        		$usuarioArray["email"],
	        		$usuarioArray["telefono"],
							$usuarioArray["password"],
							$usuarioArray["username"],
							$usuarioArray["fecha"],
							$usuarioArray["avatarDefault"]
	        	);
	        	return $usuario;
	        }

	        return false;
	    }
			public function traerUsuarioPorUsuario($username) {
	        $sql = "SELECT * FROM usuarios WHERE username = :username";

	        $query = $this->conn->prepare($sql);

	        $query->bindValue(":username", $username, PDO::PARAM_STR);

	        $query->execute();

	        $usuarioArray = $query->fetch();

	        if ($usuarioArray) {
	        	$usuario = new Usuario(
	        		// $usuarioArray["id"],
							$usuarioArray["name"],
							$usuarioArray["lastname"],
	        		$usuarioArray["email"],
	        		$usuarioArray["telefono"],
							$usuarioArray["password"],
							$usuarioArray["username"],
							$usuarioArray["fecha"]
							// $usuarioArray["avatarDefault"]
	        	);
	        	return $usuario;
	        }

	        return false;
	    }

	}
