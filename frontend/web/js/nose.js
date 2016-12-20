var apiRoot = 'http://localhost/tallerphp2016/api/v1';

$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  var idInmueble = $('#idInmueble').val();
  
  $.ajax({
    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/favoritos"
  })
  .done(function( favoritos ) {
    console.log(favoritos);

    $.each(favoritos, function(index, favorito) {
        if(favorito.inmueble_id==idInmueble){
        let html = '<div>';
        
        html+='<button  class="btn btn-default btn-lg" value="Favorito">'
            html+='<span class="glyphicon glyphicon-star-empty" ></span>'
        html+='</button>'
    
         $('.btnFv').append(html);
     }

    });


  });

});