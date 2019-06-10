$(document).ready(function() {
    $("#btn-save-item").click(function(event) {
        var equipo = $("#equipo").val();
        var causa = $("#causa").val();
        var validateEquipo = $("#validateEquipo");
        var validateCausa = $("#validateCausa");
        event.preventDefault();

        if (equipo === null) {
           validateEquipo.css("color","red");
           validateEquipo.html("Selecione un Equipo"); 
        }else{
            if (causa === null) {
                validateCausa.css("color","red");
                validateCausa.html("Seleccione una causa");
            }else{
                $("form").submit();
            }
        }

    });


    $.ajax(
        {
            url: "http://proyecto.test/role/role",
            cache: false
        })
        .done(function(result)
        {
            var session_credentials = $.parseJSON(result);
            console.log(session_credentials);
        });

});