<?php
class Usuario {
	private $name;
	private $lastname;
	private $email;
	private $username;
	private $password;
	private $telefono;

	public function __construct($name,$lastname, $email, $username, $password,$telefono){
		$this->name = $name;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->username = $username;
		$this->password = password_hash($password, PASSWORD_DEFAULT);
		$this->telefono = $telefono;
	}
	//armar todos los getters y los setters
	public function getUsuario(){
		return [
			"name" => $this->name,
			"lastname" => $this->lastname,
      "email" => $this->email,
      "username" => $this->username,
      "password" => $this->password,
			"telefono" => $this->telefono
		];
	}

}


?>
