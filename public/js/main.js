const buttons = document.querySelectorAll('.bdelete');

buttons.forEach(boton => {
    boton.addEventListener("click", function(){
        const matricula = this.dataset.matricula;
        
        const confirm = window.confirm("Do you want delete the enrollment " + matricula + "?");
         
        if (confirm) {
            //Solicitud AJAX
            httpRequest("http://localhost/MVC/search/deleteItem/" + matricula, function(){
                // console.log(this.responseText);
                document.querySelector('#response').innerHTML = this.responseText;

                const tbody = document.querySelector("#tbody-alumnos");
                const fila = document.querySelector("#fila-" + matricula);

                tbody.removeChild(fila);
            });
        }
    });
});

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