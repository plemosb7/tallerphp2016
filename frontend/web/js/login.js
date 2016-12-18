/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$("document").ready(function(){ 
//    
var apiRoot = 'http://localhost/tallerphp2016/api/v1';  
$("#iniciarSesion").click(function(){
//      $('#valor').val('antesRest');
      $.ajax({
      method: "GET",
      url: apiRoot + "/user/iniciarsesion?nombre="+$('#usuario').val()+"&contrasena="+$('#contrasena').val()
    })
    .done(function(response) {
//        $('#usuarioLogueado').text('mas anonimo');
//        $('#valor').val(response);
        console.log(response);
        if(response==='true'){
            $('#usuarioLogueado').text($('#usuario').val());
            $('#loginForm').hide();
            $('#cerrarSesion').prop('disabled',false);
        }
    });
});

$("#cerrarSesion").click(function(){
    $('#usuarioLogueado').text('Anonimo');
    $('#usuario').val('');
    $('#contrasena').val('');
    $('#loginForm').show();
    $('#cerrarSesion').prop('disabled',true);
});
  


//});

