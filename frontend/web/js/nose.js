var apiRoot = 'http://localhost/tallerphp2016/api/v1';

//$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  var idInmueble = $('#idInmueble').val();
  var nombreUsuario = $('#usuarioLogueado').text();
  
  $.ajax({
    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/favoritos/misfavoritos?nombreUsuario=" +localStorage.usuario
  })
  .done(function( inmuebles ) {
      console.log(inmuebles);


     
       
        
        let html = '<div>';
        
        html+='<button  class="btn btn-default btn-lg" value="Favorito" id="botonFavoritos">'
            
      html+='<span class="glyphicon glyphicon-star" ></span>'
        html+='</button>'
    
         $('.btnFv').append(html);
        

         $("#botonFavoritos").click(function(){
      $.ajax({
    
    method: "GET",
    url: apiRoot + "/favoritos/crearfavorito?nombreUsuario=" +localStorage.usuario+"&idInmueble="+idInmueble
  })
  .done(function( resultado ) {
      console.log(resultado);
      alert('se ejecuto el boton');
  });


  });
  
      
      
      
      
  });
  

//});