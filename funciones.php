<?php
function validarRegistracion(){
      $errores = [];
      if (trim(empty($_POST["name"]))){
          $errores["name"] = "Ingrese un nombre";
      }
      if(trim(empty($_POST["lastname"]))){
        $errores["lastname"] = "Ingrese un apellido valido";
      }
      if (trim(empty($_POST["mail"]))){
          $errores["mail"] = "Ingrese un email";
      }
      if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
          $errores["mail"] = "Ingrese un email correcto";
      }
      elseif (existeElMail($_POST["mail"])){
          $errores["mail"] = "El email ya esta registrado";
      }
      if (trim(empty($_POST["telefono"]))) {
        $errores["telefono"] = "Debe ingresar un telefono";
      }
      if (trim(empty($_POST["password"]))){
          $errores["password"] = "Ingrese una contraseña";
      }
      elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,30}$/', $_POST["password"])) {
        $errores["password"] = "Debe tener al menos un numero,<br> una letra, no contener<br> caracteres especiales y <br>estar entre 8 y 30 caracteres";
      }
      if(trim(empty($_POST["dia"]))){
        $errores["dia"] = "Ingrese un dia";
      }
      elseif (($_POST["dia"])>31){
        $errores["dia"] = "Ingrese un numero valido";
      }
      if (trim(empty($_POST["anio"]))) {
        $errores["anio"] = "Ingrese un año";
      }
      elseif (($_POST["anio"])>1998){
        $errores["anio"] = "Debe ser mayor a 18";
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
    return $errores;
  }

function registrarUsuario(){
        $name = $_POST["name"];
        $email = $_POST["mail"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $telefono = $_POST["telefono"];
        $lastname = $_POST["lastname"];

        require_once("usuario.php");
        $usuario = new Usuario($name,$lastname ,$email,$username,$password,$telefono);
        //2: Pasarlo a JSON
        $jsonUsuario = json_encode($usuario->getUsuario());
        //3: Lo guardo en archivo
        file_put_contents("usuarios.json", $jsonUsuario . "\n", FILE_APPEND);
    }
    function existeElMail($email) {
        $usuario = traerUsuarioPorEmail($email);
        if ($usuario) {
            return true;
        }
        return false;
    }
    function existeElUsuario($username){
      $usuario = traerUsuarioPorUsuario($username);
      if($usuario){
        return true;
      }
      return false;
    }
    function traerUsuarioPorUsuario($username){
      $usuarios = traerTodosLosUsuarios();
      foreach ($usuarios as $usuario) {
        if($usuario["username"] == $username){
          return $usuario;
        }
      }
    }
    function traerUsuarioPorEmail($email) {
        //1: Me traigo todos los usuarios y ya opero con arrays
        $usuarios = traerTodosLosUsuarios();

        //2: Los recorro y si alguno es el que busco, devuelvo
        foreach($usuarios as $usuario){
            if ($usuario["email"] == $email){
                return $usuario;
            }
        }

        return false;
    }

    function traerTodosLosUsuarios() {

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
            $usuarios[] = json_decode($usuarioJSON, true);
        }

        return $usuarios;
    }

    function validarLogin() {
        $errores = [];

        if (empty(trim($_POST["username"])))
        {
            $errores["username"] = "Por favor ingrese usuario";
        }
        if (empty(trim($_POST["password"])))
        {
            $errores["password"] = "Por favor ingrese contraseña";
        }
        if (!existeElUsuario($_POST["username"]))
        {
            $errores["username"] = "El usuario no existe";
        }
        else {
            $usuario = traerUsuarioPorUsuario($_POST["username"]);

            if (!password_verify($_POST["password"], $usuario["password"])) {
                $errores["password"] ="La contraseña es incorrecta";
            }
        }

        return $errores;
    }

    function loguear($usuario) {
        $_SESSION["usuarioLogueado"] = $usuario["email"];
    }

    function traerUsuarioLogueado() {
        if (!estaLogueado()) {
            return null;
        }
        $mailLogueado = $_SESSION["usuarioLogueado"];
        return traerUsuarioPorEmail($mailLogueado);
    }

    function estaLogueado() {
        return isset($_SESSION["usuarioLogueado"]);
    }

    function estaEnFormulario($campo) {
        return isset($_POST[$campo]);
    }

    function guardarCookie($usuario) {
        setcookie("usuarioLogueado", $usuario["email"], time() + 3600 * 24);
    }

    function autologuear() {
        session_start();
        if (!estaLogueado()) {
            if (isset($_COOKIE["usuarioLogueado"])) {
                $usuario = traerUsuarioPorEmail($_COOKIE["usuarioLogueado"]);

                loguear($usuario);
            }
        }
    }
    autologuear();
    function cambiarPassword($username){
      traerTodosLosUsuarios($username);
      $usuarioACambiar = json_decode($username);
      $usuarioACambiar["password"] = $_POST["password"];
    };
?>
