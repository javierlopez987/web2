document.addEventListener("DOMContentLoaded", function() {
    let container = document.querySelector(".container");
    let URL = "http://localhost/web2/dev/tp1-7/main.php"
    
    document.querySelector("#btnNum").addEventListener("click", (e) => {
        e.preventDefault();
        
        let num = document.querySelector("#numInputs").value;
        let n = "";
        for (let i = 0; i < num; i++) {
            n = document.createElement("input");
            container.appendChild(n);
            n.name = "inputs[]";
            n.className = "inputsClass";
            console.log(n);
        }   
        let btn = document.createElement("button");
        container.appendChild(btn);
        btn.innerHTML = "Enviar";
        btn.id = "btnEnviar";
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            let inputs = document.querySelectorAll(".inputsClass");
            console.log(inputs);
            for (let j = 0; j < num; j++) {
                console.log(inputs[j].value);
            }
            enviar(e, num, inputs);
        })
    })

    async function enviar(e, num, inputs) {
        e.preventDefault()
        try {
            //for (let i = 0; i < num; i++) {
                //"inputs%5B%5D=" + 
            //}
            let response = await fetch(URL + "?inputPpal=" + inputs);
            console.log(URL + "?inputPpal=" + inputs);
            console.log(response);
            if(response.ok) {
                let texto = await response.text();
                console.log(texto);
                mostrar(texto);
            }
        } catch (error) {
            console.log(error);
        }
    }

    function mostrar (msj) {
        container.innerHTML = "Resultado: " + msj;
    } 
})