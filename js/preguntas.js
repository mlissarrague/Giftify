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
            } else {
                liRTA.style.display = 'none';
            };
        }
        t.addEventListener("click", cambiar);
    }
}
