<?php
	require_once("repositorio.php");
	require_once("repositorioUsuariosSQL.php");

	class RepositorioSQL extends Repositorio {

		private $conn;

		public function __construct() {
			$dsn = 'mysql:host=localhost;dbname=usuarios;charset=utf8mb4';

			$user = "root";
			$pass = "";

			$this->conn = new PDO($dsn, $user, $pass);

			$this->repositorioUsuarios = new RepositorioUsuariosSQL($this->conn);
		}

	}

?>
