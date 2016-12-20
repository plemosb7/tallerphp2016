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
            localStorage.usuario=$('#usuario').val();
            $('#usuarioLogueado').text(localStorage.usuario);
            $('#loginForm').hide();
            $('#cerrarSesion').prop('disabled',false);
        }
    });
});

$("#cerrarSesion").click(function(){
    delete localStorage.usuario
    $('#usuarioLogueado').text('muy Anonimo');
    $('#usuario').val('');
    $('#contrasena').val('');
    $('#loginForm').show();
    $('#cerrarSesion').prop('disabled',true);
});
  
var accessToken = $('#accessToken').val();
$("#registro").click(function(){
//$hash = Yii::$app->getSecurity()->generatePasswordHash($('#contrasena').val(''));
$.ajax({
    beforeSend: function (xhr) {
          xhr.setRequestHeader ("Authorization", "Bearer " + accessToken);
      },
      method: "POST",
      url: apiRoot + "/user",
      data: {"username":"example","email":"user3333@exampleds.com"},
}).done(function(response) {
        console.log(response);
})

});

//$("document").ready(function(){ 
//        ('#usuarioLogueado').text('muy anonimo');
////    if( localStorage.usuario !== undefined ){
////        
////    }
////    else{
////        ('#usuarioLogueado').text(localStorage.usuario);
////    }
//});


//});

