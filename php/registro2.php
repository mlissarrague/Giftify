<?php
$errores = [];
$nombreDefault = "";
$emailDefault = "";
$apellidoDefault= "";
$telefonoDefault = "";
$diaDefault = "";
$anioDefault = "";
require('funciones.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Login</title>
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="registro">
  <span class="fake-bg"></span>
    <div class="container">
        <?php require_once('mainNav.php') ?>
        <form id='register' action='' method='post' name="form" >
            <fieldset>
                <legend>
                    <h1>Registro</h1>
                </legend>
                <div class="datos">
                  <div class="">

                    <div class="primeraColumna">
                        <label>Nombre</label>
                        <br>
                        <input type="text" placeholder="Nombre" class="name" name="name" value='<?php echo $nombreDefault?>'><br>
                        <strong style="color: #f00">
                        <?php
                        if (isset($errores["name"])) {
                            echo $errores["name"];
                        }
                        ?>
                        </strong>
                    </div>
                    <div class="segundaColumna">
                        <label>Apellido</label>
                        <br>
                        <input type="text" placeholder="Apellido" class="lastname" name="lastname" value="<?php echo $apellidoDefault?>">
                        <br>
                        <strong style="color: #f00">
                        <?php if(isset($errores["lastname"])){
                          echo $errores["lastname"];
                        }
                        ?></strong>
                    </div>
                  </div>
                  <div class="">

                    <div class="primeraColumna">
                        <label>Mail</label>
                        <br>
                        <input type="text" placeholder="ejemplo@ejemplo.com" class="mail" name="mail" value="<?php echo $emailDefault?>">
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["mail"])) {
                            echo $errores["mail"];
                        }
                        ?></strong>
                    </div>
                    <div class="segundaColumna">
                        <label>Telefono</label>
                        <br>
                        <input type="tel" name="telefono" class="telefono" value="<?php echo $telefonoDefault?>"><br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["telefono"])) {
                            echo $errores["telefono"];
                        }
                        ?></strong>
                    </div>
                  </div>
                    <div class="primeraColumna">
                        <label>Contraseña</label>
                        <br>
                        <input type="password" class="password" placeholder="Contraseña" name="password">
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["password"])) {
                            echo $errores["password"];
                        }
                        ?></strong>
                    </div>
                    <div class="segundaColumna">
                    <label>Confirmar Contraseña</label>
                    <br>
                    <input type="password" class="passwordConfirm" placeholder="Contraseña" name="passwordConfirm">
                    <br>
                    <strong style="color: #f00">
                    <?php if (isset($errores["passwordConfirm"])) {
                        echo $errores["passwordConfirm"];
                    }
                    ?></strong>
                  </div>
                    <div class="fechasDeNacimiento">
                        <label>Fecha de nacimiento</label>
                        <br><label>Dia</label>
                        <input type="text" name="dia" value="<?php echo $diaDefault?>"style="width:40px">
                        <label>Mes</label>
                        <select>
                            <option value="vaule" 01 "">Enero</option>
                            <option value="vaule" 02 "">Febrero</option>
                            <option value="vaule" 03 "">Marzo</option>
                            <option value="vaule" 04 "">Abril</option>
                            <option value="vaule" 05 "">Mayo</option>
                            <option value="vaule" 06 "">Junio</option>
                            <option value="vaule" 07 "">Julio</option>
                            <option value="vaule" 08 "">Agosto</option>
                            <option value="vaule" 09 "">Septiembre</option>
                            <option value="vaule" 10 "">Octubre</option>
                            <option value="vaule" 11 "">Noviembre</option>
                            <option value="vaule" 12 "">Diciembre</option>
                        </select>
                        <label>Año</label>
                        <input type="text" name="anio" value="<?php echo $anioDefault?>" style="width:80px">
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["dia"])) {
                            echo $errores["dia"];
                        }
                        ?></strong>
                        <br>
                        <strong style="color: #f00">
                        <?php if (isset($errores["anio"])) {
                            echo $errores["anio"];
                        }
                        ?></strong>
                    </div>
                    <div class="">
                        <label>Sexo</label>
                        <br>
                        <input type="radio" name="sexo" value="femenino">
                        <label>Femenino</label>
                        <br>
                        <input type="radio" name="sexo" value="masculino">
                        <label>Masculino</label>
                    </div>
                    <div class="botones">
                      <br>
                      <button type="submit">Registrarse</button>
                      <button type="reset" name="button"  id="enviar">Borrar</button>
                      <br>
                    </div>
                </div>
            </fieldset>
        </form>
        <?php require_once('mainFooter.php') ?>
    </div>
    <script src="../js/javascript3.js" charset="utf-8"></script>
</body>

</html>
