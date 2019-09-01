document.addEventListener("DOMContentLoaded", function () {

    let URL = "http://localhost/web2/php/ejemploget.php"
    let btnEnviar = document.querySelector("#btnEnviar");
    btnEnviar.addEventListener("click", (e) => {
        console.log(e);
        e.preventDefault();
        try {
            let response = fetch(URL);
            console.log(response);
            if(response.ok) {
                let text = response(text);
                let info = document.querySelector("#info");
                info.innerHTML = text;
            }
        }
        catch(exc) {
            console.log(exc);
         }
    })

    console.log("Cargada");
})