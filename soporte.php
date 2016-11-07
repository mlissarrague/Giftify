<?php
require_once("clases/auth.php");
require_once("clases/repositorioJSON.php");
require_once("clases/repositorioSQL.php");

$tipoRepositorio = "sql";

switch($tipoRepositorio) {
	case "json":
		$repo = new RepositorioJSON();
		break;
	case "sql":
		$repo = new RepositorioSQL();
		break;
}
function pasarUsuariosDesdeJson(){

	$dsn = 'mysql:host=localhost;dbname=usuarios;charset=utf8mb4';
	$user = "root";
	$pass = "";
	$sql = new PDO($dsn, $user, $pass);
	$json = file_get_contents('../usuarios.json');
	$array = [];
	$usuariosJson = explode("\n", $json);
	for ($i=0; $i < count($usuariosJson) ; $i++) {
	 array_push($array, json_decode($usuariosJson[$i], true));
	}
	foreach ($array as $usuario) {
	 if($usuario != null){
	   $sql1 = $sql->prepare('INSERT into usuarios(ID,name,lastname,email,telefono,password,username,fecha) values (default, :name, :lastname, :email, :telefono, :password, :username, "1997-10-25")');

	   $sql1->bindValue(":name", $usuario['name'], PDO::PARAM_STR);
	   $sql1->bindValue(":lastname", $usuario['lastname'], PDO::PARAM_STR);
	   $sql1->bindValue(":email", $usuario['email'], PDO::PARAM_STR);
	   $sql1->bindValue(":telefono", $usuario['telefono'], PDO::PARAM_INT);
	   $sql1->bindValue(":password", $usuario['password'], PDO::PARAM_STR);
	   $sql1->bindValue(":username", $usuario['username'], PDO::PARAM_STR);

	   $sql1->execute();
	 }
	}
	$fp = fopen('../usuarios.json', 'w+');
	fclose($fp);




}
$auth = Auth::getInstancia($repo->getRepositorioUsuarios());

?>
