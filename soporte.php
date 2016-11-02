<?php
require_once("clases/auth.php");
require_once("clases/repositorioJSON.php");
require_once("clases/repositorioSQL.php");

$tipoRepositorio = "json";

switch($tipoRepositorio) {
	case "json":
		$repo = new RepositorioJSON();
		break;
	case "sql":
		$repo = new RepositorioSQL();
		break;
}
function pasarUsuariosDesdeJson(){

$sql = "INSERT into usuarios(ID,name,lastname,email,telefono,password,username,fecha) values (default, :name, :lastname, :email, :telefono, :password, :username, '2106-04-12')";
$json = file_get_contents('../usuarios.json');
$usuariosJson = explode("\n", $json);

foreach ($usuariosJson as $usuarioJson) {
	$array = json_decode($usuarioJson, true);

	foreach ($array["name"] as $name) {
		$query->bindValue(":name", $name, PDO::PARAM_STR);
	};
	foreach ($array["lastname"] as $lastname) {
		$query->bindValue(":lastname", $lastname, PDO::PARAM_STR);
	};
	foreach ($array["email"] as $email) {
		$query->bindValue(":email", $email, PDO::PARAM_STR);
	};
	foreach ($array["password"] as $password) {
		$query->bindValue(":password", $password, PDO::PARAM_STR);
	};
	foreach ($array["telefono"] as $telefono) {
		$query->bindValue(":telefono", $telefono, PDO::PARAM_INT);
	};
	foreach ($array["username"] as $username) {
		$query->bindValue(":username", $username, PDO::PARAM_STR);
	};
	foreach ($array["fecha"] as $fecha) {
		$query->bindValue(":fecha", $fecha, PDO::PARAM_STR);
	};
}
$contenidoJson = "usuarios.json";
$CJ = fopen($contenidoJson,"w");
fclose($CJ);
}
$auth = Auth::getInstancia($repo->getRepositorioUsuarios());

?>
