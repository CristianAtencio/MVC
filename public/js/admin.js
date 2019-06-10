$(document).ready(function() {
   var user = $("#usuario");
   var validateUser = $("#validateUser");
   var email = $("#correo");
   var validateEmail = $("#validateEmail");

   user.keyup(function() {
       var input = user.val();
        httpRequest("http://proyecto.test/admin/validateUser/" + input, function(){
            var response = this.responseText;

            if (response !== "") {
                validateUser.css("color","red");
                validateUser.html(response);
            }else{
                validateUser.html("");
            }
        });
   });

   email.keyup(function() {
       var input = email.val();
        httpRequest("http://proyecto.test/admin/validateEmail/" + input, function() {
            var response = this.responseText;

            if (response !== "") {
                validateEmail.css("color","red");
                validateEmail.html(response);
            }else{
                validateEmail.html("");
            }
        });
   });

   $("#confirmacion").keyup(function() {
        comparePassword();
   });

   $("#clave").keyup(function() {
        comparePassword();
    });

    $("#btn-update-user").click(function(event){
        var boton = $("#rol").val();
        var validateRole = $("#validateRole");
        event.preventDefault();

        if (boton === null) {
            validateRole.css("color","red");
            validateRole.html("Seleccione un rol");
        }else{
            $("form").submit();
        }
    });

    $("#btn-save-user").click(function(event){
        var boton = $("#rol").val();
        var validateRole = $("#validateRole");
        event.preventDefault();

        if (boton === null) {
            validateRole.css("color","red");
            validateRole.html("Seleccione un rol");
        }else{
            $("form").submit();
        }
    });


    function comparePassword() {
        var clave = $("#clave").val();
        var confirmacion = $("#confirmacion").val();
        var validateConfirm = $("#validateConfirm");
    
        if (confirmacion !== "") {
            if (clave === confirmacion) {
                validateConfirm.css("color","green");
                validateConfirm.html("Las contraseñas son iguales");
            }else{
                validateConfirm.css("color","red");
                validateConfirm.html("Las contraseñas no son iguales");  
            }
        }else{
        validateConfirm.html("");
        }
    }

   function httpRequest(url, callback){
        const http = new XMLHttpRequest();
        http.open("GET",url);
        http.send();

        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                callback.apply(http);
            }
        }
    }
});