var apiRoot = 'http://localhost/tallerphp2016/api/v1';
function initMap() {
       var cantidadBanos = "";
       var cantidadDorm= "";
       var garage= "";
       var patio="";


       cantidadBanos = $('#cantBanos').val();
       cantidadDorm = $('#cantDorm').val();
       garage = $('#garage').val();
       patio = $('#patio').val();

       if(cantidadBanos===null){
           cantidadBanos="";
       }
       if(cantidadDorm===null){
           cantidadDorm="";
       }


       if(garage===null){
           garage="";
       }

       if(patio===null){
           patio="";
       }
     
          
        
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.9036100, lng: -56.1640446}, 
          scrollwheel: false,
          zoom: 13
        });
       
      $.ajax({
            method: 'GET',
            url: apiRoot + "/inmueble/search2?cantBanos="+cantidadBanos+"&cantDorm="+cantidadDorm+"&garage="+garage+"&patio="+patio
        }).done(function(data) {
        
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        
            $.each(data, function(index, inmueble) {
                    marker = new google.maps.Marker({
                            position: new google.maps.LatLng(inmueble.latitud, inmueble.longitud),
                            map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent('<a href="http://localhost/tallerphp2016/frontend/web/index.php?r=site/buscarinmueble&id='+inmueble.id+'"><span class="fa fa-search-plus"></span> '+inmueble.nombre+'</a>');
                        infowindow.open(map, marker);
                    }
                    })(marker, i));
            });
        });
    google.maps.event.addDomListener(window, 'load');       

}  

function listarInmuebles(){
     $('.row').html('');
     var accessToken = $('#accessToken').val();
     
    var cantidadBanos = "";
    var cantidadDorm= "";
    var garage= "";
    var patio="";


    cantidadBanos = $('#cantBanos').val();
    cantidadDorm = $('#cantDorm').val();
    garage = $('#garage').val();
    patio = $('#patio').val();

    if(cantidadBanos===null){
        cantidadBanos="";
    }
    if(cantidadDorm===null){
        cantidadDorm="";
    }


    if(garage===null){
        garage="";
    }

    if(patio===null){
        patio="";
    }
    
    $.ajax({
      beforeSend: function (xhr) {
          xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
      },
      method: "GET",
      url: apiRoot + "/inmueble/search2?cantBanos="+cantidadBanos+"&cantDorm="+cantidadDorm+"&garage="+garage+"&patio="+patio
    })
    .done(function( inmuebles ) {
      console.log(inmuebles);


      $.each(inmuebles, function(index, inmueble) {

         var url = "../../backend/imagenes/";
         var foto1 = inmueble.foto1;
         var foto2 = inmueble.foto2;
         var foto3 = inmueble.foto3;
         var urlFoto1= url+foto1;
         var urlFoto2= url+foto2;
         var urlFoto3= url+foto3;

         let html = '<div>';     

          html+='<div class="col-sm-3 col-md-3">'
          html+='<div class="thumbnail">'
          if((foto1!=null) || (foto2!=null) || (foto3!=null)){
          html+='<div id="carousel-example-generic'+inmueble.id+'" class="carousel slide" data-ride="carousel">'
          html+='<ol class="carousel-indicators">'
          if(foto1!=null){
          html+='<li data-target="#carousel-example-generic'+inmueble.id+'" data-slide-to="0" class="active">'
          html+='</li>'
          }
          if(foto2!=null){
          html+='<li data-target="#carousel-example-generic'+inmueble.id+'" data-slide-to="1">'
          html+='</li>'
          }
          if(foto3!=null){
          html+='<li data-target="#carousel-example-generic'+inmueble.id+'" data-slide-to="2">'
          html+='</li>'
          }
          html+='</ol>'

          html+='<a href="index.php?r=site/buscarinmueble&id='+inmueble.id+'">'
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

          html+='<a class="left carousel-control" href="#carousel-example-generic'+inmueble.id+'" role="button" data-slide="prev">'
          html+='<span class="glyphicon glyphicon-chevron-left" aria-hidden="true">'
          html+='</span>'
          html+='<span class="sr-only">'
          html+='</span>'
          html+='</a>'
          html+='<a class="right carousel-control" href="#carousel-example-generic'+inmueble.id+'" role="button" data-slide="next">'
          html+='<span class="glyphicon glyphicon-chevron-right" aria-hidden="true">'
          html+='</span>'
          html+='<span class="sr-only">'
          html+='</span>'
          html+='</a>'
          html+='</div>'
          html+='<div class="caption">'
      }
          html+='<a href="index.php?r=site/buscarinmueble&id='+inmueble.id+'">'
          html+=' <h3>'+inmueble.nombre+'</h3>'
          
          html+='</a>'
          html+=' </div>'
          html+=' </div>'
          html+=' </div>'




           $('.row').append(html);

      });
   });
}

$("document").ready(function(){ 
  listarInmuebles();
  initMap();
  ('#usuarioLogueado').text('muy anonimo');
  
  $("#idButtonEnviar").click(function(){
      listarInmuebles();
      initMap();
  });
  


});