/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var apiRoot = 'http://localhost/tallerphp2016/api/v1';  
$.ajax({
      method: "POST",
      url: apiRoot + "/user",
      data: {"id":1,"username":"example","email":"user@example.com","created_at":1414674789,"updated_at":1414674789},
})