<?php
function validarRegistracion(){
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
    return $errores;
  }



  if (!empty($_POST)){
        $errores = validarRegistracion();

        if (empty($errores)){
            header("Location: exit.php");
            exit;
        }
        if (empty($errores["name"])){
            $nombreDefault = $_POST["name"];
        }
        if (empty($errores["lastname"])){
          $apellidoDefault = $_POST["lastname"];
        }
        if (empty($errores["mail"])){
            $emailDefault = $_POST["mail"];
        }
        if (empty($errores["telefono"])){
          $telefonoDefault = $_POST["telefono"];
        }
        if (empty($errores["dia"])){
            $diaDefault = $_POST["dia"];
        }
        if (empty($errores["anio"])){
          $anioDefault = $_POST["anio"];
        }
    }


?>
