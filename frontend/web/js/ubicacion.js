var apiRoot = 'http://localhost/tallerphp2016/api/v1/inmueble';

$("document").ready(function(){ 
  var accessToken = $('#accessToken').val();
  
  $.ajax({
        method: 'GET',
        url: apiRoot
    }).done(function(data) {
        function dibujarMapaGeneral(inmuebles){
	
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(-34.8581  , -56.1708),     
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      var image = 'img/icon.jpg'
      $.each(inmuebles, function(index, inmueble) {
    		var cadena = inmueble.ubicacion,
			    separador = ",", // un espacio en blanco
			    limite    = 2,
			    arregloDeSubCadenas = cadena.split(separador, limite);
			    var latitud = arregloDeSubCadenas[0];
			    var longitud = arregloDeSubCadenas[1];
    	 	marker = new google.maps.Marker({
          		position: new google.maps.LatLng(latitud, longitud),
          		map: map,
          		icon: image
        	});
        	google.maps.event.addListener(marker, 'click', (function(marker, i) {
          	return function() {
	            infowindow.setContent('<a href="http://localhost/tallerphp2016/frontend/web/site/buscarinmueble&id='+inmueble.id+'"><span class="fa fa-search-plus"></span> '+inmueble.nombre+'</a>');
	            infowindow.open(map, marker);
          	}
        	})(marker, i));
		});
    google.maps.event.addDomListener(window, 'load');
   
}


    	
    });
}


