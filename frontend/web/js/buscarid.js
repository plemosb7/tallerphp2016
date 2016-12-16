var apiRoot = 'http://localhost/tallerphp2016/api/v1';



function tablaDeDatos(){
    
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
                        html+='<td WITH="200" align="right">'+inmueble.nombre+'</td>'
                    html+='</tr>'
                    html+='<tr>'
                        html+='<th with="200">Tipo de Inmueble:</th>'
                        if(inmueble.tipoInmueble_id=="11"){
                            html+='<td WITH="200" align="right">Apartamento</td>'
                        }else{
                            html+='<td WITH="200" align="right">Casa</td>'

                        }
                    html+='</tr>'
                    html+='<tr>'
                        html+='<th WITH="200">Cantidad de Dormitorios:</th>'
                        html+='<td WITH="200" align="right">'+inmueble.cantDorm+'</td>'
                    html+='</tr>'
                    html+='<tr>'
                        html+='<th WITH="200">Cantidad de Baños:</th>'
                        html+='<td WITH="200" align="right">'+inmueble.cantBanos+'</td>'
                    html+='</tr>'
                    html+='<tr>'
                        html+='<th WITH="200">Superficie Total:</th>'
                        html+='<td WITH="200" align="right">'+inmueble.supTotal+'</td>'
                    html+='</tr>'
                    html+='<tr>'
                        html+='<th WITH="200">Superficie Edificada:</th>'
                        html+='<td WITH="200" align="right">'+inmueble.supEdificada+'</td>'
                    html+='</tr>'
                    html+='<tr>'
                        if(inmueble.garage=="0"){
                            html+='<th WITH="200">Garage:</th>'
                            html+='<td WITH="200" align="right">No</td>'
                        }else{
                            html+='<th WITH="200">Garage:</th>'
                            html+='<td WITH="200" align="right">SI</td>'
                        }
                    html+='</tr>'
                    html+='<tr>'
                        if(inmueble.garage=="0"){
                            html+='<th WITH="200">Patio:</th>'
                            html+='<td WITH="200" align="right">No</td>'
                        }else if(inmueble.patio=="1"){
                            html+='<th WITH="200">Patio:</th>'
                            html+='<td WITH="200" align="right">'+inmueble.patio+'</td>'
                        }else{
                            html+='<th WITH="200">Patios:</th>'
                            html+='<td WITH="200" align="right">'+inmueble.patio+'</td>'
                        }

                    html+='</tr>'

                html+='</tbody>'
            html+='</table>'
        }

             $('.row').append(html);
  });

    
    
});

}

$("document").ready(function(){ 
  
   tablaDeDatos();

});