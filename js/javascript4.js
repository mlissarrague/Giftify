window.onload = function(){

  registrar();

}
function registrar(){

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.open("GET","https://sprint.digitalhouse.com/nuevoUsuario",true);
  xmlhttp.send();

  xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      console.log("el envio se envio bien");
    }
  }


  var ajaxPedido = new XMLHttpRequest();
  ajaxPedido.open("GET","https://sprint.digitalhouse.com/getUsuarios",true);
  ajaxPedido.send();

  ajaxPedido.onreadystatechange = function(){
    if(ajaxPedido.readyState == 4 && ajaxPedido.status == 200){
      var responseJSON = ajaxPedido.responseText;
      var response = JSON.parse(responseJSON);
      alert("Se han registrado " + response.cantidad + " personas");
    }
  }
}
