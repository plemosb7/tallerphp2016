var apiRoot = 'http://localhost/tallerphp2016/api/v1';

$("document").ready(function(){ 
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
       let html = '<table>';     
        
       if(inmueble.id==idInmueble){
        
    html+='<table class="table table-bordered" >'
    html+='<tbody>'
    html+='<tr>'
      html+='<th with="200">Nombre:</th>'
      
      html+='<td WITH="200">'+inmueble.nombre+'</td>'
    html+='</tr>'
    html+='<tr>'
    html+='<th with="200">Tipo de Inmueble:</th>'
    
    if(inmueble.tipoInmueble_id=="11"){
         html+='<td WITH="200">Apartamento</td>'
         
  }else{
     html+='<td WITH="200">Casa</td>'
      
  }
      
      
     
    html+='</tr>'
    html+='<tr>'
      html+='<th WITH="200">Cantidad de Dormitorios:</th>'
      
      html+='<td WITH="200">'+inmueble.cantDorm+'</td>'
    html+='</tr>'
    html+='<tr>'
      html+='<th WITH="200">Cantidad de Baños:</th>'
      
      html+='<td WITH="200">'+inmueble.cantBanos+'</td>'
    html+='</tr>'
    html+='<tr>'
      html+='<th WITH="200">Superficie Total:</th>'
      
      html+='<td WITH="200">'+inmueble.supTotal+'</td>'
    html+='</tr>'
    html+='<tr>'
      html+='<th WITH="200">Superficie Edificada:</th>'
      
      html+='<td WITH="200">'+inmueble.supEdificada+'</td>'
    html+='</tr>'
    html+='<tr>'
      if(inmueble.garage=="0"){
            
            html+='<th WITH="200">Garage:</th>'
      
      html+='<td WITH="200">No</td>'
  }else{
      html+='<th WITH="200">Garage:</th>'
      
      html+='<td WITH="200">SI</td>'
      
  }
    html+='</tr>'
    html+='<tr>'
    if(inmueble.garage=="0"){
            
           html+='<th WITH="200">Patio:</th>'
      
      html+='<td WITH="200">No</td>'
  }else if(inmueble.patio=="1"){
      html+='<th WITH="200">Patio:</th>'
      html+='<td WITH="200">'+inmueble.patio+'</td>'
      
  }else{
    html+='<th WITH="200">Patios:</th>'
      html+='<td WITH="200">'+inmueble.patio+'</td>'
      
  }
      
    html+='</tr>'
    
  html+='</tbody>'
html+='</table>'

html+='<input type="hidden" id="latitud" value="'+inmueble.latitud+'">'
html+='<input type="hidden" id="longitud" value="'+inmueble.longitud+'">'
       }

         $('.row').append(html);

    });
    
     $.each(inmuebles, function(index, inmueble) {
             
     var url = "../../backend/imagenes/";
       var foto1 = inmueble.foto1;
       var foto2 = inmueble.foto2;
       var foto3 = inmueble.foto3;
       var urlFoto1= url+foto1;
       var urlFoto2= url+foto2;
       var urlFoto3= url+foto3;
       
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

});