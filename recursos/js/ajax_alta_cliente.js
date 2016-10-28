function cargar_alta_cliente(){
$(document).ready(function(){
   $("#alta_cliente").click(function(evento){
      //elimino el comportamiento por defecto del enlace
      evento.preventDefault();
      //Aquí pondría el código de la llamada a Ajax
      $("#contenido").load("http://localhost/puntoFitness/application/views/cliente/alta_cliente");
   });
})
}