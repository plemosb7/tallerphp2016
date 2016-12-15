function buscarTipoInm(var id){

var apiRoot = 'http://localhost/tallerphp2016/api/v1';

$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  
  $.ajax({
    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/inmueble/search2?"
  })
  .done(function( inmuebles ) {
    console.log(inmuebles);

    $.each(inmuebles, function(index, inmueble) {
      
       
        

    });


  });

});

}