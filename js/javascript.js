window.onload = function(){
    nav();
    preguntas();
}
function preguntas() {
    var pregunta = document.querySelectorAll(".pregunta");
    var respuesta = document.querySelectorAll(".respuesta");
    for (var i = 0; i < respuesta.length; i++) {
      var resp = respuesta[i];
      resp.style.display = 'none';
    }
    for (var i = 0; i < pregunta.length; i++) {
        var t = pregunta[i];
        function cambiar() {
          var liRTA = this.nextElementSibling;
            if (liRTA.style.display == 'none') {
                liRTA.style.display = 'block';
                pregunta.style.borderRadius = '5px 5px 0 0';
            } else {
                liRTA.style.display = 'none';
                pregunta.style.borderRadius = '5px';
            };
        }
        t.addEventListener("click", cambiar);
    }
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
