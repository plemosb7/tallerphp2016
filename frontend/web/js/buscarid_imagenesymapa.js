var apiRoot = 'http://localhost/tallerphp2016/api/v1';


function initMap() {
          var idInmueble = $('#idInmueble').val();
         
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.9036100, lng: -56.1640446}, 
          scrollwheel: false,
          zoom: 13
        });
             
      $.ajax({
            method: 'GET',
            url: 'http://localhost/tallerphp2016/api/v1/inmueble'
        }).done(function(data) {
        
            $.each(data, function(index, inmueble) {
                if(inmueble.id==idInmueble){
                    marker = new google.maps.Marker({
                            position: new google.maps.LatLng(inmueble.latitud, inmueble.longitud),
                            map: map,
                          
                    });
                }  
            });
        });
           
           
}  


function buscarImagenes(){
    var accessToken = $('#accessToken').val();
    var idInmueble = $('#idInmueble').val();
  
    $.ajax({
        beforeSend: function (xhr) {
        xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
    },
    method: "GET",
    url: apiRoot + "/inmueble",
    
    })
    .done(function( inmuebles ) {
        console.log(inmuebles);
    
    
        $.each(inmuebles, function(index, inmueble) {
            var url = "../../backend/imagenes/";
            var foto1 = inmueble.foto1;
            var foto2 = inmueble.foto2;
            var foto3 = inmueble.foto3;
            var urlFoto1 = url+foto1;
            var urlFoto2 = url+foto2;
            var urlFoto3 = url+foto3;
            
          let html = '<div>';
          
       
   if(inmueble.id==idInmueble){
    
     html+='<div class="col-sm-12 col-md-12">'
        html+='<div class="thumbnail">'
        if((foto1!=null) || (foto2!=null) || (foto3!=null)){
        html+='<div id="carousel-example-generic'+inmueble.id+'1" class="carousel slide" data-ride="carousel">'
        html+='<ol class="carousel-indicators">'
        if(foto1!=null){
        html+='<li data-target="#carousel-example-generic'+inmueble.id+'1" data-slide-to="0" class="active">'
        html+='</li>'
        }
        if(foto2!=null){
        html+='<li data-target="#carousel-example-generic'+inmueble.id+'1" data-slide-to="1">'
        html+='</li>'
        }
        if(foto3!=null){
        html+='<li data-target="#carousel-example-generic'+inmueble.id+'1" data-slide-to="2">'
        html+='</li>'
        }
        html+='</ol>'
        
        html+='<a href="index.php?r=site/buscarinmueble&id='+inmueble.id+'1">'
        html+='<div class="carousel-inner" role="listbox">'
        html+='<div class="item active">'
        html+='<img src="'+urlFoto1+'"class="img-responsive" >'
      
        html+='</div>'
        if(foto2!=null){
        html+='<div class="item">'
        html+='<img src="'+urlFoto2+'"class="img-responsive">'
       
        html+='</div>'
    }
        
        if(foto3!=null){
        html+='<div class="item">'
        html+='<img src="'+urlFoto3+'"class="img-responsive">'
       
        html+='</div>'
        }
        html+='</div>'
        html+='</a>'
       
        html+='<a class="left carousel-control" href="#carousel-example-generic'+inmueble.id+'1" role="button" data-slide="prev">'
        html+='<span class="glyphicon glyphicon-chevron-left" aria-hidden="true">'
        html+='</span>'
        html+='<span class="sr-only">'
        html+='</span>'
        html+='</a>'
        html+='<a class="right carousel-control" href="#carousel-example-generic'+inmueble.id+'1" role="button" data-slide="next">'
        html+='<span class="glyphicon glyphicon-chevron-right" aria-hidden="true">'
        html+='</span>'
        html+='<span class="sr-only">'
        html+='</span>'
        html+='</a>'
        html+='</div>'
        html+='<div class="caption">'
    }
   }
    
     $('.imagen').append(html);

        });
    });   
}

$("document").ready(function(){ 
    buscarImagenes();
    initMap();
    
});
