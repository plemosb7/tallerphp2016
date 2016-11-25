var apiRoot = 'http://localhost/tallerphp2016/api/v1';

$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  
  $.ajax({
    beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/inmueble"
  })
  .done(function( inmuebles ) {
    console.log(inmuebles);

    $.each(inmuebles, function(index, inmueble) {
      
       
       
       let html = '<div class="row">';     
        
        html+='<div class="col-sm-3 col-md-2">'
    html+='<div class="thumbnail">'
      html+='<img src="..." alt="...">'
      html+='<div class="caption">'
       html+=' <h3>'+inmueble.nombre+'</h3>'
       html+=' <p>...</p>'
        html+='<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>'
     html+=' </div>'
   html+=' </div>'
 html+=' </div>'
        
       

         $('.row').append(html);

       
    
    
    
    });
  
    
    
    

  });

});