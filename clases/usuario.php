<?php
	require_once("repositorioUsuarios.php");

	class Usuario {
		private $name;
		private $lastname;
		private $email;
		private $username;
		private $password;
		private $telefono;



		public function __construct($name, $lastname, $email,  $password,$telefono,$username) {
			$this->name =$name;
			$this->lastname = $lastname;
			$this->email = $email;
			$this->username = $username;
			$this->password = $password;
			$this->telefono = $telefono;
		}

		public function getName(){
			return $this->name;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}
		public function getLastname(){
			return $this->lastname;
		}

		public function getTelefono(){
			return $this->telefono;
		}

		public function setName($name) {
			$this->name = $name;
		}
		public function setUsername($username) {
			$this->username = $username;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setPassword($password) {
			$this->password = password_hash($password, PASSWORD_DEFAULT);
		}
		public function setlastname($lastname) {
			$this->email = $lastname;
		}
		public function setTelefono($telefono) {
			$this->telefono = $telefono;
		}

		public function guardar(RepositorioUsuarios $repo) {
			$repo->guardar($this);
		}

		public function toArray() {
			return [
				"name" => $this->getName(),
				"lastname"=> $this->getLastname(),
				"email" => $this->getEmail(),
				"password" => $this->getPassword(),
				"telefono" => $this->getTelefono(),
				"username" => $this->getUsername()
			];

		}
	}
