function registro() {
    var formulario = document.querySelector("form");
    formulario.onsubmit = validateForm;

}

function validateForm() {
    var inputNombre = document.querySelector(".name");
    var nombre1 = document.form.name.value;
    var apellido = document.form.lastname.value;
    if (nombre1 == null || nombre1 == "") {
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
        if (password.length < 6) {
            console.log("Error: Password must contain at least six characters!");
            form.password.focus();
            return false;
        }
        if (password == nombre1) {
            console.log("Error: Password must be different from Username!");
            form.password.focus();
            return false;
        }
        re = /[0-9]/;
        if (!re.test(password)) {
            console.log("Error: password must contain at least one number (0-9)!");
            form.password.focus();
            return false;
        }
        re = /[a-z]/;
        if (!re.test(password)) {
            console.log("Error: password must contain at least one lowercase letter (a-z)!");
            form.password.focus();
            return false;
        }
        re = /[A-Z]/;
        if (!re.test(password)) {
            console.log("Error: password must contain at least one uppercase letter (A-Z)!");
            form.password.focus();
            return false;
        }
    }
    var dia = document.form.dia.value;;
    if (dia.toString().length > 2) {
        console.log("Error: Please enter a valid date");
        form.dia.focus();
        return false;
    }
    if (dia > 31) {
        console.log("Error: Please enter a valid date1");
        form.dia.focus();
        return false;
    }

    var anio = document.form.anio.value;
    if (anio.toString().length > 4) {
        console.log("Error: Please enter a valid year");
        form.anio.focus();
        return false;
    }
    if (anio > 1998) {
        console.log("You should be older than 18");
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
