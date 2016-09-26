window.onload = function(){
  nav();
  registro();

}

function nav(){
 var icono = document.querySelector(".ion-navicon-round");
 var navegation = document.querySelector(".main-nav1");

function ocultar(){

  if(navegation.style.display == "block"){
    navegation.style.display= "none";
  }
  else {
    navegation.style.display = "block";
  }
}
  icono.addEventListener("click", ocultar);
}
function registro() {
    var formulario = document.querySelector("form");
    formulario.onsubmit = validateForm();

}

function validateForm() {
  var inputNombre = document.querySelector(".name").value;
  var nombre1 = document.form.name.value;
  console.log(inputNombre);
    var apellido = document.form.lastname.value;

    if (inputNombre == null || inputNombre == "") {
        console.log("Name must be filled out");
    }
    if (apellido == null || apellido == "") {
        console.log("Last name must be filled out");
    }
    var email = document.form.mail.value;
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(email)) {
        console.log("Error: La dirección de correo " + email + " es incorrecta.");
    }
    var password = document.form.password.value;
    if (password != "" && password == password) {
        if (password.length < 8) {
            console.log("La contraseña debe tener al menos 8 caracteres");
            form.password.focus();
            return false;
        }
        if (password == nombre1) {
            console.log("La contraseña tiene que ser diferente a tu nombre");
            form.password.focus();
            return false;
        }
        re = /[0-9]/;
        if (!re.test(password)) {
            console.log("La contraseña debe contener al menos un numero");
            form.password.focus();
            return false;
        }
        re = /[a-z]/;
        if (!re.test(password)) {
            console.log("La contraseña debe tener al menos una letra");
            form.password.focus();
            return false;
        }

    }
    var dia = document.form.dia.value;;
    if (dia.toString().length > 2) {
        console.log("Ingrese una fecha valida");
        form.dia.focus();
        return false;
    }
    if (dia > 31) {
        console.log("Ingrese una fecha valida");
        form.dia.focus();
        return false;
    }

    var anio = document.form.anio.value;
    if (anio.toString().length > 4) {
        console.log("Ingrese un año valido");
        form.anio.focus();
        return false;
    }
    if (anio > 1998) {
        console.log("Tenes que ser mayor a 18");
        form.anio.focus();
        return false;
    }
    var sexo = document.form.sexo;
    var s = "no";
    if (sexo[1].checked) {
        console.log("Marcado");
    }
    for (var i = 0; i < sexo.length; i++) {
        if (sexo[i].checked) {
            s = "si";
            break;
        }
    }
    if (s == "no") {
        console.log("Debe seleccionar hombre o mujer");
        return false;
    }

    return true;
}
