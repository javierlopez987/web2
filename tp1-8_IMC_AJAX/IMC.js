document.addEventListener("DOMContentLoaded", function() {
    let container = document.querySelector(".formContainer");
    
    document.querySelector("#btnEnviar").addEventListener("click", getIMC);
    
    async function getIMC (e) {
        e.preventDefault();
        let file = "IMC.php";
        let inputs = document.querySelectorAll(".input");
        try {
            let request = file + "?";
            for (const input of inputs) {
                console.log(input);
                request += input.name + "=" + input.value + "&";
            }
            console.log(request);
            let response = await fetch (request);
            if (response.ok) {
                let texto = await response.text();
                console.log(texto);
                mostrar(texto);
            }
        } catch (error) {
            console.log(error);
        }
    }
    
    function mostrar(txt) {
        document.querySelector(".container").innerHTML = txt;
    }

})