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
